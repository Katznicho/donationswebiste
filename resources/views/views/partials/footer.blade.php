<footer class="footer py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- First column -->
        <div class="text-white mr-20 justify-start">
            {{-- <h2 class="text-lg font-semibold mb-4">Quick Links</h2> --}}
            <!-- Add more links as needed -->

            <i class="fa fa-phone mr-2"></i>+44 1494 758998
            <br>

            <!-- Email Icon -->
            <i class="fa fa-envelope mr-2"></i>&nbsp;info@fountainofpeace.net

            <br>
            <br>

            <p>
                Registered Charity in England and Wales No. 1117909, Scotland SC053272
            </p>

            <br>
            <br>

            <div class="flex justify-start icons">

                <i class="facebook" style="">
                    <img src="{{ asset('images/facebook.png') }}" alt="logo" class="mr-2" width="20" height="30">
                </i>
                <i class="twitter">
                    <img src="{{ asset('images/twitter (1).png') }}" alt="logo" class="mr-2" width="20" height="30">
                </i>
                <i class="youtube">
                    <img src="{{ asset('images/youtube.png') }}" alt="logo" width="25" height="40"
                        class="mt-0 mr-2">
                </i>
                <i class="instagram">
                    <img src="{{ asset('images/instagram.png') }}" alt="logo" width="20" height="20">
                </i>
            </div>
        </div>

        <!-- Second column -->
        <div class="text-white justify-center">

            <ul>
                <li><a href="#" class="block py-1">Site Map</a></li>
                <li><a href="#" class="block py-1">Privacy & Cookies</a></li>
                <li><a href="#" class="block py-1">Terms of Use</a></li>
                <li><a href="#" class="block py-1">Anti Spam Policy</a></li>
                <li><a href="#" class="block py-1">Safeguarding Policy</a></li>
                <!-- Add more links as needed -->



            </ul>
        </div>

        <!-- Third column -->
        <div class="text-white justify-center">
            {{-- <h2 class="text-lg font-semibold mb-4">Subscribe</h2> --}}
            <div class="grid grid-rows-2 gap-2 ">
                <button class="donate hover:bg-blue-600 text-white w-40 px-2 py-2 rounded-full"
                    style="background-color: #E31F62;">Donate Now</button>
                <button class=" hover:bg-red-600 text-white px-2 w-60 py-2 rounded-full"
                    style="background-color: #12B0D1;">Subscribe to our Newletter</button>
            </div>
            <br>
            <br>
            {{-- add copy right --}}
            <p class="mb-5"> &copy; Copyright 2024 </p>

            <p class="flex"> Built by &nbsp; &nbsp; <img src="{{ asset('images/footer logo.png') }}"> </p>

        </div>
    </div>
</footer>

<style>
    .footer {
        background-color: #0F5078;
    }

    {{-- center align everything on small media --}}
    @media (max-width: 640px) {
        .footer {
            text-align: center;
            justify-content: center;
        }

        .footer div {
            margin: 0 auto;
        }

        .icons {
            justify-content: center;
        }

        .donate {
            margin-left: 40px;
        }
    }

   
</style>
