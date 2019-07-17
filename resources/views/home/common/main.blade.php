<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.partial.header')
    @yield('css')
</head>
<body>
    <div class="super_container">
        @php
        $logo = \App\webimage::first();
        @endphp
        @include('home.partial.navbar')
        @yield('content')
        @include('home.partial.modal')
        @php
        $tags = \App\tag::all();
        $contact = \App\contact::first();

        @endphp

        @include('home.partial.footer')

    </div>
    @yield('js')
</body>
</html>