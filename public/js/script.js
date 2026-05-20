(() => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const transitionDelay = prefersReducedMotion ? 0 : 100;
    let isShowing = false;
    let navigationTimer;

    const loaderStyles = `
        .artvault-loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: grid;
            min-height: 100dvh;
            place-items: center;
            padding: max(1.5rem, env(safe-area-inset-top)) max(1.25rem, env(safe-area-inset-right)) max(1.5rem, env(safe-area-inset-bottom)) max(1.25rem, env(safe-area-inset-left));
            background: rgba(246, 247, 251, 0.98);
            color: #1f2937;
            opacity: 0;
            pointer-events: none;
            visibility: hidden;
            transition: opacity 0.22s ease, visibility 0.22s ease;
        }

        .artvault-loader.is-visible {
            opacity: 1;
            pointer-events: all;
            visibility: visible;
        }

        .artvault-loader__content {
            display: flex;
            width: min(280px, 82vw);
            flex-direction: column;
            align-items: center;
            text-align: center;
            opacity: 0;
            transform: translateY(8px) scale(0.985);
            transition: opacity 0.22s ease, transform 0.32s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: opacity, transform;
        }

        .artvault-loader.is-visible .artvault-loader__content {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .artvault-loader__mark {
            display: grid;
            width: clamp(76px, 20vw, 96px);
            height: clamp(76px, 20vw, 96px);
            place-items: center;
            margin-bottom: clamp(0.9rem, 3vw, 1.15rem);
            border: 1px solid rgba(255, 255, 255, 0.86);
            border-radius: 24px;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.96), rgba(233, 237, 246, 0.92));
            box-shadow: 0 18px 46px rgba(31, 60, 136, 0.14), 0 1px 2px rgba(31, 41, 55, 0.08);
        }

        .artvault-loader__logo {
            width: clamp(52px, 14vw, 66px);
            height: clamp(52px, 14vw, 66px);
            object-fit: contain;
        }

        .artvault-loader__title {
            margin: 0;
            font-family: 'Cinzel', Georgia, serif;
            font-size: clamp(1.55rem, 6vw, 2.3rem);
            font-weight: 700;
            letter-spacing: 0;
            line-height: 1.08;
            color: #1f3c88;
        }

        .artvault-loader__text {
            margin: 0.35rem 0 1rem;
            font-family: 'Lato', Arial, sans-serif;
            font-size: clamp(0.82rem, 2.8vw, 0.92rem);
            font-weight: 700;
            letter-spacing: 0;
            color: #6b7280;
        }

        .artvault-loader__bar {
            width: min(176px, 62vw);
            height: 4px;
            overflow: hidden;
            border-radius: 999px;
            background: rgba(31, 60, 136, 0.12);
        }

        .artvault-loader__bar::before {
            content: "";
            display: block;
            width: 38%;
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #1f3c88, #f4c430);
            animation: artvault-loader-progress 1.05s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            will-change: transform;
        }

        @keyframes artvault-loader-progress {
            0% { transform: translateX(-110%); }
            100% { transform: translateX(280%); }
        }

        @media (prefers-color-scheme: dark) {
            .artvault-loader {
                background: rgba(20, 24, 34, 0.98);
                color: #f9fafb;
            }

            .artvault-loader__mark {
                border-color: rgba(255, 255, 255, 0.12);
                background: linear-gradient(145deg, rgba(46, 55, 76, 0.96), rgba(25, 31, 44, 0.94));
                box-shadow: 0 18px 46px rgba(0, 0, 0, 0.24);
            }

            .artvault-loader__title {
                color: #f4c430;
            }

            .artvault-loader__text {
                color: rgba(249, 250, 251, 0.68);
            }

            .artvault-loader__bar {
                background: rgba(255, 255, 255, 0.14);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .artvault-loader,
            .artvault-loader__content,
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
                        <img class="artvault-loader__logo" src="/assets/logo/Artvault.png" alt="">
                    </div>
                    <h2 class="artvault-loader__title">Artvault</h2>
                    <p class="artvault-loader__text">Loading page</p>
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
        const loader = document.querySelector('.artvault-loader');
        if (loader) loader.classList.remove('is-visible');
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

(() => {
    const revealSelectors = [
        '.hero',
        '.about-section',
        '.motive-section',
        '.team-section',
        '.gallery-page',
        '.art-detail-page',
        '.other-artworks-container',
        '.contact-section',
        '.profile-header',
        '.profile-tabs-wrap',
        '.profile-grid-container',
        '.art-card',
        '.feature-card',
        '.team-card',
        '.other-art-card',
        '.comment-group',
        '.profile-tag',
        '.tab-item',
        '.footer-col',
        '.info-item',
        '.form-group',
        '.gallery-topbar',
        '.add-work-wrap',
        '.clipboard-card',
        '.profile-art-grid > *',
        '.other-artworks-grid > *',
        '.team-grid > *',
        '.art-grid > *',
        '.contact-content > *',
        'main > .flex-1 > div',
        '.card-hover',
        'table tbody tr'
    ].join(',');

    function revealPageElements() {
        const elements = document.querySelectorAll(revealSelectors);
        if (!elements.length) return;

        if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            elements.forEach((element) => element.classList.add('av-visible'));
            return;
        }

        const observer = new IntersectionObserver((entries, entryObserver) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('av-visible');
                entry.target.addEventListener('transitionend', () => {
                    entry.target.style.transitionDelay = '';
                }, { once: true });
                entryObserver.unobserve(entry.target);
            });
        }, {
            rootMargin: '0px 0px -6% 0px',
            threshold: 0.08
        });

        elements.forEach((element, index) => {
            element.classList.add('av-reveal');
            element.style.transitionDelay = `${Math.min(index % 6, 5) * 35}ms`;
            observer.observe(element);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', revealPageElements, { once: true });
    } else {
        revealPageElements();
    }
})();
