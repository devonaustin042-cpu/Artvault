(() => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const transitionDelay = prefersReducedMotion ? 0 : 180;
    let isShowing = false;
    let navigationTimer;

    const loaderStyles = `
        .artvault-loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: grid;
            place-items: center;
            padding: 2rem;
            background:
                radial-gradient(circle at 50% 42%, rgba(244, 196, 48, 0.16), transparent 28rem),
                linear-gradient(135deg, rgba(31, 60, 136, 0.98) 0%, rgba(42, 63, 112, 0.98) 48%, rgba(62, 64, 82, 0.98) 100%);
            color: #ffffff;
            opacity: 0;
            pointer-events: none;
            visibility: hidden;
            transition: opacity 0.28s ease, visibility 0.28s ease;
        }

        .artvault-loader.is-visible {
            opacity: 1;
            pointer-events: all;
            visibility: visible;
        }

        .artvault-loader__content {
            display: flex;
            width: min(320px, 86vw);
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .artvault-loader__mark {
            position: relative;
            display: grid;
            width: 132px;
            height: 132px;
            place-items: center;
            margin-bottom: 1.4rem;
        }

        .artvault-loader__ring {
            position: absolute;
            inset: 0;
            border: 3px solid rgba(255, 255, 255, 0.18);
            border-top-color: #f4c430;
            border-radius: 50%;
            animation: artvault-loader-spin 1s linear infinite;
        }

        .artvault-loader__ring::after {
            content: "";
            position: absolute;
            inset: 12px;
            border: 2px solid rgba(244, 196, 48, 0.18);
            border-bottom-color: #ffffff;
            border-radius: 50%;
            animation: artvault-loader-spin 1.45s linear infinite reverse;
        }

        .artvault-loader__logo {
            width: 92px;
            height: 92px;
            object-fit: contain;
            filter: drop-shadow(0 10px 24px rgba(0, 0, 0, 0.35));
        }

        .artvault-loader__title {
            margin: 0;
            font-family: 'Cinzel', Georgia, serif;
            font-size: clamp(1.8rem, 8vw, 3rem);
            font-weight: 700;
            letter-spacing: 0;
            line-height: 1.1;
            color: #f4c430;
            text-shadow: 0 4px 18px rgba(0, 0, 0, 0.22);
        }

        .artvault-loader__text {
            margin: 0.5rem 0 1.2rem;
            font-family: 'Lato', Arial, sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 0;
            color: rgba(255, 255, 255, 0.78);
        }

        .artvault-loader__bar {
            width: 100%;
            height: 6px;
            overflow: hidden;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.18);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.08);
        }

        .artvault-loader__bar::before {
            content: "";
            display: block;
            width: 45%;
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, transparent, #f4c430, #ffffff);
            animation: artvault-loader-progress 1.1s ease-in-out infinite;
        }

        @keyframes artvault-loader-spin {
            to { transform: rotate(360deg); }
        }

        @keyframes artvault-loader-progress {
            0% { transform: translateX(-120%); }
            100% { transform: translateX(240%); }
        }

        @media (prefers-reduced-motion: reduce) {
            .artvault-loader,
            .artvault-loader__ring,
            .artvault-loader__ring::after,
            .artvault-loader__bar::before {
                animation: none;
                transition: none;
            }
        }
    `;

    function ensureLoader() {
        let loader = document.querySelector('.artvault-loader');

        if (!document.getElementById('artvault-loader-styles')) {
            const style = document.createElement('style');
            style.id = 'artvault-loader-styles';
            style.textContent = loaderStyles;
            document.head.appendChild(style);
        }

        if (!loader) {
            loader = document.createElement('div');
            loader.className = 'artvault-loader';
            loader.setAttribute('role', 'status');
            loader.setAttribute('aria-live', 'polite');
            loader.setAttribute('aria-label', 'Loading page');
            loader.innerHTML = `
                <div class="artvault-loader__content">
                    <div class="artvault-loader__mark" aria-hidden="true">
                        <span class="artvault-loader__ring"></span>
                        <img class="artvault-loader__logo" src="/img/logo/Artvault-white.png" alt="">
                    </div>
                    <h2 class="artvault-loader__title">Artvault</h2>
                    <p class="artvault-loader__text">Opening the next gallery</p>
                    <div class="artvault-loader__bar" aria-hidden="true"></div>
                </div>
            `;
            document.body.appendChild(loader);
        }

        return loader;
    }

    function showLoader() {
        if (isShowing) return;
        isShowing = true;
        window.clearTimeout(navigationTimer);
        ensureLoader().classList.add('is-visible');
    }

    function hideLoader() {
        isShowing = false;
        ensureLoader().classList.remove('is-visible');
    }

    function shouldHandleLink(link, event) {
        if (!link || event.defaultPrevented || event.button !== 0) return false;
        if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return false;
        if (link.target && link.target !== '_self') return false;
        if (link.hasAttribute('download') || link.dataset.noTransition !== undefined) return false;

        const href = link.getAttribute('href');
        if (!href || href.startsWith('#') || href.startsWith('javascript:')) return false;
        if (href.startsWith('mailto:') || href.startsWith('tel:')) return false;

        const url = new URL(link.href, window.location.href);
        if (url.origin !== window.location.origin) return false;
        return !(url.pathname === window.location.pathname && url.search === window.location.search && url.hash);
    }

    document.addEventListener('DOMContentLoaded', () => {
        ensureLoader();
        requestAnimationFrame(hideLoader);
    });

    window.addEventListener('pageshow', hideLoader);

    document.addEventListener('click', (event) => {
        const link = event.target.closest('a');
        if (shouldHandleLink(link, event)) {
            event.preventDefault();
            showLoader();
            navigationTimer = window.setTimeout(() => {
                window.location.href = link.href;
            }, transitionDelay);
            return;
        }

        const button = event.target.closest('button');
        if (button && button.getAttribute('onclick')?.includes('location.href')) {
            showLoader();
        }
    }, true);

    document.addEventListener('submit', (event) => {
        const form = event.target;
        if (form.matches('form') && !form.dataset.noTransition) {
            showLoader();
        }
    }, true);

    window.addEventListener('beforeunload', showLoader);
})();
