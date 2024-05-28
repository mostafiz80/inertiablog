<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        
        @isset($title)
            {{ $title }} | 
        @endisset
        {{ config('app.name') }}
    </title>
    @vite(['resources/css/app.css'])
</head>

<body>




    <div class="antialiased bg-white dark:bg-gray-500">
@include('admin.layouts.header')
        <!-- Sidebar -->

@include('admin.layouts.sidebar')

        <main class="p-4 md:ml-64 h-auto pt-20">
 @yield('main')
        </main>
    </div>
    @vite(['node_modules/flowbite/dist/flowbite.min.js'])
</body>

</html>
