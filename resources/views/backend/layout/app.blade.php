<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--Title goes here--}}
    <title>@yield("title")</title>

    {{--Header goes here--}}
    @include("backend.include.header")
</head>

<body>

    <div class="wrapper">
        <div class="d-flex">
            {{--sidebar goes here--}}
            @include("backend.include.side-bar")

            <div class="main">
                {{--navbar goes here--}}
                @include("backend.include.navbar")

                {{--main container goes here--}}
                @yield("main-container")
            </div>
        </div>
    </div>

{{--Footer goes here--}}
@include("backend.include.footer")
</body>
</html>