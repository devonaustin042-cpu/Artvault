<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - ArtVault</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body class="bg-[#F8F9FA] font-sans"> 

    <div class="min-h-screen flex flex-col justify-between">
        
        <!-- Tombol Back -->
        <div class="p-6 md:p-10">
            <a href="/" class="inline-block hover:opacity-70 transition">
                <img src="/img/icon/back.png" alt="Back" class="w-10 h-auto">
            </a>
        </div>

        <!-- Konten Tengah -->
        <div class="flex-1 flex flex-col md:flex-row items-center justify-center px-6 md:px-20 gap-10 md:gap-24 -mt-10">
            
            <!-- Sisi Kiri: Ilustrasi -->
            <div class="hidden md:block w-full md:w-1/2 max-w-lg">
                <img src="/img/banner/sign-up-banner.png" alt="Sign Up Banner" class="w-full h-auto object-contain">
            </div>

            <!-- Sisi Kanan: Form -->
            <div class="w-full md:w-[400px] text-center">
                <h1 class="text-5xl font-bold text-black mb-1">Welcome</h1>
                <p class="text-gray-500 mb-8 text-lg">Sign In to make your own account</p>

                <!-- Form Start - DIPERBAIKI: Tag form membungkus semua input dan tombol -->
                <form action="/post-register" method="POST" class="space-y-5">
                    
                    <!-- Email Field -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-black">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="email" name="email" placeholder="Enter Email" 
                            class="w-full py-3.5 pl-12 pr-4 border border-black rounded-full focus:outline-none focus:ring-1 focus:ring-yellow-500 text-sm" required>
                    </div>

                    <!-- Password Field -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-black">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" name="password" placeholder="Enter Password" 
                            class="w-full py-3.5 pl-12 pr-12 border border-black rounded-full focus:outline-none focus:ring-1 focus:ring-yellow-500 text-sm" required>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-yellow-500 cursor-pointer">
                            <i class="fa-regular fa-eye"></i>
                        </span>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-black">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" 
                            class="w-full py-3.5 pl-12 pr-12 border border-black rounded-full focus:outline-none focus:ring-1 focus:ring-yellow-500 text-sm" required>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-yellow-500 cursor-pointer">
                            <i class="fa-regular fa-eye"></i>
                        </span>
                    </div>

                    <div class="text-left pl-4 -mt-2">
                        <a href="#" class="text-[#D4AF37] text-xs italic hover:underline">More info?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-3.5 bg-[#F2C94C] text-black font-bold rounded-full shadow-md hover:bg-[#e0b83d] transition text-lg mt-6">
                        Sign In
                    </button>
                </form>

                <p class="my-4 text-gray-400 italic text-sm">or</p>

                <!-- Social Login Icons -->
                <div class="flex justify-center gap-5 mb-8">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-9 h-9 cursor-pointer hover:scale-110 transition" alt="Google">
                    <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-9 h-9 cursor-pointer hover:scale-110 transition" alt="Facebook">
                    <img src="https://www.svgrepo.com/show/475661/linkedin-color.svg" class="w-9 h-9 cursor-pointer hover:scale-110 transition" alt="LinkedIn">
                </div>

                <p class="text-gray-600 text-sm">Already have account? <a href="index.php?page=login" class="text-yellow-600 font-bold hover:underline">Log in</a></p>
            </div>
    </div>

<script src="https://cdn.tailwindcss.com"></script>
         <!-- FOOTER --> 

          <!-- Brand -->
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
    </div>
</body>
</html>