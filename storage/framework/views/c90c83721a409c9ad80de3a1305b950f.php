<div class="bg-white-200 py-0 lg:py-30 px-0 mb-10 items-center justify-between tab-text" id="tab1Text">
    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
        <div class="lg:w-1/2 lg:mr-4 order-2 lg:order-1 mt-10 lg:mt-0">
            
            <h1 class="title text-7xl font-bold text-black mt-10 mb-4">Make a difference.</h1>
            <p class="text-lg text-gray-600 mt-1 mb-10">
                We provide orphaned and abandoned children with a loving Christian home where they receive all the love,
                care, protection and practical support they need to thrive.
            </p>
        <!-- Sponsor Button -->
             <div class="mt-10">
                          <a class="bg-blue-900 text-white px-4 py-2 rounded-md my-5 " href="<?php echo e(route('babies.index')); ?>">General Donation</a>
             </div>
              

        </div>
        <div class="lg:w-1/2 mt-10 lg:mt-0 order-1 lg:order-2">
            <!-- Image with object-cover to cover the same height as text -->
            <img src="<?php echo e(asset("images/banners/image.jpg")); ?>" alt="Banner Image" class="h-48 lg:h-full w-full lg:w-auto object-cover">
        </div>
    </div>
</div>


<style>
    @media (max-width: 639px) {
        .title {
            font-size: 2rem;
        }
    }

    @media (min-width: 640px) and (max-width: 767px) {
        .title {
            font-size: 2rem;
        }
    }

    @media (min-width: 768px) and (max-width: 1023px) {
        .title {
            font-size: 3rem;
        }
    }

    @media (min-width: 1024px) {
        .title {
            font-size: 4rem;
        }
    }
</style>

<?php /**PATH D:\Projects\Bethel Donations\dummy\New\dummy_new\dummy_new\resources\views/components/donatetab.blade.php ENDPATH**/ ?>