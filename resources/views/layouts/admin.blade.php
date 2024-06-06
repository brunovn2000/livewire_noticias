<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles

    <title>Document</title>
</head>
<style>

</style>
<body class="bg-gray-50 ">

    {{-- <div class="container mx-auto"> --}}
        @yield('content')
    {{-- </div> --}}
    {{-- @include('../layouts/header') --}}
    {{-- <div class="flex-grow">
    </div> --}}
    {{-- {{ $slot }} --}}
  
    {{-- @include('../layouts/footer')  --}}
    @livewireScripts
</body>
</html>