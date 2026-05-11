<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artvault - About</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
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
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
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

    <script>
        function toggleLogoutPopup() {
            const popup = document.getElementById('logoutPopup');
            if (popup.style.display === 'none' || popup.style.display === '') {
                popup.style.display = 'flex';
            } else {
                popup.style.display = 'none';
            }
        }
    </script>

<!-- CONTACT SECTION -->
<section class="bg-[#f3f3f3] min-h-screen py-10">

    <!-- TITLE -->
    <div class="text-center">
        <h1 class="text-[55px] font-serif font-bold text-black uppercase tracking-wide">
            CONTACT US
        </h1>

        <p class="mt-2 text-[20px] text-black">
            If any problem occurs, you can contact us!
        </p>
    </div>

    <!-- CONTACT CONTENT -->
    <div class="max-w-[1450px] mx-auto mt-10 px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- LEFT FORM -->
        <div class="lg:col-span-2 bg-[#e9e9e9] rounded-[15px] px-10 py-8">

            <!-- TITLE -->
            <h2 class="text-[22px] font-bold text-black">
                Send Message
            </h2>

            <!-- LINE -->
            <div class="w-full h-[3px] bg-[#9c9c9c] mt-3 mb-7"></div>

            <!-- FORM -->
            <form>

                <!-- FULL NAME -->
                <div class="mb-6">
                    <label class="block text-[17px] text-black mb-2">
                        Full Name
                    </label>

                    <input
                        type="text"
                        class="w-full h-[52px] border border-[#bcbcbc] rounded-[5px] px-4 bg-white outline-none"
                    >
                </div>

                <!-- EMAIL -->
                <div class="mb-6">
                    <label class="block text-[17px] text-black mb-2">
                        Email / WhatsApp No.
                    </label>

                    <input
                        type="text"
                        class="w-full h-[52px] border border-[#bcbcbc] rounded-[5px] px-4 bg-white outline-none"
                    >
                </div>

                <!-- MESSAGE -->
                <div>
                    <label class="block text-[17px] text-black mb-2">
                        Message / Description
                    </label>

                    <textarea
                        class="w-full h-[140px] border border-[#bcbcbc] rounded-[5px] p-4 bg-white outline-none resize-none"
                    ></textarea>
                </div>

                <!-- BUTTON -->
                <div class="flex justify-center mt-6">

                    <button
                        type="submit"
                        class="bg-[#f2c230] hover:bg-[#ddb421] transition-all duration-300 
                               text-black text-[20px] font-bold 
                               px-16 py-3 rounded-[15px] shadow-md"
                    >
                        Send Message
                    </button>

                </div>

            </form>
        </div>

        <!-- RIGHT CONTACT INFO -->
        <div class="bg-[#e9e9e9] rounded-[15px] px-8 py-7 h-fit">

            <!-- TITLE -->
            <h2 class="text-[22px] font-bold text-black">
                Contact Information
            </h2>

            <!-- LINE -->
            <div class="w-full h-[1px] bg-[#b8b8d8] mt-3 mb-8"></div>

            <!-- ITEMS -->
            <div class="space-y-9">

                <!-- SCHOOL -->
                <div class="flex items-center gap-5">

                    <img
                        src="../../public/img/icon/edu-con.png"
                        alt="School"
                        class="w-[28px] h-[28px]"
                    >

                    <p class="text-[17px] text-black">
                        SMK Immanuel Pontianak
                    </p>

                </div>

                <!-- ADDRESS -->
                <div class="flex items-center gap-5">

                    <img
                        src="/img/icon/location.png"
                        alt="Location"
                        class="w-[28px] h-[28px]"
                    >

                    <p class="text-[17px] text-black">
                        JL Sutoyo No 99
                    </p>

                </div>

                <!-- EMAIL -->
                <div class="flex items-center gap-5">

                    <img
                        src="/img/icon/email.png"
                        alt="Email"
                        class="w-[28px] h-[28px]"
                    >

                    <p class="text-[17px] text-black">
                        Skim@SKI.SCH.ID
                    </p>

                </div>

                <!-- PHONE -->
                <div class="flex items-center gap-5">

                    <img
                        src="/img/icon/phone.png"
                        alt="Phone"
                        class="w-[28px] h-[28px]"
                    >

                    <p class="text-[17px] text-black">
                        0811-222-333-444
                    </p>

                </div>

                <!-- TIME -->
                <div class="flex items-center gap-5">

                    <img
                        src="/img/icon/time.png"
                        alt="Time"
                        class="w-[28px] h-[28px]"
                    >

                    <p class="text-[17px] text-black">
                        Monday - Sunday, 07.00 - 17.00
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

</body>
</html>