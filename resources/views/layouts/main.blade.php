<!DOCTYPE html>
<head>
    <title>Kredium Challenge</title>
    <base target="_parent"/>
</head>

<body id="cdp-app-body">
@include('header.main-header')
<div id="app">
    @include('layouts.flash-messages')
    @yield('content')
</div>

@vite(['resources/scss/site.scss', 'resources/js/app.js'])
</body>
</html>
