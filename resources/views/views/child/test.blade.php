@extends('layouts.home')
@section('title', 'Child')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <div class="py-20 px-20">
        <!-- Tabs Section -->
        @include('components.tabs')
        <!-- Tabs Section -->
        <div class="flex justify-between items-center mb-10 mt-10 cursor-pointer">
            <div class="flex space-x-5">
                <h1 id="tab1" class="tab cursor-pointer font-bold text-lg text-gray-300 border-b border-gray-300"
                    onclick="toggleTab('tab1')">Rescue a baby</h1>
                <p id="tab2" class="tab tab-active cursor-pointer font-bold text-lg  text-blue-900"
                    onclick="toggleTab('tab2')">Child</p>
                {{-- <p id="tab3" class="tab cursor-pointer font-bold text-lg text-gray-300 border-b border-gray-300"
                    onclick="toggleTab('tab3')">Mother</p> --}}
            </div>
        </div>
        <!-- child tab-->
        @include('components.childtab')
        <!-- child tab-->
        <div class = "bg-gray-300 px-5 py-20 mt-10 mb-5">
        <div class="container px-2 py-2 tab2text" id="cardsSection">
             @include('child.load')

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
