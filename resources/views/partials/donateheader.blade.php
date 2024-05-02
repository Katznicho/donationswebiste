<nav class=" text-white p-4 md:p-6 fixed w-full z-10" id="header" style="background-color: #12B0D1;">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <!-- Make the logo a link -->
          
                 <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-full h-100 mx-auto " class="h-8 w-auto mr-2 px-10">
            </a>
           
            <span class="text-xl font-bold hidden md:inline"></span>
        </div>
        <div class="flex items-center space-x-4 md:space-x-6">
            <button id="menu-toggle" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div id="mobile-menu" class="md:flex sm:hidden md:hidden lg:hidden hidden items-center space-x-4">
                <a href="{{ route('home') }}" class="hover:underline">About</a>
                <a href="{{ route('login') }}" class="hover:underline"><i class ="fa fa-phone" ></i>+2349067322844</a>
                <!-- Remove the "Register" option -->
            </div>
            <!-- Make sure this div is initially visible -->
            {{-- <div id="dropdown-menu" class="hidden md:flex items-center space-x-4">
                <a href="{{ route('home') }}" class="hover:underline">Home</a>
                <a href="{{ route('login') }}" class="hover:underline">Login</a>
                <!-- Remove the "Register" option -->
            </div> --}}
            <div id="dropdown-menu" class="hidden md:flex items-center space-x-4">
                <a href="{{ route('home') }}" class="hover:underline">About</a>
                	<div class="vertical-line" style="height: 30px;"></div>
                <a href="{{ route('login') }}" class="hover:underline"><i class ="fa fa-phone" ></i> &nbsp; +2349067322844</a>
                <!-- Remove the "Register" option -->
            </div>

        </div>
    </div>
</nav>

<style>

div.vertical-line{
      width: 0px; /* Use only border style */
      height: 100%;
      color: white;
      /* float: left;  */
      border: 1px inset; /* This is default border style for <hr> tag */
    }


   </style>

<script>



    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const dropdownMenu = document.getElementById('dropdown-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      
    });
</script>
