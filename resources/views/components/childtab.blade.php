<div class="bg-white-200 py-0 lg:py-4 px-0 mb-10 items-center justify-between tab-text" id="tab1Text">
    <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
        <div class="lg:w-1/2 lg:mr-4 order-2 lg:order-1 mt-10 lg:mt-0">
            <h1 class="title text-7xl font-bold text-black mb-4">Raise a leader.</h1>
            <p class="text-lg text-gray-600 mt-1 mb-10">
               We are dedicated to providing care and support to our children who have faced unimaginable challenges in their young lives. Every day, we witness the transformative power of love in shaping the futures of these remarkable children.
            </p>
            <p class="text-lg text-gray-600 mt-10">
                With $33, you can make a tangible impact on the life of the children in our care. Your monthly contribution will provide education, meals, healthcare and family care.
            </p>
            <div class="mt-10">
                <a class="bg-blue-900 text-white px-4 py-2 rounded-md my-5 " href="#cardsSection">Sponsor</a>
            </div>
        </div>
     <div class="lg:w-1/2 mt-10 lg:mt-0 order-1 lg:order-2">
            <img src="{{ asset('images/banners/child_one.jpg') }}" alt="Banner Image"
                class="imagechild lg:h-1/2 w-full lg:w-full object-contain">
        </div>
    </div>
</div>


<style>
    .imagechild {
        max-height: 60vh;
        /* Adjusts the maximum height of the image */


    }


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
