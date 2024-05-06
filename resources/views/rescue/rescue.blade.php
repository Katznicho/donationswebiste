@extends('layouts.home')
@section('title', 'Rescue Baby')
@section('content')
    {{-- add css --}}

    <div class="mx-auto bg-gray-200 py-20 lg:py-40 sm:py-10 px-10 sm:px-5 md:px-20">
        <div class="summary bg-white-300 md:flex-row sm:flex-row flex flex-col md:flex-row rounded-lg shadow-md mb-8 border border-blue-300 sm:h-auto md:h-auto h-100"
            style="background-color: white !important;">
            <img class="w-20 h-20 rounded-full object-cover mx-auto mt-10 mb-0 sm:mt-5 sm:mb-0 md:mr-5 md:ml-10"
                src="https://media.istockphoto.com/id/1446885495/photo/happy-kiss-and-hug-on-mothers-day-in-living-room-sofa-love-and-relaxing-together-in-australia.webp?b=1&s=612x612&w=0&k=20&c=com6YNsX3qRP7dYT3S-eZgr8xMO0jbEYDgU1ERMTz_Q="
                alt="Placeholder Image">
            <div class ="text-left md:text-left: sm:text-left px-5 mt-5 ">
                <h1 class="text-center md:text-left text-lg font-bold mb-2 text-7xl">Your contribution matters</h1>
                <p class="text-gray-600 ">When you sponsor Bethel Babies, you help us provide the specialized care and
                    nutrition that our babies need to give them the best possible start in life. While Bethel baby
                    sponsorship is not for a specific child, your generosity gives a bright future to all the littlest ones
                    in our care.</p>
                <div class="flex flex-col md:flex-row items-center justify-center md:justify-start text-black-600 mt-2 mb-5">
                    <!-- First Checkbox -->
                    {{-- <input type="radio" id="monthlySubscription" class="mr-3 mb-3 md:mb-0 md:mr-5" name="subscriptionType"> --}}
                    <label for="monthlySubscription" class="text-black-600 mr-2"> $33/mth</label>

                    <!-- Second Checkbox (Below for smaller screens) -->
                    {{-- <input type="radio" id="annualSubscription" name="subscriptionType" class="mr-3">
                    <label for="annualSubscription" class="text-black-600"> $420/yr</label> --}}
                </div>
            </div>
        </div>

        <form action="{{ route('child.store') }}" method="POST" class="bg-white-300 py-4 px-4 rounded-lg shadow-md"
            style="background-color: white !important;">


            {{-- add heading contact information --}}
            <h1 class="text-center text-lg font-bold mb-4 text-7xl" style="font-size: 1em; text-align: left;">CONTACT
                INFORMATION</h1>

            <!-- Container to hold children cards -->
            <div id="childrenContainer" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>

            @csrf
            <div class="flex items-center mb-4">
                <label for="toggle" class="inline-flex items-center cursor-pointer mr-2 text-red-50">
                    <span class="sr-only">Toggle</span>
                    <input type="checkbox" id="toggle" name="toggle" value="organization" class="hidden"
                        onclick="handleClick()">
                    <div class="relative">
                        <div class="w-10 h-6 bg-gray-400 rounded-full shadow-inner"></div>
                        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow-md border border-gray-300 transition transform left-0 top-0"
                            id="toggled"></div>
                    </div>
                    <span id="toggle-label" class="ml-2 text-gray-700">Organization</span>
                </label>
            </div>


            {{-- wrap in form --}}
            <div class="border rounded-lg">

                <input type="hidden" id="type" name="is_individual" value="is_individual" />
                {{-- <input type="hidden" id="child_id" name="child_id" value="{{ $child->id }}" />
                <input type="hidden" id="more_sponsor" name="child_ids[]" value="" /> --}}
                <div class="p-1 mb-2" id="organization-fields" style="display: none;">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-1">
                        <div>
                            <label for="organization_name" class="block text-gray-700 font-medium mb-2">Organization Name
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="organization_name" name="organization_name"
                                placeholder="Enter organization name" class="rounded-md border border-gray-300 p-2 w-full">
                        </div>

                        <div>
                            <label for="organization_type" class="block text-gray-700 font-medium mb-2">Organization Type
                                <span class="text-red-500">*</span></label>
                            <select id="organization_type" name="organization_type"
                                class="rounded-md border border-gray-300 p-2 w-full">
                                <option value="" selected disabled>Select Organization Type</option>
                                <option value="Church">Church</option>
                                <option value="School">School</option>
                                <option value="Commercial Enterprise">Commercial Enterprise</option>
                                <option value="Community">Community</option>
                                <option value="Non-Profit Enterprise">Non-Profit Enterprise</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="p-2 mb-0" id="primary-fields" style="display: none;">


                    <h3 class="inline-flex text-gray-900 font-bold text-lg mb-2 mt-2 mr-100">Primary Contact Information
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">


                        <div>
                            <label for="primary_contact_first_name" class="block text-gray-700 font-medium mb-2">First Name
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_first_name" name="primary_contact_first_name"
                                placeholder="Enter primary contact first name"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>
                        <div>
                            <label for="primary_contact_last_name" class="block text-gray-700 font-medium mb-2">Last Name
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_last_name" name="primary_contact_last_name"
                                placeholder="Enter primary contact last name"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>
                        <div>
                            <label for="primary_contact_email" class="block text-gray-700 font-medium mb-2">
                                Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="primary_contact_email" name="primary_contact_email"
                                placeholder="Enter primary contact email address"
                                class="rounded-md border border-gray-300 p-2 w-full ">
                        </div>
                        <div>
                            <label for="primary_contact_phone" class="block text-gray-700 font-medium mb-2">
                                Phone Number <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_phone" name="primary_contact_phone"
                                placeholder="0701234567"
                                class="rounded-md border border-gray-300 p-2 w-full sm:w-full lg:w-80">
                        </div>
                    </div>
                </div>



                <!-- Individual Form -->
                <div class="p-4 mb-8" id="individual-fields">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-gray-700 font-medium mb-2">First Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter your first name"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>


                        <div>
                            <label for="last_name" class="block text-gray-700 font-medium mb-2">Last Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address <span
                                    class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" placeholder="Enter your email address"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Phone Number <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="phone" name="phone_number"
                                class="rounded-md border border-gray-300 p-2 w-full sm:w-full lg:w-80"
                                placeholder="0701234567">
                        </div>

                        <div>
                            <label for="physical_address" class="block text-gray-700 font-medium mb-2">Physical Address
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="physical_address" name="address"
                                placeholder="Enter your physical address"
                                class="rounded-md border border-gray-300 p-2 w-full mt-4"> <!-- Added mt-4 class -->
                        </div>

                        <div>
                            <label for="country" class="block text-gray-700 font-medium mb-5 mt-1 justify-left ">Country
                                <span class="text-red-500">*</span></label>
                            <select id="country" name="country"
                                class="rounded-md border border-gray-300 p-2 w-full mt-5 select2">
                                <option value="">Select Country</option>
                            </select>
                        </div>

                    </div>
                </div>




            </div>




            <!-- Submit Button -->

            {{-- sponsor more --}}
            <div class="flex justify-center my-4 mr-4 ">
                {{-- <button type="button" onclick="showConfirmSponsorMore()"
                    class="mr-5 bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sponsor
                    More</button> --}}

                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceed
                    to Payment</button>
            </div>
        </form>
    </div>

    </div>

    <style>
        ::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color: pink;
        }

        #phone {

            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/intlTelInput-jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/intlTelInput-jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/utils.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/utils.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@20.1.0/build/css/intlTelInput.css">





    <script>
        const input = document.querySelector("#phone");
        window.intlTelInput(input, {
            initialCountry: "ug",
            strictMode: true,
            utilsScript: "/intl-tel-input/js/utils.js?1711461746916" // just for formatting/placeholders etc
        });

        const inputContact = document.querySelector("#primary_contact_phone");
        window.intlTelInput(inputContact, {
            initialCountry: "ug",
            strictMode: true,
            utilsScript: "/intl-tel-input/js/utils.js?1711461746916" // just for formatting/placeholders etc
        });

        function showConfirmSponsorMore() {
            Swal.fire({
                title: 'Thank you for your sponsorship!',
                text: 'Choose preffered way to support more children.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3a57e8', // Tailor to your button color scheme
                cancelButtonColor: '#95a5a6', // Tailor to your button color scheme
                confirmButtonText: 'Choose For Me',
                cancelButtonText: 'Choose for Myself'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form (assuming the form has an ID of 'sponsorForm')
                    document.getElementById('sponsorForm').submit();
                } else {
                    // Redirect to the page where you want to choose for the user
                    window.location.href = '/child';
                }
            });
        }
    </script>

    <script>
        function handleClick() {
            var toggle = document.getElementById("toggle");
            var organizationFields = document.getElementById("organization-fields");
            var primaryFields = document.getElementById("primary-fields");
            var toggleLabel = document.getElementById("toggle-label");
            var individualFields = document.getElementById("individual-fields");
            var type = document.getElementById("type");

            if (toggle.checked) {
                type.value = "is_individual"
                organizationFields.style.display = "none";
                primaryFields.style.display = "none";
                toggle.value = "Organization";
                toggleLabel.innerText = "Organization";
                document.getElementById('toggled').style.transform = "translateX(0px)";
                document.getElementById('toggled').style.backgroundColor = "#fff";
                individualFields.style.display = "block";

            } else {
                type.value = "is_organization"
                organizationFields.style.display = "block";
                primaryFields.style.display = "block";
                toggle.value = "organization";
                toggleLabel.innerText = "Organization";
                document.getElementById('toggled').style.transform = "translateX(22px)";
                //color: #3a57e8
                document.getElementById('toggled').style.backgroundColor = "#3a57e8";
                individualFields.style.display = "none";
            }
        }
    </script>
@endsection

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {
        // Fetch countries using AJAX
        $.ajax({
            url: '{{ route('countries.fetchAndStore') }}', // Update with your route URL
            type: 'GET',
            success: function(response) {
                var countrySelect = $('#country');

                // Populate select dropdown with country names
                $.each(response, function(index, country) {
                    countrySelect.append($('<option>', {
                        value: country
                            .name, // Assuming 'id' is the primary key field
                        text: country.name
                    }));
                });

                // Initialize Select2 with searchable option
                countrySelect.select2({
                    placeholder: "Select Country", // Optional placeholder text
                    minimumInputLength: 2, // Optional minimum characters to trigger search

                });
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });

    });
</script>

<script type="text/javascript">
    {{-- Success Message --}}
    @if (Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Done',
            text: '{{ Session::get('success') }}',
            confirmButtonColor: "#3a57e8"
        });
    @endif
    {{-- Errors Message --}}
    @if (Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Opps!!!',
            text: '{{ Session::get('error') }}',
            confirmButtonColor: "#3a57e8"
        });
    @endif
    @if (Session::has('errors') || (isset($errors) && is_array($errors) && $errors->any()))
        Swal.fire({
            icon: 'error',
            title: 'Opps!!!',
            text: '{{ Session::get('errors')->first() }}',
            confirmButtonColor: "#3a57e8"
        });
    @endif
</script>
