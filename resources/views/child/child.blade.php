@extends('layouts.home')
@section('title', 'Child')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />


    <div class="py-20 lg:py-20 px-7 lg:px-20">
        <!-- Tabs Section -->
        @include('components.tabs')
        <!-- Tabs Section -->
        {{-- <div class="flex justify-between items-center mb-10 mt-10 cursor-pointer"> --}}
            <div class="flex space-x-5 mt-10">
                <h1 id="tab1" class="tab cursor-pointer font-bold text-lg text-gray-300 border-b border-gray-300"
                    onclick="toggleTab('tab1')">Rescue a baby</h1>
                <p id="tab2" class="tab tab-active cursor-pointer font-bold text-lg  text-blue-900"
                    onclick="toggleTab('tab2')">Sponsor a Child</p>
                {{-- <p id="tab3" class="tab cursor-pointer font-bold text-lg text-gray-300 border-b border-gray-300"
                    onclick="toggleTab('tab3')">Mother</p> --}}
            </div>
        {{-- </div> --}}
        <!-- child tab-->
        @include('components.childtab')

        <div class = "bg-gray-100  py-2 px-2 mt-10 mb-5">
            <!-- child tab-->
            <div class="py-0 px-0 mt-0 mr-2 ml-2" id="cardsSection">
                 @include('child.load')
            </div>
        </div>

        @include('components.sponsorship')
        <div class="container mx-auto px-4 py-8 items-center">
            <div class="flex flex-col items-center justify-center mt-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Sign up today and make a lasting impact in their lives.
                </h2>
                <div class="flex items-center mt-10">
                    <a href="{{ route('register') }}"
                        class="inline-flex  items-center px-4 py-2 text-white font-bold shadow-md hover:bg-blue-700 bg-blue-900 text-white px-4 py-2 rounded-md my-5 ">
                        Join Us
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    let nextPageUrl = '{{ $children->nextPageUrl() }}';

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