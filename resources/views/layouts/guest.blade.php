<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Check title --}}
    @if (isset($title))
    <title>
        {{ $title }}
    </title>
    @endif

    <!-- Site Description -->
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    @if (isset($setting))
    <!-- Favicon -->
    <link rel="icon" href="{{ asset($setting->favicon) }}" sizes="96x96" type="image/png" />
    @endif

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Google Recaptcha -->
    {!! htmlScriptTagJsApi() !!}

    <!-- Custom Styles -->
    @yield('custom-css')

    <!-- Google Analytics -->
    @if (isset($setting))
    @if ($setting->analytics_id != "")
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $setting->analytics_id }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ $setting->analytics_id }}');
    </script>
    @endif
    @endif
</head>

<body class="antialiased bg-body text-body font-body zoom"
    dir="{{(App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') || App::isLocale('fa') ? 'rtl' : 'ltr')}}">

    {{-- Page Content --}}
    <div class="" id="app">
        @yield('content')

        {{-- Cookie consent --}}
        @include('cookie-consent::index')
    </div>

    <!-- Custom JS -->
    @yield('custom-js')

    {{-- Scripts --}}
    <script src="{{ asset('js/aos.js') }}"></script>

    <!-- Tawk Chat -->
    @if (isset($setting))
    @if ($setting->tawk_chat_key != "")
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        "use strict";
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/{{ $setting->tawk_chat_key }}';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    @endif
    @endif

    {{-- Animation --}}
    <script>
        AOS.init();
    </script>
</body>

</html>