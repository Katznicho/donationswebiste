<nav class="text-white p-4 md:p-6 fixed w-full z-10" id="header" style="background-color: #12B0D1;">
    <div class="flex items-center justify-between">
        <div class="flex items-center lg:ml-40 md:ml-10">
            <!-- Make the logo a link -->
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-full h-100 mx-auto"
                    class="h-8 w-auto mr-2 px-10">
            </a>
            <span class="text-xl font-bold hidden md:inline"></span>
        </div>
        <!-- Hamburger menu icon -->
        <div class="flex items-center md:hidden">
            <button id="menu-toggle" class="text-white focus:outline-none ml-10">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <!-- Container for rows -->
        <div class="flex flex-col items-end space-y-4 md:space-y-0 md:space-x-6 space-between mr-10 hidden md:flex">
            <!-- First row: Icons and Donate Button -->
            <div class="flex items-center justify-center space-x-6 mb-5">          <!-- Phone Icon -->   
                <i class="fa fa-phone"></i>+44 1494 758998
                <!-- Email Icon -->
                <i class="fa fa-envelope"></i>info@fountainofpeace.net
                <!-- Social Media Icons (You can replace these with actual icons) -->
                <i class="facebook" style="font-size: 2px;">
                    <img src="{{ asset('images/facebook.png') }}" alt="logo" >
                </i>
                <i class="twitter">
                    <img src="{{ asset('images/twitter (1).png') }}" alt="logo" >
                </i>
                <i class="youtube">
                    <img src="{{ asset('images/youtube.png') }}" alt="logo"  height="100px" style="height: 40px;" class="mt-2">
                </i>
                <i class="instagram">
                    <img src="{{ asset('images/instagram.png') }}" alt="logo" >
                </i>
                <!-- Donate Now Button -->
                <a href="{{ route('donate') }}">
                <button class="text-white px-4 py-2 rounded-full hover:bg-blue-500 hover:text-white"
                    style="background-color: #E31F62;">Donate Now</button>
                    </a>
            </div>
            <!-- Second row: Tabs -->
            <div class="flex items-center justify-center space-x-6 space-between">
                <a href="{{ route('home') }}" class="underline">Home</a>
                <a href="{{ route('home') }}" class="hover:underline">Who We Are</a>
                <a href="{{ route('home') }}" class="hover:underline">What we do</a>
                <a href="{https://www.fountainofpeace.net/How-can-you-help" class="hover:underline">How can you help</a>
                <a href="https://www.fountainofpeace.net/News" class="hover:underline">News</a>
                <a href="https://www.fountainofpeace.net/Contact-us" class="hover:underline">Contact Us</a>
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="text-white p-4 md:p-6 fixed w-full z-10 hidden md:hidden" style="background-color: #12B0D1;">
    <div class="flex flex-col items-center space-y-4">
        <div class="flex items-center justify-between w-full">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-full h-100 mx-auto" class="h-8 w-auto mr-2 ">
            </a>
            <button id="menu-toggle" class="text-white focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="flex flex-col items-center justify-center space-y-6 mt-4">
            <a href="{{ route('home') }}" class="underline">Home</a>
            <a href="{{ route('home') }}" class="hover:underline">Who We Are</a>
            <a href="{{ route('home') }}" class="hover:underline">What we do</a>
            <a href="{{ route('home') }}" class="hover:underline">How can you help</a>
            <a href="{{ route('home') }}" class="hover:underline">News</a>
            <a href="{{ route('home') }}" class="hover:underline">Contact Us</a>
            <a href="{{ route('login') }}" class="hover:underline">Login</a>
            <a href="{{ route('donate') }}">
            <button class="text-white px-4 py-2 rounded-full hover:bg-blue-500 hover:text-white"
                style="background-color: #E31F62;">Donate Now</button>
                </a>
        </div>
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Add event listener to close mobile menu when 'x' is clicked
    const closeMenuButton = document.querySelector('#mobile-menu button');
    closeMenuButton.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
</script>
