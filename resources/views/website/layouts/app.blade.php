<!doctype html>
<html lang="en" data-bs-theme="light">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Glowing Ecommerce</title>
    <link rel="icon" href="{{ asset('assets/website/assets') }}/images/others/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/website/assets') }}/vendors/lightgallery/css/lightgallery-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website/assets') }}/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website/assets') }}/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website/assets') }}/vendors/slick/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/website/assets') }}/vendors/mapbox-gl/mapbox-gl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/website/assets') }}/vendors/fonts/tuesday-night/stylesheet.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/assets') }}/css/theme-home-09.css">
    <link rel="stylesheet" href="{{ asset('assets/website/assets') }}/css/theme.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.22/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.22/dist/sweetalert2.min.js"></script>

    <script>
        tinymce.init({
            selector: '#description-editor', // ID of the text area to be converted
            plugins: 'link image code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code | link image',
            menubar: false
        });
    </script>

    @include('website.layouts.header')

    @yield('body')

    @include('website.layouts.footer')

</html>