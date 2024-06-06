<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @routes
    @vite(['resources/js/frontend.js', "resources/js/Frontend/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    @inertia
    


</html>

