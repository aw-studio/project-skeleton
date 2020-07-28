<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('meta')
    
    <x-styles/>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body>


    @include('partials.header.header')

    <main>
        @yield('content')
    </main>
    
    <x-scripts/>
    <script src="/js/app.js"></script>
</body>
</html>