<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
          <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
          <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    {{-- Success Message --}}
    @if (Session::has('success'))
    Swal.fire({
    icon: 'success',
    title: 'Done',
    text: '{{ Session::get("success") }}',
    confirmButtonColor: "#3a57e8"
    });
    @endif
    {{-- Errors Message --}}
    @if (Session::has('error'))
    Swal.fire({
    icon: 'error',
    title: 'Opps!!!',
    text: '{{Session::get("error")}}',
    confirmButtonColor: "#3a57e8"
    });
    @endif
    @if(Session::has('errors') || ( isset($errors) && is_array($errors) && $errors->any()))
    Swal.fire({
    icon: 'error',
    title: 'Opps!!!',
    text: '{{Session::get("errors")->first() }}',
    confirmButtonColor: "#3a57e8"
    });
    @endif
</script>