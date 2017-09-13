<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Store
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
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
    @stack('scripts')

</body>
</html>
