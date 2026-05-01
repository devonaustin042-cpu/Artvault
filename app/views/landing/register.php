<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - ArtVault</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

<!-- FOOTER --> 
<!-- FOOTER SECTION -->
<footer class="mt-20 bg-white border-t border-gray-200">
    <!-- Container Atas: Konten Footer -->
    <div class="container mx-auto px-10 py-12">
        
        <!-- Baris Brand (Logo & Nama) -->
        <div class="flex items-center gap-3 mb-10">
            <img src="/img/logo/Artvault-white.png" alt="Artvault Logo" class="h-10 w-auto">
            <span class="text-2xl font-bold text-[#1D2939]">Artvault</span>
        </div>

        <!-- Grid Utama Footer -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            
            <!-- Kolom 1: Navigation -->
            <div>
                <h4 class="text-lg font-bold text-[#1D2939] mb-5">Navigation</h4>
                <ul class="space-y-3 text-gray-600">
                    <li><a href="/" class="hover:text-yellow-600 transition">Home</a></li>
                    <li><a href="/gallery" class="hover:text-yellow-600 transition">Gallery</a></li>
                    <li><a href="/about" class="hover:text-yellow-600 transition">About</a></li>
                    <li><a href="/contact" class="hover:text-yellow-600 transition">Contact</a></li>
                </ul>
            </div>

            <!-- Kolom 2: Contact -->
            <div>
                <h4 class="text-lg font-bold text-[#1D2939] mb-5">Contact</h4>
                <ul class="space-y-4 text-gray-600">
                    <li class="flex items-center gap-3">
                        <img src="/img/icon/mail.png" alt="Mail" class="w-5 h-5">
                        <span class="text-sm">Artvault@gmail.com</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <img src="/img/icon/location.png" alt="Location" class="w-5 h-5 mt-1">
                        <span class="text-sm">Pontianak, Kalimantan Barat, Indonesia</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <img src="/img/icon/telephone.png" alt="Phone" class="w-5 h-5">
                        <span class="text-sm">+62 897 3871 170</span>
                    </li>
                </ul>
            </div>

            <!-- Kolom 3: Help & Center -->
            <div>
                <h4 class="text-lg font-bold text-[#1D2939] mb-5">Help & Center</h4>
                <ul class="space-y-3 text-gray-600">
                    <li><a href="#" class="hover:text-yellow-600 transition text-sm">Customer Support</a></li>
                    <li><a href="#" class="hover:text-yellow-600 transition text-sm">Terms and Services</a></li>
                    <li><a href="#" class="hover:text-yellow-600 transition text-sm">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-yellow-600 transition text-sm">Cancellation and Refund Policy</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Big Logo & Socials -->
            <div class="flex flex-col items-center md:items-end">
                <img src="/img/logo/Artvault.png" alt="Artvault" class="w-32 h-auto mb-6 opacity-80">
                <div class="text-center md:text-right">
                    <p class="text-sm font-bold text-[#1D2939] mb-3">Follow Us</p>
                    <div class="flex gap-3 justify-center md:justify-end">
                        <a href="#" class="hover:scale-110 transition"><img src="/img/icon/instagram.png" alt="Instagram" class="w-8 h-8"></a>
                        <a href="#" class="hover:scale-110 transition"><img src="/img/icon/facebook.png" alt="Facebook" class="w-8 h-8"></a>
                        <a href="#" class="hover:scale-110 transition"><img src="/img/icon/tiktok.png" alt="TikTok" class="w-8 h-8"></a>
                        <a href="#" class="hover:scale-110 transition"><img src="/img/icon/youtube.png" alt="YouTube" class="w-8 h-8"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar (Biru Gelap) -->
    <div class="bg-[#1D2939] py-4">
        <div class="container mx-auto px-10 text-center">
            <p class="text-white text-sm tracking-wide">
                Copyright &copy; 2025 Artvault All Rights Reserved
            </p>
        </div>
    </div>
</footer>

    </div>
</body>
</html>