<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.1.1/css/dataTables.responsive.css"> --}}
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    {{-- <a class="navbar-brand" href="{{ url('/login') }}">
                        {{ config('app.name', '') }}
                        الرئيسية
                    </a> --}}
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    @if (!Auth::guest())
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    الموردون <span class="caret"></span>
                            </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('provider.create')}}">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            إضافة مورد جديد
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('provider.index')}}">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            عرض الكل
                                        </a>
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    الاصناف <span class="caret"></span>
                            </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('products.create')}}">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            إضافة صنف جديد
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products.index') }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            عرض الكل
                                        </a>
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    التصنيفات <span class="caret"></span>
                            </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('category.create')}}">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            إضافة تصنيف جديد
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('category.index') }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            عرض الكل
                                        </a>
                                    </li>
                                </ul>
                        </li>
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                            {{-- <li><a href="{{ route('register') }}">تسجيل</a></li> --}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            تسجيل خروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        @yield('heading')
                    </div>
                    <div class="panel-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
        <script>
            var OneSignal = window.OneSignal || [];
            OneSignal.push(["init", {
                appId: "9d4fcc12-cb93-4aa7-a8e3-38a8ca2fca06",
                autoRegister: true, /* Set to true to automatically prompt visitors */
                persistNotification: true // Automatically dismiss the notification after ~20 seconds in Chrome Deskop v47+
                httpPermissionRequest: {
                    enable: true
                },
                notifyButton: {
                    enable: true, /* Required to use the notify button */
                    size: 'medium', /* One of 'small', 'medium', or 'large' */
                    theme: 'default', /* One of 'default' (red-white) or 'inverse" (white-red) */
                    position: 'bottom-right', /* Either 'bottom-left' or 'bottom-right' */
                    offset: {
                        bottom: '0px',
                        left: '0px', /* Only applied if bottom-left */
                        right: '0px' /* Only applied if bottom-right */
                    },
                    prenotify: true, /* Show an icon with 1 unread message for first-time site visitors */
                    showCredit: false, /* Hide the OneSignal logo */
                    text: {
                        'tip.state.unsubscribed': 'Subscribe to notifications',
                        'tip.state.subscribed': "You're subscribed to notifications",
                        'tip.state.blocked': "You've blocked notifications",
                        'message.prenotify': 'Click to subscribe to notifications',
                        'message.action.subscribed': "Thanks for subscribing!",
                        'message.action.resubscribed': "You're subscribed to notifications",
                        'message.action.unsubscribed': "You won't receive notifications again",
                        'dialog.main.title': 'Manage Site Notifications',
                        'dialog.main.button.subscribe': 'SUBSCRIBE',
                        'dialog.main.button.unsubscribe': 'UNSUBSCRIBE',
                        'dialog.blocked.title': 'Unblock Notifications',
                        'dialog.blocked.message': "Follow these instructions to allow notifications:"
                    }
                }
            }]);
        </script>
    @stack('scripts')

</body>
</html>
