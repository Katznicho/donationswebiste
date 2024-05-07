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

        <div class = "bg-gray-300 px-5 py-20 mt-10 mb-5">
            <!-- child tab-->
            <div class="py-0 px-0 mr-40 ml-40 mb-0 mt-0 " id="cardsSection">
                <div class="grid grid-cols-1 md:grid-cols-2 ld:grid-cols-3 xl:grid-cols-4 justify-center gap-10">
                    @if ($children->isEmpty())
                        <p>No Children found</p>
                    @else
                        @foreach ($children as $child)
                            {{-- age --}}
                            @php
                                // Calculate age based on date of birth
                                $dob = new DateTime($child->date_of_birth);
                                $now = new DateTime();
                                $age = $now->diff($dob)->y;
                            @endphp

                            @php
                                // Format date of birth to show date and month only with suffix
                                $dob = new DateTime($child->date_of_birth);
                                $day = $dob->format('d'); // Get the day
                                $suffix = date('S', strtotime($day)); // Determine the suffix
                                $formatted_dob = $dob->format('jS F'); // 'j' for day without leading zeros, 'S' for suffix, 'F' for full month name
                            @endphp

                            <div class="w-60 flex flex-col bg-white rounded-lg shadow-md py-2 px-2">
                                <div>
                                    <img class="mt-5 rounded-md image" src="{{ $child->profile_picture }}"
                                        alt="{{ $child->first_name }}">
                                </div>
                                <h3 class=" mt-2 w-full  text-center name">{{ $child->first_name }}
                                    <span class="age">{{ $age }} yrs </span>
                                </h3>
                                <p class="text-center w-full font-sm mt-0 mb-2 born">Born {{ $formatted_dob }}</p>
                                {{-- Add link showing story --}}
                                <p class="short text-center justify-center mx-auto px-5 leading-tight"
                                    id="shortenedStory_{{ $child->id }}"></p>
                                <div id="myModal" class="modal" style="display:none;">
                                    <div class="modal-content">
                                        <span class="close-button" onclick="Close()">&times;</span>
                                        <div class="upper-section">
                                            <div class="details-section">
                                                <img src="{{ $child->profile_picture }}" alt="Placeholder Image">
                                                <div>
                                                    <h3 id="name">Title Here</h3>
                                                    <p>$35,000</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="story-content">
                                            <p id="storyContent">Story Content Here</p>
                                        </div>
                                        {{-- button sponsor centered --}}
                                        <a href="{{ route('child.show', $child->id) }}" id="child_id" value=""
                                            class="w-40 h-10 inline-flex px-4 py-2 justify-center text-white font-bold shadow-md hover:bg-blue-700 text-white rounded-md button">
                                            SPONSOR
                                        </a>
                                    </div>
                                </div>
                                {{-- description --}}
                                <p class="text-gray-600 text-center">{{ $child->description }}</p>
                                <a href="{{ route('child.show', $child->id) }}" id="child_id" value="{{ $child->id }}"
                                    class="w-30 h-10 inline-flex px-10 py-2 justify-center text-white  font-bold shadow-md hover:bg-blue-700 text-white rounded-md mt-2 mb-5 button">
                                    SPONSOR
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>

                {{ $children->links() }}
            </div>
        </div>

        @include('components.sponsorship')
        <div class="container mx-auto px-4 py-8 items-center">
            <div class="flex flex-col items-center justify-center mt-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Sign up today and make a lasting impact in their lives.
                </h2>
                <div class="flex items-center mt-10">
                    <a href="{{ route('contact') }}"
                        class="inline-flex  items-center px-4 py-2 text-white font-bold shadow-md hover:bg-blue-700 bg-blue-900 text-white px-4 py-2 rounded-md my-5 ">
                        Join Us
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection

<style>
    .age {
        color: #082652;
         
    }

    .button {
        background-color: #082652;

        margin-left: auto;
        padding: 30px;
        margin-right: auto;
        width: 50%;
        font-size: 14px;



        /* Add rounded corners */
    }

    .age {
        color: #224F92;
        font-size: 16px;
        font-weight: normal;
         
    }

    .born {
        color: #224F92;
         

    }

    .image {
        height: 180px;
        width: 80%;
        margin-left: 10%;


    }

    .name {
        color: #224F92;
        font-size: 16px;
        font-weight: 900;
         

    }

    .sponsor {
        color: white;
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 10px;
        padding-bottom: 30px;
         
    }

    .short {

        text-align: center;
        font-size: 14px;
        
    }


    .tab {
        @apply bg-gray-500 text-white px-4 py-2 rounded-md cursor-pointer;
        border-bottom: 2px solid transparent;
    }

    .tab-active {
        @apply bg-gray-500 text-white px-4 py-2 rounded-md cursor-pointer;
        border-bottom: 2px solid blue;
    }

    .tab-text {
        @apply text-black;
    }

    /* Modal Styles */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close-button {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-button:hover,
    .close-button:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
        font-family: Arial, sans-serif;
    }

    .modal-content {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        max-width: 600px;
        width: 90%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .upper-section {
        border-bottom: 2px solid #3498db;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .details-section {
        display: flex;
        align-items: center;
    }

    .details-section img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 20px;
    }

    .details-section h3 {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
        color: #333;
    }

    .details-section p {
        font-size: 18px;
        color: #666;
        margin: 5px 0;
    }

    .story-content {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {

        @foreach ($children as $child)
            var hobby = {!! json_encode(str_replace(["\r\n", "\r", "\n", "\\n", "\n\n", "\n\n\n", "\n\n\n\n", "'"], ' ', $child->hobby)) !!};
            //story
            var story = {!! json_encode(str_replace(["\r\n", "\r", "\n", "\\n", "\n\n", "\n\n\n", "\n\n\n\n", "'"], ' ', $child->story)) !!};
            showShortenedStory(hobby, '{{ $child->first_name }}', '{{ $child->id }}', story);
        @endforeach
    });

    function showShortenedStory(hobby, name, id, story) {

        console.log(story);
        console.log(name);
        console.log(id);
        console.log(hobby);
        var words = hobby.split(' ');
        var shortenedStory = words.slice(0, 6).join(' ');
        document.getElementById('shortenedStory_' + id).innerHTML = shortenedStory + '&nbsp; <a href="#" id="fullStoryLink_' +
            id +
            '" class="inline-flex text-blue-900 underline justify-center  mb-5 text-sm mx-auto" onclick="showStory(\'' +
            story +
            '\', \'' + name + '\', ' + id + ')">   Read More</a>';
    }

    function showStory(story, name, id) {

        event.preventDefault();
        document.getElementById('storyContent').innerHTML = story;
        document.getElementById('name').innerHTML = name;
        document.getElementById('myModal').style.display = 'block';
        document.getElementById('child_id').value = id;
    }

    function Close() {
        document.getElementById('myModal').style.display = 'none';
    }
</script>