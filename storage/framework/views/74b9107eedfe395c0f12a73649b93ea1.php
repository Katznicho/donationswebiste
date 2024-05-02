
<?php $__env->startSection('title', 'Rescue Child'); ?>
<?php $__env->startSection('content'); ?>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="mx-auto py-20 lg:py-40 sm:py-10 px-10 sm:px-5 md:px-20">
        <div
            class="summary bg-gray-300 md:flex-row sm:flex-row flex flex-col md:flex-row rounded-lg shadow-md mb-8 border border-blue-300 sm:h-auto md:h-auto h-100">
            <img class="w-20 h-20 rounded-full object-cover mx-auto mt-5 mb-0 sm:mt-5 sm:mb-0 md:mr-5 md:ml-10"
                src="<?php echo e($child->profile_picture); ?>" alt="Placeholder Image">

            <?php
                // Calculate age based on date of birth
                $dob = new DateTime($child->date_of_birth);
                $now = new DateTime();
                $age = $now->diff($dob)->y;
            ?>

            <div class="text-center md:text-left">
                <h3 class="font-bold mb-0 text-xl mt-5 text-blue-900"><?php echo e($child->first_name); ?> <?php echo e($child->second_name); ?>

                    <span class="ageup"><?php echo e($age); ?> yrs</span>
                </h3>

                <?php
                    // Format date of birth to show date and month only with suffix
                    $dob = new DateTime($child->date_of_birth);
                    $day = $dob->format('d'); // Get the day
                    $suffix = date('S', strtotime($day)); // Determine the suffix
                    $formatted_dob = $dob->format('jS F Y'); // 'j' for day without leading zeros, 'S' for suffix, 'F' for full month name
                ?>

                <p class="text-black-600 mt-0">Birthday: <?php echo e($formatted_dob); ?></p>

                <div
                    class="flex flex-col md:flex-row items-center justify-center md:justify-start text-black-600 mt-5 mb-5">
                    <!-- First Checkbox -->
                    <input type="radio" id="monthlySubscription" class="mr-3 mb-3 md:mb-0 md:mr-5"
                        name="subscriptionType">
                    <label for="monthlySubscription" class="text-black-600 mr-2"> $35/mth</label>

                    <!-- Second Checkbox (Below for smaller screens) -->
                    <input type="radio" id="annualSubscription" name="subscriptionType" class="mr-3">
                    <label for="annualSubscription" class="text-black-600"> $420/yr</label>
                </div>
            </div>
        </div>


        <form action="<?php echo e(route('child.store')); ?>" method="POST">

            <!-- Container to hold children cards -->
            <div id="childrenContainer" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>

            <?php echo csrf_field(); ?>
            <div class="flex items-center mb-4">
                <label for="toggle" class="inline-flex items-center cursor-pointer mr-2 text-red-50">
                    <span class="sr-only">Toggle</span>
                    <input type="checkbox" id="toggle" name="toggle" value="individual" class="hidden"
                        onclick="handleClick()">
                    <div class="relative">
                        <div class="w-10 h-6 bg-gray-400 rounded-full shadow-inner"></div>
                        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow-md border border-gray-300 transition transform left-0 top-0"
                            id="toggled"></div>
                    </div>
                    <span id="toggle-label" class="ml-2 text-gray-700">Organization</span>
                </label>
            </div>

            
            <div class="border rounded-lg">

                <input type="hidden" id="type" name="is_individual" value="is_individual" />
                <input type="hidden" id="child_id" name="child_id" value="<?php echo e($child->id); ?>" />
                <input type="hidden" id="more_sponsor" name="child_ids[]" value="" />
                <div class="p-4 mb-8" id="organization-fields" style="display: none;">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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
                <div class="p-4 mb-8" id="primary-fields" style="display: none;">


                    <h3 class="inline-flex text-gray-900 font-bold text-lg mb-2 mt-5 mr-100">Primary Contact Information
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
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>
                        <div>
                            <label for="primary_contact_phone" class="block text-gray-700 font-medium mb-2">
                                Phone Number <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_phone" name="primary_contact_phone"
                                placeholder="Enter primary contact phone number"
                                class="rounded-md border border-gray-300 p-2 w-full">
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
                            <input type="text" id="phone_number" name="phone_number"
                                placeholder="Enter your phone number"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>

                        <div>
                            <label for="physical_address" class="block text-gray-700 font-medium mb-2">Physical Address
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="physical_address" name="address"
                                placeholder="Enter your physical address"
                                class="rounded-md border border-gray-300 p-2 w-full mt-4"> <!-- Added mt-4 class -->
                        </div>
                        <div>
                            <label for="zip_code" class="block text-gray-700 font-medium mb-2">Zip/Postal Code <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="zip_code" name="zip_code"
                                placeholder="Enter your zip/postal code"
                                class="rounded-md border border-gray-300 p-2 w-full mt-4"> <!-- Added mt-4 class -->
                        </div>
                        <div>
                            <label for="country" class="block text-gray-700 font-medium mb-2 justify-left">Country <span
                                    class="text-red-500">*</span></label>
                            <select id="country" name="country"
                                class="rounded-md border border-gray-300 p-2 w-full mt-4">
                                <option value="">Select Country</option>
                            </select>
                        </div>

                    </div>
                </div>




            </div>




            <!-- Submit Button -->

            
            <div class="flex justify-center my-4 mr-4 ">
                <button type="button" onclick="showConfirmSponsorMore()"
                    class="mr-5 bg-gray-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sponsor
                    More</button>

                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceed
                    to Payment</button>
            </div>
        </form>
    </div>



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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.6/sweetalert2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showConfirmSponsorMore() {
            Swal.fire({
                title: 'Choose For Me',
                html: '<form id="sponsorForm">' +
                    '<div class="mb-4">' +
                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="gender">' +
                    'Gender' +
                    '</label>' +
                    '<select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="gender" name="gender">' +
                    '<option value="Male">Male</option>' +
                    '<option value="Female">Female</option>' +
                    '<option value="Any">Any</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="mb-4">' +
                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="children">' +
                    'Number of Children' +
                    '</label>' +
                    '<input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="children" name="children" type="number" min="1" max="10" value="1">' +
                    '</div>' +
                    '<div class="mb-4">' +
                    '<label class="block text-gray-700 text-sm font-bold mb-2" for="age_range">' +
                    'Age Range' +
                    '</label>' +
                    '<select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="age_range" name="age_range">' +
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
                    formData.append('_token', '<?php echo e(csrf_token()); ?>');
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
            <div class="mx-auto rounded-lg shadow-md mb-8 border border-blue-300 summary bg-gray-300 md:flex-row sm:flex-row flex flex-col md:flex-row rounded-lg shadow-md mb-8 border border-blue-300 sm:h-auto md:h-auto">
                <img class="mx-auto w-20 h-20 rounded-full object-cover mx-auto mt-5 mb-0 sm:mt-5 sm:mb-0 md:mr-5 md:ml-10" src="${child.profile_picture}" alt="Placeholder Image">
                <div>
                    <h3 class="font-bold mb-0 text-xl mt-5 text-blue-900">${child.first_name} ${child.second_name} <span class="ageup">${age} yrs</span></h3>
                    <p class="text-blue-600 mt-0">Birthday: ${formattedDob}</p>
                    <p class="text-blue-600 mt-5 mb-5">$35/month</p>
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






<?php $__env->stopSection(); ?>

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



<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.21.1/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Fetch countries using AJAX
        $.ajax({
            url: '<?php echo e(route('countries.fetchAndStore')); ?>', // Update with your route URL
            type: 'GET',
            success: function(response) {
                var countrySelect = $('#country');

                // Populate select dropdown with country names
                $.each(response, function(index, country) {
                    countrySelect.append($('<option>', {
                        value: country
                            .id, // Assuming 'id' is the primary key field
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
    
    <?php if(Session::has('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Done',
            text: '<?php echo e(Session::get('success')); ?>',
            confirmButtonColor: "#3a57e8"
        });
    <?php endif; ?>
    
    <?php if(Session::has('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Opps!!!',
            text: '<?php echo e(Session::get('error')); ?>',
            confirmButtonColor: "#3a57e8"
        });
    <?php endif; ?>
    <?php if(Session::has('errors') || (isset($errors) && is_array($errors) && $errors->any())): ?>
        Swal.fire({
            icon: 'error',
            title: 'Opps!!!',
            text: '<?php echo e(Session::get('errors')->first()); ?>',
            confirmButtonColor: "#3a57e8"
        });
    <?php endif; ?>
</script>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\Bethel Donations\dummy\dummy_new_23rd\resources\views/contact.blade.php ENDPATH**/ ?>