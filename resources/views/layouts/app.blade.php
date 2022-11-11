<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="衝動記録くん" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="https://for-addict-app.fly.dev/" />
    <meta name="twitter:image" content="{{ asset('storage/images/logo/new_logo.png') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="衝動記録くん" />
    <meta property="og:url" content="https://for-addict-app.fly.dev/" />
    <meta property="og:image" content="{{ asset('storage/images/logo/new_logo.png') }}" />
    <meta property="og:description" content="衝動記録くん" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:site_name" content="衝動記録くん" />
    <link href="{{ asset('storage/images/logo/new_logo.png') }}" type="image/x-icon" rel="icon" />
    <link href="{{ asset('storage/images/logo/new_logo.png') }}" type="image/x-icon" rel="shortcut icon" />
    <meta name="next-head-count" content="2" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

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


        @include('layouts.footer')

    </div>


</body>

</html>
