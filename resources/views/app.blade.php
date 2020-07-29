<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('meta')
    
    {{-- Styles --}}
    <x-styles/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}?v={{filemtime('css/app.css')}}">

</head>
<body>

    @include('partials.header.header')

    <main>
        @yield('content')
    </main>

    {{-- Scripts --}}
    <script src="{{asset('js/app.js')}}?v={{filemtime('js/app.js')}}"></script>
    <x-scripts/>
    
</body>
</html>