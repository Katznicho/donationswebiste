<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo and Description Section -->
        <div>
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Fountain of Peace Logo" class="h-12">
            </div>
            <p class="text-gray-400 leading-relaxed">
                We provide orphaned and abandoned children with a loving Christian home where they receive all the 
                <strong>love</strong>, <strong>care</strong>, <strong>protection</strong>, and practical 
                <strong>support</strong> they need to thrive.
            </p>
            <div class="mt-4 flex space-x-4">
                <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Contact Info Section -->
        <div>
            <h2 class="font-semibold mb-4">Contact Info</h2>
            <p>Kyenjojo, Uganda</p>
            <p class="mt-4 space-y-4">
                <span><i class="fas fa-phone-alt text-green-400"></i> +256-700-902-465</span><br>
                <span><i class="fas fa-phone-alt text-green-400"></i> +256-700-902-465</span><br>
                <span><i class="fas fa-envelope text-green-400"></i> info@fountainofpeace.org.ug</span>
            </p>
        </div>

        <!-- Quick Links Section -->
        <div>
            <h2 class="font-semibold mb-4">Quick Links</h2>
            <ul class="space-y-4">
                <li>&gt; &nbsp;<a href="#" class="hover:underline">Who we are</a></li>
                <hr class="border-pale-grey">
                <li>&gt; &nbsp;<a href="#" class="hover:underline">Sponsor a Child</a></li>
                <hr class="border-pale-grey">
                <li>&gt; &nbsp;<a href="#" class="hover:underline">Donate</a></li>
                <hr class="border-pale-grey">
                <li>&gt; &nbsp;<a href="#" class="hover:underline">Contact</a></li>
                <hr class="border-pale-grey">
            </ul>
        </div>

        <!-- Urgent Causes Section -->
        <div>
            <h2 class="font-semibold mb-4">Urgent Causes</h2>
            <div class="mb-4 flex items-start">
                <img src="{{ asset('images/urgent1.jpg') }}" alt="Placeholder Image" class="h-16 w-16 rounded mr-4">
                <div>
                    <p class="mb-2">Second Hand Goods Donation</p>
                    <div class="w-full bg-gray-400 h-2 mb-1">
                        <div class="bg-blue-600 h-2" style="width: 29%"></div>
                    </div>
                    <p class="text-sm text-gray-500">29% DONATED</p>
                </div>
            </div>
            
            <div class="mb-4 flex items-start">
                <img src="{{ asset('images/urgent2.jpg') }}" alt="Placeholder Image" class="h-16 w-16 rounded mr-4">
                <div>
                    <p class="mb-2">Education Needed</p>
                    <div class="w-full bg-gray-400 h-2 mb-1">
                        <div class="bg-blue-600 h-2" style="width: 40%"></div>
                    </div>
                    <p class="text-sm text-gray-500">40% DONATED</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <img src="{{ asset('images/urgent3.jpg') }}" alt="Placeholder Image" class="h-16 w-16 rounded mr-4">
                <div>
                    <p class="mb-2">Save Child Africa</p>
                    <div class="w-full bg-gray-400 h-2 mb-1">
                        <div class="bg-blue-600 h-2" style="width: 51%"></div>
                    </div>
                    <p class="text-sm text-gray-500">51% DONATED</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="container mx-auto mt-8 border-t border-gray-700 pt-6 text-center">
        <div class="md:flex justify-between items-center space-y-4 md:space-y-0">
            <p class="text-gray-400">Privacy Policy | Terms Of Use</p>
            <p class="text-gray-400">Copyright 2024 Fountain of Peace Children's Foundation Uganda, All Rights Reserved</p>
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
