@extends('layouts.donatehome')

@section('title', 'Donate')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <div class="py-40 lg:py-40 px-7 lg:px-20">

        <!-- Tabs Section -->
        {{-- @include('components.tabs') --}}
        <!-- Tabs Section -->

        <!-- Banner Section -->
        @include('components.donatetab')
        <!-- Banner Section -->

        <h1 class="text-5xl font-medium text-gray-600 mt-10 mb-4 px-5">Our Projects</h1>
        <p class="text-lg text-gray-600 mt-1 mb-10 px-5">
            We provide orphaned and abandoned children with a loving Christian home where they receive all the love,
            care, protection and practical support they need to thrive.
        </p>

        <div class="container mx-auto mt-4 mb-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Repeat this block for each project -->
            {{-- @foreach ($projects as $project) --}}
            <div class="bg-gray-200 shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('images/banners/child_one.jpg') }}" alt="Banner Image"
                    class="lg:w-full sm:w-full  h-80 lg:h-auto object-cover mb-4 lg:mb-0 p-4">
                <div class="p-6">
                    <h3 class="text-md font-bold mb-2 ">CLASSROOM RENOVATIONS<span style="font-weight: normal;">&nbsp; UGX
                            4,000,000</span></h3>

                   
                    <div class="w-1/2 bg-gray-300 rounded-full h-2 mb-10">
                        <div class="w-1/2 bg-blue-500 rounded-full h-2">
                            <span style="float: left; margin-top: 10px;" class="mt-1 text-left"> Raised</span>
                        </div>
                        <span style="float: right;" class="mt-1 text-right"> 49%</span>
                    </div>

                     {{-- <p class="text-gray-600 mb-4">{{ $project['description'] }}</p> --}}
                    <p class="text-gray-600 mb-4 mt-10">We provide orphaned and abandoned children with a loving Christian home
                        where they receive all the love, care, protection and practical support they need to thrive.
                        <br>
                    </p>

                    {{-- add link with words Read More --}}
                    <a 
                    {{-- href="{{ route('project.show', $project['id']) }}" --}}
                        class="text-blue-900 font-bold hover:text-blue-700" style="text-decoration: underline;">Read More</a>
                    <div class="mt-6">
                        <button
                            class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md w-1/2 mt-5">Give</button>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}

            <div class="bg-gray-200 shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('images/banners/child_one.jpg') }}" alt="Banner Image"
                    class="lg:w-full sm:w-full  h-80 lg:h-auto object-cover mb-4 lg:mb-0 p-4">
                <div class="p-6">
                    <h3 class="text-md font-bold mb-2 ">CLASSROOM RENOVATIONS<span style="font-weight: normal;">&nbsp; UGX
                            4,000,000</span></h3>
                    <div class="w-1/2 bg-gray-300 rounded-full h-2 mb-10">
                        <div class="w-1/2 bg-blue-500 rounded-full h-2">
                            <span style="float: left; margin-top: 10px;" class="mt-1 text-left"> Raised</span>
                        </div>
                        <span style="float: right;" class="mt-1 text-right"> 49%</span>
                    </div>

                    {{-- <p class="text-gray-600 mb-4">{{ $project['description'] }}</p> --}}
                    <p class="text-gray-600 mb-4 mt-10">We provide orphaned and abandoned children with a loving Christian home
                        where they receive all the love, care, protection and practical support they need to thrive.
                        <br>
                    </p>

                      <a 
                    {{-- href="{{ route('project.show', $project['id']) }}" --}}
                        class="text-blue-900 font-bold hover:text-blue-700" style="text-decoration: underline;">Read More</a>
                  

                    <div class="mt-6">
                        <button
                            class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md w-1/2 mt-5">Give</button>
                    </div>
                </div>
            </div>

            {{-- next --}}
            <div class="bg-gray-200 shadow-md rounded-lg overflow-hidden">
                <img src="{{ asset('images/banners/child_one.jpg') }}" alt="Banner Image"
                    class="lg:w-full sm:w-full  h-80 lg:h-auto object-cover mb-4 lg:mb-0 p-4">
                <div class="p-6">
                    <h3 class="text-md font-bold mb-2 ">CLASSROOM RENOVATIONS<span style="font-weight: normal;">&nbsp; UGX
                            4,000,000</span></h3>

                   

                    <div class="w-1/2 bg-gray-300 rounded-full h-2 ">
                        <div class="w-1/2 bg-blue-500 rounded-full h-2">
                            <span style="float: left; margin-top: 10px;" class="mt-1 text-left"> Raised</span>
                        </div>
                        <span style="float: right;" class="mt-1 text-right"> 49%</span>
                    </div>

                     {{-- <p class="text-gray-600 mb-4">{{ $project['description'] }}</p> --}}
                    <p class="text-gray-600 mb-4 mt-10">We provide orphaned and abandoned children with a loving Christian home
                        where they receive all the love, care, protection and practical support they need to thrive.
                        <br>
                        </p>


                          <a 
                    {{-- href="{{ route('project.show', $project['id']) }}" --}}
                        class="text-blue-900 font-bold hover:text-blue-700" style="text-decoration: underline;">Read More</a>
                  
                    <div class="mt-6">
                        <button
                            class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md w-1/2 mt-5" style="margin-left: 0 !important;">Give</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

<style>
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
</style>
