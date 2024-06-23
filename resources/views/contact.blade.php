@extends('layouts.home')
@section('title', 'Rescue Child')
@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="px-10 py-20 mx-auto bg-gray-200 lg:py-40 sm:py-10 sm:px-5 md:px-20">
        <div class="flex flex-col mb-8 border border-blue-300 rounded-lg shadow-md bg-white-300 summary md:flex-row sm:flex-row sm:h-auto md:h-auto h-100"
            style="background-color: white !important;">
            <img class="object-cover w-20 h-20 mx-auto mt-5 mb-0 rounded-full sm:mt-5 sm:mb-0 md:mr-5 md:ml-10"
                src="{{ $child->profile_picture }}" alt="Placeholder Image">

            @php
                // Calculate age based on date of birth
                $dob = new DateTime($child->date_of_birth);
                $now = new DateTime();
                $age = $now->diff($dob)->y;
            @endphp

            <div class="text-center md:text-left ">
                <h3 class="mt-5 mb-0 text-xl font-bold text-blue-900">{{ $child->first_name }} {{ $child->second_name }}
                    <span class="ageup">{{ $age }} yrs</span>
                </h3>

                @php
                    // Format date of birth to show date and month only with suffix
                    $dob = new DateTime($child->date_of_birth);
                    $day = $dob->format('d'); // Get the day
                    $suffix = date('S', strtotime($day)); // Determine the suffix
                    $formatted_dob = $dob->format('jS F Y'); // 'j' for day without leading zeros, 'S' for suffix, 'F' for full month name
                @endphp

                <p class="mt-0 text-black-600">Birthday: {{ $formatted_dob }}</p>

                <div
                    class="flex flex-col items-center justify-center mt-5 mb-5 md:flex-row md:justify-start text-black-600">
                    <!-- First Checkbox -->
                    {{-- <input type="radio" id="monthlySubscription" class="mb-3 mr-3 md:mb-0 md:mr-5"
                        name="subscriptionType"> --}}
                    <label for="monthlySubscription" class="mr-2 text-black-600"> $35/mth</label>

                    <!-- Second Checkbox (Below for smaller screens) -->
                    {{-- <input type="radio" id="annualSubscription" name="subscriptionType" class="mr-3">
                    <label for="annualSubscription" class="text-black-600"> $420/yr</label> --}}
                </div>
            </div>
        </div>


        <form id="myForm" method="POST" style="background-color: white !important;"
            class="p-4 rounded-lg shadow-md">


            <h1 class="mb-4 text-lg font-bold text-center text-7xl" style="font-size: 1em; text-align: left;">CONTACT
                INFORMATION</h1>
            <!-- Container to hold children cards -->
            <div id="childrenContainer" class="grid grid-cols-1 gap-4 sm:grid-cols-2"></div>

            @csrf
            <div class="flex items-center mb-4">
                <label for="toggle" class="inline-flex items-center mr-2 cursor-pointer text-red-50">
                    <span class="sr-only">Toggle</span>
                    <input type="checkbox" id="toggle" name="toggle" value="individual" class="hidden"
                        onclick="handleClick()">
                    <div class="relative">
                        <div class="w-10 h-6 bg-gray-400 rounded-full shadow-inner"></div>
                        <div class="absolute top-0 left-0 w-6 h-6 transition transform bg-white border border-gray-300 rounded-full shadow-md dot"
                            id="toggled"></div>
                    </div>
                    <span id="toggle-label" class="ml-2 text-gray-700">Organization</span>
                </label>
            </div>

            {{-- wrap in form --}}
            <div class="border rounded-lg">

                <input type="hidden" id="type" name="is_individual" value="is_individual" />
                <input type="hidden" id="child_id" name="child_id" value="{{ $child->id }}" />
                <input type="hidden" id="more_sponsor" name="child_ids[]" value="" />
                <div class="p-4 mb-8" id="organization-fields" style="display: none;">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="organization_name" class="block mb-2 font-medium text-gray-700">Organization Name
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="organization_name" name="organization_name"
                                placeholder="Enter organization name" class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="organization_type" class="block mb-2 font-medium text-gray-700">Organization Type
                                <span class="text-red-500">*</span></label>
                            <select id="organization_type" name="organization_type"
                                class="w-full p-2 border border-gray-300 rounded-md">
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
                <div class="p-4 mb-8" id="primary-fields" style="display: none;">


                    <h3 class="inline-flex mt-5 mb-2 text-lg font-bold text-gray-900 mr-100">Primary Contact Information
                    </h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">


                        <div>
                            <label for="primary_contact_first_name" class="block mb-2 font-medium text-gray-700">First Name
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_first_name" name="primary_contact_first_name"
                                placeholder="Enter primary contact first name"
                                class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="primary_contact_last_name" class="block mb-2 font-medium text-gray-700">Last Name
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_last_name" name="primary_contact_last_name"
                                placeholder="Enter primary contact last name"
                                class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="primary_contact_email" class="block mb-2 font-medium text-gray-700">
                                Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="primary_contact_email" name="primary_contact_email"
                                placeholder="Enter primary contact email address"
                                class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="primary_contact_phone" class="block mb-2 font-medium text-gray-700">
                                Phone Number <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_phone" name="primary_contact_phone"
                                placeholder="0701234567"
                                class="w-full p-2 border border-gray-300 rounded-md sm:w-full lg:w-80">
                        </div>
                    </div>
                </div>



                <!-- Individual Form -->
                <div class="p-4 mb-8" id="individual-fields">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="first_name" class="block mb-2 font-medium text-gray-700">First Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="first_name" name="first_name" placeholder="Enter your first name"
                                class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 font-medium text-gray-700">Last Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="last_name" name="last_name" placeholder="Enter your last name"
                                class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 font-medium text-gray-700">Email Address <span
                                    class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" placeholder="Enter your email address"
                                class="w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 font-medium text-gray-700">Phone Number <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="phone" name="phone_number"
                                class="w-full p-2 border border-gray-300 rounded-md sm:w-full lg:w-80"
                                placeholder="0701234567">
                        </div>

                        <div>
                            <label for="physical_address" class="block mb-2 font-medium text-gray-700">Physical Address
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="physical_address" name="address"
                                placeholder="Enter your physical address"
                                class="w-full p-2 mt-4 border border-gray-300 rounded-md"> <!-- Added mt-4 class -->
                        </div>

                        <div>
                            <label for="country" class="block mb-2 font-medium text-gray-700 justify-left">Country <span
                                    class="text-red-500">*</span></label>
                            <select id="country" name="country"
                                class="w-full p-2 mt-4 border border-gray-300 rounded-md select2">
                                <option value="">Select Country</option>
                            </select>
                        </div>

                    </div>
                </div>




            </div>

            <!-- Submit Button -->

            {{-- sponsor more --}}
            <div class="flex justify-center my-4 mr-4 ">
                <button type="button" onclick="showConfirmSponsorMore()"
                    class="px-4 px-6 py-2 py-3 mr-5 font-bold text-white bg-gray-600 rounded rounded-md hover:bg-blue-700">Sponsor
                    More</button>

                <button type="submit"
                    class="px-4 px-6 py-2 py-3 font-bold text-white bg-blue-500 rounded rounded-md hover:bg-blue-700">Proceed
                    to Payment</button>
            </div>
        </form>
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
    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.6/sweetalert2.min.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/intlTelInput-jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/intlTelInput-jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/utils.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.2.0/js/utils.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@20.1.0/build/css/intlTelInput.css">

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


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


    <script>
        function showConfirmSponsorMore() {
            Swal.fire({
                title: 'Thank you for your generosity',
                text: 'You can choose for yourself another child or mother from our profiles or opt for us to choose one for you',
                icon: 'success',
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

    <!-- choose for me form-->



    <script>
        function showConfirmSponsorMore() {
            Swal.fire({
                title: 'Choose For Me',
                html: '<form id="sponsorForm">' +
                    '<div class="mb-4">' +
                    '<label class="block mb-2 text-sm font-bold text-gray-700" for="gender">' +
                    'Gender' +
                    '</label>' +
                    '<select class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline" id="gender" name="gender">' +
                    '<option value="Male">Male</option>' +
                    '<option value="Female">Female</option>' +
                    '<option value="Any">Any</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="mb-4">' +
                    '<label class="block mb-2 text-sm font-bold text-gray-700" for="children">' +
                    'Number of Children' +
                    '</label>' +
                    '<input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline" id="children" name="children" type="number" min="1" max="10" value="1">' +
                    '</div>' +
                    '<div class="mb-4">' +
                    '<label class="block mb-2 text-sm font-bold text-gray-700" for="age_range">' +
                    'Age Range' +
                    '</label>' +
                    '<select class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline" id="age_range" name="age_range">' +
                    '<option value="1">3-10 years</option>' +
                    '<option value="2">11-16 years</option>' +
                    '<option value="3">17-21 years</option>' +
                    '</select>' +
                    '</div>' +
                    '</form>',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                confirmButtonColor: '#3a57e8', // Tailor to your button color scheme
                cancelButtonColor: '#95a5a6', // Tailor to your button color scheme
                confirmButtonText: 'Proceed',
                cancelButtonText: 'or Choose For Myself',
                allowOutsideClick: false // Prevent redirection when clicking outside the alert,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Handle form submission here
                    const formData = new FormData(document.getElementById('sponsorForm'));
                    // Add CSRF token to the formData
                    formData.append('_token', '{{ csrf_token() }}');
                    // Make an AJAX request to your backend
                    fetch('/sponsorMore', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            let childrenContainer = document.getElementById('childrenContainer');

                            // Clear existing content in the container
                            childrenContainer.innerHTML = '';
                            // Initialize an array to store the IDs of the children being sponsored
                            let sponsoredChildIds = [];

                            // Loop through the returned children data
                            data?.data?.forEach(child => {
                                if (child) {
                                    // Calculate age based on date of birth
                                    let dob = new Date(child.date_of_birth);
                                    let now = new Date();
                                    let age = now.getFullYear() - dob.getFullYear();
                                    if (now.getMonth() < dob.getMonth() || (now.getMonth() === dob
                                            .getMonth() && now.getDate() < dob.getDate())) {
                                        age--;
                                    }

                                    // Format date of birth
                                    let formattedDob = dob.getDate() + nth(dob.getDate()) + ' ' +
                                        monthNames[dob.getMonth()] + ' ' + dob.getFullYear();

                                    // Construct HTML for child card
                                    let childHtml = `
            <div class="flex flex-col mx-auto mb-8 bg-gray-300 border border-blue-300 rounded-lg shadow-md summary md:flex-row sm:flex-row sm:h-auto md:h-auto">
                <img class="object-cover w-20 h-20 mx-auto mt-5 mb-0 rounded-full sm:mt-5 sm:mb-0 md:mr-5 md:ml-10" src="${child.profile_picture}" alt="Placeholder Image">
                <div>
                    <h3 class="mt-5 mb-0 text-xl font-bold text-blue-900">${child.first_name} ${child.second_name} <span class="ageup">${age} yrs</span></h3>
                    <p class="mt-0 text-blue-600">Birthday: ${formattedDob}</p>
                    <p class="mt-5 mb-5 text-blue-600">$35/month</p>
                </div>
            </div>
        `;

                                    // Append child card HTML to the container
                                    childrenContainer.insertAdjacentHTML('beforeend', childHtml);

                                    // Add the ID of the sponsored child to the array
                                    sponsoredChildIds.push(child.id);
                                }
                            });
                            console.log(sponsoredChildIds);
                            // Set the value of the hidden input field 'more_sponsor' to contain the IDs of the sponsored children
                            document.getElementById('more_sponsor').value = sponsoredChildIds.join(',');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });

                } else {
                    // Redirect to a specific section on the same page
                    window.location.href = '/child#cardsSection';
                }
            });
        }

        // Function to get the suffix for a day
        function nth(day) {
            if (day > 3 && day < 21) return 'th';
            switch (day % 10) {
                case 1:
                    return "st";
                case 2:
                    return "nd";
                case 3:
                    return "rd";
                default:
                    return "th";
            }
        }

        // Array of month names
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
    </script>






@endsection

<style>
    .ageup {
        color: blue;
        font-size: 16px;
        font-weight: normal;
        color: #00008c;
    }

    .summary {
        /* Default styles */

        width: 100%;
        /* Default width for smaller screens */
    }

    /* Media query for screens with a minimum width of 768px */
    @media screen and (min-width: 768px) {
        .summary {
            width: 60%;
            /* Set width to 50% for screens wider than 768px */
        }
    }

    /* Media query for screens with a minimum width of 1024px */
    @media screen and (min-width: 1024px) {
        .summary {
            width: 50%;
            /* Set width to 33.33% for screens wider than 1024px */
        }


    }
</style>




<script type="text/javascript">
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
                    minimumInputLength: 0, // Optional minimum characters to trigger search

                });
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });

    });

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
            toggle.value = "individual";
            //toggleLabel.innerText = "Individual";
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





<script>


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myForm').on('submit', function(e) {
            e.preventDefault();

            // Create a FormData object from the form element
            var formData = new FormData(this);

            // Append CSRF token to FormData
            formData.append('_token', '{{ csrf_token() }}');

            // AJAX request
            $.ajax({
                url: '{{ route('sponsor-child') }}', // Replace with your route
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log("=============returned response===================");
                    console.log(response);
                    console.log("=========returned response=======================");

                    // Assuming response contains necessary data for redirection
                    const checkoutData = {
                        transactionReference: response.transactionReference,
                        orderId: response.orderId,
                        amount: response.amount||1000,
                        dateOfPayment: response.dateOfPayment,
                        redirectUrl: response.redirectUrl,
                        narration: response.narration,
                        expiryTime: response.expiryTime,
                        customerId: response.customerId,
                        customerFirstName: response.customerFirstName,
                        customerSecondName: response.customerSecondName,
                        customerEmail: response.customerEmail,
                        customerMobile: response.customerMobile,
                        merchantCode: response.merchantCode,
                        terminalType: "WEB",
                        domain: "ISWKE",
                        currencyCode: "UGX",
                        displayPrivacyPolicy: response.displayPrivacyPolicy,
                        fee: "0",
                        iconUrl: response.iconUrl,
                        providerIconUrl: "https://gatewaybackend-uat.quickteller.co.ke/ipg-backend/api/merchant-logo",
                        primaryAccentColor: "#3a57e8",
                        redirectMerchantName: "Fountain of Peace",
                        merchantName: "Fountain of Peace",
                        customerCity: "Kampala",
                        customerCountry: "Uganda",
                        customerState: "Kampala"
                    };

                    console.log("=============checkout data===================");
                    console.log(checkoutData);
                    console.log("=========checkout data=======================");

                    // Function to handle the redirection
                    function checkout(jsonData) {
                        const checkoutForm = document.createElement("form");
                        checkoutForm.style.display = "none";
                        checkoutForm.method = "POST";
                        checkoutForm.action = "https://gatewaybackend-uat.quickteller.co.ke/ipg-backend/api/checkout";
                        checkoutForm.target = "_blank";

                        for (const key in jsonData) {
                            const formField = document.createElement("input");
                            formField.name = key;
                            formField.value = jsonData[key];
                            checkoutForm.appendChild(formField);
                        }

                        document.body.appendChild(checkoutForm);
                        checkoutForm.submit();
                        document.body.removeChild(checkoutForm);
                    }

                    checkout(checkoutData);
                },
                error: function(xhr) {
                    console.log("error");
                    console.log(xhr);
                    // Handle error response
                    $('#response').html('<p>An error occurred: ' + xhr.responseText + '</p>');
                }
            });
        });
    });
</script>


