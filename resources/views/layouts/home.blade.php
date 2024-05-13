<html lang="en">

<head>
    <!-- Responsive -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width,
                 initial-scale=1">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">


    <!-- Meta Tags required for
         Progressive Web App -->
    <meta name=
              "apple-mobile-web-app-status-bar"
          content="#aa7700">
    <meta name="theme-color"
          content="black">

    <!-- Manifest File link -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset("assets")}}/home/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset("assets")}}/home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset("assets")}}/home/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset("assets")}}/home/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset("assets")}}/home/css/style.css" rel="stylesheet">
</head>
@yield('head')

<body>

@include('home.navbar')



@yield('content')



@include('home.footer')

@yield('footer')
<!-- Other HTML content -->

<!-- Register service worker -->
<script>
    /*
    window.addEventListener('load', () => {
        registerSW();
    });

    // Register the Service Worker
    async function registerSW() {
        if ('serviceWorker' in navigator) {
            try {
                await navigator
                    .serviceWorker
                    .register('serviceworker.js');
            }
            catch (e) {
                console.log('SW registration failed');
            }
        }
    }
    */
</script>


</body>

</html>
