
<?php $__env->startSection('title', 'Rescue Child'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container mx-auto py-40 px-40">
        <!-- Card with individual information -->
        <div class="flex rounded-lg shadow-md mb-8">
            <img class="w-24 h-20 rounded-full object-cover mr-10 mt-2 mb-4 ml-10" src="<?php echo e($child->profile_picture); ?>"
                alt="Placeholder Image">

            <div>
                <h3 class="text-lg font-bold mb-2 text-3xl"><?php echo e($child->first_name); ?>

                    <?php echo e($child->second_name); ?></h3>


                <p class="text-gray-600"><?php echo e($child->story); ?></p>


                <p class="text-gray-600">$35,000</p>



            </div>
        </div>

        <form action="<?php echo e(route('child.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="flex items-center mb-4">
                <label for="toggle" class="inline-flex items-center cursor-pointer mr-2">
                    <span class="sr-only">Toggle</span>
                    <input type="checkbox" id="toggle" name="toggle" value="individual" class="hidden"
                        onclick="handleClick()">
                    <div class="relative">
                        <div class="w-10 h-6 bg-gray-400 rounded-full shadow-inner"></div>
                        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow-md border border-gray-300 transition transform left-0 top-0"
                            id="toggled"></div>
                    </div>
                    <span id="toggle-label" class="ml-2 text-gray-700">Individual</span>
                </label>
            </div>

            
            <div class="border rounded-lg">

                <input type="hidden" id="type" name="is_individual" value="is_individual" />
                <input type="hidden" id="child_id" name="child_id" value="<?php echo e($child->id); ?>" />
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
                        <div>
                            <label for="primary_contact_first_name" class="block text-gray-700 font-medium mb-2">Primary
                                Contact First Name <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_first_name" name="primary_contact_first_name"
                                placeholder="Enter primary contact first name"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>
                        <div>
                            <label for="primary_contact_last_name" class="block text-gray-700 font-medium mb-2">Primary
                                Contact Last Name <span class="text-red-500">*</span></label>
                            <input type="text" id="primary_contact_last_name" name="primary_contact_last_name"
                                placeholder="Enter primary contact last name"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>
                        <div>
                            <label for="primary_contact_email" class="block text-gray-700 font-medium mb-2">Primary Contact
                                Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="primary_contact_email" name="primary_contact_email"
                                placeholder="Enter primary contact email address"
                                class="rounded-md border border-gray-300 p-2 w-full">
                        </div>
                        <div>
                            <label for="primary_contact_phone" class="block text-gray-700 font-medium mb-2">Primary Contact
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

                <!-- Submit Button -->

                
                <div class="flex justify-center my-4 mr-4 ">
                    <button type="button" onclick="showConfirmSponsorMore()"
                        class="mr-5 bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sponsor
                        More</button>
                
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proceed
                        to Payment</button>
                </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.6/sweetalert2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                }
                else {
                    // Redirect to the page where you want to choose for the user
                    window.location.href = '/child';
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>



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
                    minimumInputLength: 2, // Optional minimum characters to trigger search

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
        var toggleLabel = document.getElementById("toggle-label");
        var individualFields = document.getElementById("individual-fields");
        var type = document.getElementById("type");

        if (toggle.checked) {
            type.value = "is_individual"
            organizationFields.style.display = "none";
            toggle.value = "individual";
            toggleLabel.innerText = "Individual";
            document.getElementById('toggled').style.transform = "translateX(0px)";
            individualFields.style.display = "block";

        } else {
            type.value = "is_organization"
            organizationFields.style.display = "block";
            toggle.value = "organization";
            toggleLabel.innerText = "Organization";
            document.getElementById('toggled').style.transform = "translateX(22px)";
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

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\Bethel Donations\dummy2\New folder\dummy2 (2)\dummy2\resources\views/contact.blade.php ENDPATH**/ ?>