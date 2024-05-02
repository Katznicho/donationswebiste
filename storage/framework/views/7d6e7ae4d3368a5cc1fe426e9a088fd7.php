
<?php $__env->startSection('title', 'Child'); ?>
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />


    <div class="py-20 lg:py-20 px-7 lg:px-20">
        <!-- Tabs Section -->
        <?php echo $__env->make('components.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Tabs Section -->
        <div class="flex justify-between items-center mb-10 mt-10 cursor-pointer">
            <div class="flex space-x-5">
                <h1 id="tab1" class="tab cursor-pointer font-bold text-lg text-gray-300 border-b border-gray-300"
                    onclick="toggleTab('tab1')">Rescue a baby</h1>
                <p id="tab2" class="tab tab-active cursor-pointer font-bold text-lg  text-blue-900"
                    onclick="toggleTab('tab2')">Sponsor a Child</p>
                
            </div>
        </div>
        <!-- child tab-->
        <?php echo $__env->make('components.childtab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class = "bg-gray-100  py-2 px-2 mt-10 mb-5">
            <!-- child tab-->
            <div class="py-0 px-0 mt-0 mr-2 ml-2" id="cardsSection">
                 <?php echo $__env->make('child.load', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <?php echo $__env->make('components.sponsorship', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container mx-auto px-4 py-8 items-center">
            <div class="flex flex-col items-center justify-center mt-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Sign up today and make a lasting impact in their lives.
                </h2>
                <div class="flex items-center mt-10">
                    <a href="<?php echo e(route('register')); ?>"
                        class="inline-flex  items-center px-4 py-2 text-white font-bold shadow-md hover:bg-blue-700 bg-blue-900 text-white px-4 py-2 rounded-md my-5 ">
                        Join Us
                    </a>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    let nextPageUrl = '<?php echo e($children->nextPageUrl()); ?>';

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            if (nextPageUrl) {
                loadMorePosts();
            }
        }
    });
    function loadMorePosts() {
        $.ajax({
            url: nextPageUrl,
            type: 'get',
            beforeSend: function () {
                nextPageUrl = '';
            },
            success: function (data) {
               console.log("==============") 
               console.log(data);
               console.log("==============")
                nextPageUrl = data.nextPageUrl;
                $('#cardsSection').append(data.view);
            },
            error: function (xhr, status, error) {
                console.error("Error loading more posts:", error);
            }
        });
    }
});
</script>
<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\Bethel Donations\dummy\dummy_new_23rd\resources\views/child/child.blade.php ENDPATH**/ ?>