<header id="main-header" class="bg-white shadow-md py-4 fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="container mx-auto px-4 flex justify-between items-center transition-all duration-300">
        <!-- Logo Section -->
        <div class="flex items-center space-x-2">
        <a href="https://fountainofpeace.org.ug/" >   <img id="logo" src="{{ asset('images/logo.png') }}" alt="Fountain of Peace Logo" class="h-16 transition-all duration-300"> </a>
        </div>

        <!-- Navigation Links for Medium Screens and Larger -->
        <nav class="hidden md:flex space-x-8">
            <a href="{{ route('home') }}" class="menu-item text-gray-600 font-semibold">Home</a>
            <a href="{{ route('sponsor-child') }}" class="menu-item text-gray-600">Who we are</a>
            <a href="{{ route('donate') }}" class="menu-item text-gray-600">Contact</a>
        </nav>

        <!-- Buttons Section for Medium Screens and Larger -->
        <div class="space-x-2 hidden md:flex">
            <a href="{{ route('donate') }}" class="bg-blue-600 text-white px-8 py-2 hover:bg-blue-700 font-semibold">Donate</a>
            <a href="{{ route('home') }}" class="bg-teal-600 text-white px-8 py-2 hover:bg-teal-700 font-semibold">Sponsor</a>
        </div>

        <!-- Hamburger Icon for Small Screens -->
        <div class="md:hidden">
            <button id="menu-toggle" class="focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Collapsible Side Menu (hidden by default) -->
    <nav id="side-menu" class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50">
        <button id="close-menu" class="text-gray-600 text-2xl p-4 focus:outline-none">
            <i class="fas fa-times"></i>
        </button>
        <ul class="mt-12 space-y-6 px-6">
            <li><a href="{{ route('home') }}" class="block text-gray-600 text-lg">Home</a></li>
            <li><a href="{{ route('sponsor-child') }}" class="block text-gray-600 text-lg">Who we are</a></li>
            <li><a href="{{ route('donate') }}" class="block text-gray-600 text-lg">Contact</a></li>
            <li><a href="{{ route('donate') }}" class="block text-white bg-blue-600 py-2 px-4 text-center rounded hover:bg-blue-700">Donate</a></li>
            <li><a href="{{ route('home') }}" class="block text-white bg-teal-600 py-2 px-4 text-center rounded hover:bg-teal-700">Sponsor</a></li>
        </ul>
    </nav>
</header>

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


<style>
    .menu-item {
        position: relative;
        padding-bottom: 0.5rem;
    }

    .menu-item::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 50%;
        height: 2px;
        background-color: transparent;
        transition: width 0.3s ease, background-color 0.3s ease;
    }

    .menu-item:hover {
        color: black;
    }

    .menu-item:hover::after {
        background-color: black;
        width: 50%;
    }

    /* Sticky Header Customization */
    #main-header.shrink {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        height: 56px; /* Shrinking header height */
    }

    #logo.shrink {
        height: 40px; /* Shrinks logo height */
    }
</style>

<!-- Shrink on Scroll and Hamburger Menu Script -->
<script>
    // Shrink header on scroll
    window.onscroll = function() {
        let header = document.getElementById('main-header');
        let logo = document.getElementById('logo');

        if (window.scrollY > 50) {
            header.classList.add('shrink');
            logo.classList.add('shrink');
        } else {
            header.classList.remove('shrink');
            logo.classList.remove('shrink');
        }
    };

    // Toggle side menu
    const menuToggle = document.getElementById('menu-toggle');
    const closeMenu = document.getElementById('close-menu');
    const sideMenu = document.getElementById('side-menu');

    menuToggle.addEventListener('click', () => {
        sideMenu.classList.toggle('translate-x-full');
    });

    closeMenu.addEventListener('click', () => {
        sideMenu.classList.toggle('translate-x-full');
    });
</script>
