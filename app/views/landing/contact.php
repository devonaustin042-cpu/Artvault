<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - Contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-logo">
            <img src="/img/logo/Artvault.png" alt="Artvault Logo" class="logo-img">
        </div>

        <ul class="nav-menu">
            <li><a href="/">Home</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/contact" class="active">Contact</a></li>
            <li><a href="/about">About</a></li>
        </ul>

        <div class="nav-actions">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="javascript:void(0)" onclick="toggleLogoutPopup()"><img src="/img/icon/user.png" alt="User Icon" class="user-icon" style="width: 40px; height: 40px; border-radius: 50%;"></a>
            <?php else: ?>
                <button class="btn btn-login" onclick="location.href='/login'">Log In</button>
                <button class="btn btn-signup" onclick="location.href='/register'">Sign Up</button>
            <?php endif; ?>
        </div>
    </nav>

    <!-- LOGOUT POPUP -->
    <div id="logoutPopup" class="logout-popup-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div class="logout-popup-content" style="background: white; padding: 2rem; border-radius: 15px; text-align: center; max-width: 400px; width: 90%; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
            <img src="/img/icon/user.png" alt="User" style="width: 60px; height: 60px; margin-bottom: 1rem; border-radius: 50%;">
            <h3 style="font-family: 'Cinzel', serif; margin-bottom: 0.5rem;">Logout?</h3>
            <p style="color: #666; margin-bottom: 1.5rem;">Are you sure you want to log out of Artvault?</p>
            <div style="display: flex; gap: 10px; justify-content: center;">
                <button onclick="location.href='/logout'" style="background: #ff4d4d; color: white; border: none; padding: 10px 25px; border-radius: 8px; cursor: pointer; font-weight: bold;">Logout</button>
                <button onclick="toggleLogoutPopup()" style="background: #eee; color: #333; border: none; padding: 10px 25px; border-radius: 8px; cursor: pointer; font-weight: bold;">Cancel</button>
            </div>
        </div>
    </div>


<!-- MAIN CONTENT  -->
<body class="bg-[#f3f3f3]">

  <!-- CONTACT SECTION -->
  <section class="max-w-[1400px] mx-auto pt-10 pb-30 px-30">

    <!-- TITLE -->
    <div class="text-center">
      <h1 class="title-font text-[64px] leading-none font-bold text-black">
        CONTACT US
      </h1>

      <p class="text-[20px] text-[#222] mt-4">
        If any problem occurs, you can contact us!
      </p>
    </div>

    <!-- CONTENT -->
    <div class="flex flex-col xl:flex-row justify-center items-start gap-[40px] mt-10">

      <!-- LEFT -->
      <div class="w-full xl:w-[760px] bg-[#e9e9e9] rounded-[20px] px-20 py-20">

        <!-- TITLE -->
        <h2 class="text-[28px] font-bold text-black">
          Send Message
        </h2>

        <!-- LINE -->
        <div class="w-full h-[4px] bg-[#9797a8] mt-3 mb-8"></div>

        <!-- INPUT -->
        <div class="mb-6">
          <label class="block text-[20px] text-[#222] mb-3">
            Full Name
          </label>

          <input 
            type="text"
            class="w-full h-[58px] border border-[#bdbdbd] rounded-[5px] bg-white px-4 outline-none"
          >
        </div>

        <!-- INPUT -->
        <div class="mb-6">
          <label class="block text-[20px] text-[#222] mb-3">
            Email / WhatsApp No.
          </label>

          <input 
            type="text"
            class="w-full h-[58px] border border-[#bdbdbd] rounded-[5px] bg-white px-4 outline-none"
          >
        </div>

        <!-- TEXTAREA -->
        <div>
          <label class="block text-[20px] text-[#222] mb-3">
            Message / Description
          </label>

          <textarea
            class="w-full h-[160px] border border-[#bdbdbd] rounded-[5px] bg-white p-4 resize-none outline-none"
          ></textarea>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-center mt-7">
          <button class="w-[300px] h-[68px] rounded-[18px] bg-[#f1c52d] text-black text-[22px] font-bold hover:opacity-90 transition">
            Send Message
          </button>
        </div>

      </div>

      <!-- RIGHT -->
      <div class="w-full xl:w-[390px] bg-[#e9e9e9] rounded-[20px] px-8 py-7">

        <!-- TITLE -->
        <h2 class="text-[27px] font-bold text-black">
          Contact Information
        </h2>

        <!-- LINE -->
        <div class="w-full h-[3px] bg-[#8f88d9] mt-3 mb-8"></div>

        <!-- ITEMS -->
        <div class="space-y-8">

          <!-- ITEM -->
          <div class="flex items-center gap-6">
            <i class="fa-solid fa-graduation-cap text-[38px] text-[#233f97] w-[42px]"></i>

            <p class="text-[18px] text-[#222] leading-relaxed">
              SMK Immanuel Pontianak
            </p>
          </div>

          <!-- ITEM -->
          <div class="flex items-center gap-6">
            <i class="fa-solid fa-location-dot text-[38px] text-[#233f97] w-[42px]"></i>

            <p class="text-[18px] text-[#222] leading-relaxed">
              JL Sutoyo No 99
            </p>
          </div>

          <!-- ITEM -->
          <div class="flex items-center gap-6">
            <i class="fa-solid fa-envelope text-[38px] text-[#233f97] w-[42px]"></i>

            <p class="text-[18px] text-[#222] leading-relaxed">
              Skim@SKI.SCH.ID
            </p>
          </div>

          <!-- ITEM -->
          <div class="flex items-center gap-6">
            <i class="fa-solid fa-phone text-[38px] text-[#233f97] w-[42px]"></i>

            <p class="text-[18px] text-[#222] leading-relaxed">
              0811-222-333-444
            </p>
          </div>

          <!-- ITEM -->
          <div class="flex items-center gap-6">
            <i class="fa-solid fa-clock text-[38px] text-[#233f97] w-[42px]"></i>

            <p class="text-[18px] text-[#222] leading-relaxed">
              Monday - Sunday, 07.00 - 17.00
            </p>
          </div>

        </div>

      </div>

    </div>

  </section>


  <!-- FOOTER --> 
   <div class="Box-1"></div>
    <footer class="footer">
        <div class="footer-brand">
            <div class="footer-brand-top">
                <img src="/img/logo/Artvault-white.png" alt="Artvault Logo" class="footer-logo">
                <span class="footer-brand-name">Artvault</span>
            </div>
        </div>
        <div class="footer-main">
            <!-- Navigation -->
            <div class="footer-col">
                <h4 class="footer-heading">Navigation</h4>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-col">
                <h4 class="footer-heading">Contact</h4>
                <ul class="footer-contact">
                    <li>
                        <span class="contact-icon">
                            <img src="/img/icon/mail.png" alt="Email Icon" class="contact-icon-img">
                        </span>
                        <span>Artvault@gmail.com</span>
                    </li>
                    <li>
                        <span class="contact-icon">
                            <img src="/img/icon/location.png" alt="Location Icon" class="contact-icon-img">
                        </span>
                        <span>Pontianak, Kalimantan Barat, Indonesia</span>
                    </li>
                    <li>
                        <span class="contact-icon">
                            <img src="/img/icon/telephone.png" alt="Phone Icon" class="contact-icon-img">
                        </span>
                        <span>+62 897 3871 170</span>
                    </li>
                </ul>
            </div>

            <!-- Help & Center -->
            <div class="footer-col">
                <h4 class="footer-heading">Help & Center</h4>
                <ul class="footer-links">
                    <li><a href="#">Customer Support</a></li>
                    <li><a href="#">Terms and Services</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cancellation and Refund Policy</a></li>
                </ul>
            </div>

            <!-- Logo + Sosmed -->
            <div class="footer-col footer-social-col">
                <img src="/img/logo/Artvault-white.png" alt="Artvault" class="footer-logo-big">
                <div class="footer-social">
                    <p class="footer-follow">Follow Us</p>
                    <div class="social-icons">
                        <a href="#"><img src="/img/icon/instagram.png" alt="Instagram"></a>
                        <a href="#"><img src="/img/icon/facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="/img/icon/tiktok.png" alt="TikTok"></a>
                        <a href="#"><img src="/img/icon/youtube.png" alt="YouTube"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <p>Copyright &copy; 2025 Artvault All Rights Reserved</p>
        </div>
    </footer>

    <script src="/js/script.js"></script>

</body>
</html>