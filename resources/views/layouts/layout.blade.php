<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>

        @yield('title')

    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <link rel="stylesheet" href="{{asset('css/container.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <script src="{{asset('js/test.js')}}"></script>


    @yield('css')
    @yield('js')


</head>
<body>


@include('layouts.includes.nav-bar')


<div class="container-p">
    <div class="content">
        <div class="content-header">


            @yield('box-header')


        </div>
        <div class="content-body">


            @yield('box-body')


        </div>
        <div class="content-footer">


            @yield('box-footer')


        </div>
    </div>
</div>

{{--@include('layouts.includes.footer-bar')--}}
</body>
</html>
