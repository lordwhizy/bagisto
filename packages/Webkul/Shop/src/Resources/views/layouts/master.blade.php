<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">

    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
    @else
        <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}" />
    @endif

    @yield('head')

    @section('seo')
        <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
    @show

    @yield('css')

</head>

<body>
    <div id="app">
        <flash-wrapper ref='flashes'></flash-wrapper>

        <div class="main-container-wrapper">

            @include('shop::layouts.header.index')

            @auth('customer')
                @if(auth()->guard('customer')->user()->is_verified == 0)
                    <div class="verify-account">
                        <a  href="{{ route('customer.verify', auth()->guard('customer')->user()->email) }}"> Verify Your Account </a>
                    </div>
                @endif
            @endauth

            @yield('slider')

            <div class="content-container">

                @yield('content-wrapper')

            </div>

        </div>

        @include('shop::layouts.footer.footer')
        <div class="footer-bottom">
            <p>
                {{ __('shop::app.webkul.copy-right') }}
            </p>
        </div>
    </div>
    <script type="text/javascript">
        window.flashMessages = [];

        @if($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
        @elseif($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }
            ];
<<<<<<< HEAD
=======
        @elseif($info = session('info'))
            window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }
            ];
>>>>>>> 1c274447057da2b16e13a1b849e727667069c5aa
        @endif

        window.serverErrors = [];
        @if(isset($errors))
            @if (count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        @endif
    </script>

    <script type="text/javascript" src="{{ bagisto_asset('js/shop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>

    @stack('scripts')

</body>

</html>