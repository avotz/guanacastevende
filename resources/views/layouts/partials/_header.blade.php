<!DOCTYPE html>
<html class="es">

<head>
    <!-- Some assets concatenated and minified to improve load speed. Download version includes source css, javascript and less assets -->
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="@yield('meta-description','Vende lo que no ocupes')">
    <meta name="viewport" content="width=device-width, user-scalable=1, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <title>@yield('meta-title','Guanacaste Vende | Home')</title>

    <!-- page styles -->
    @yield('css')
    <link rel="stylesheet" href="{{ elixir('css/bundle.css') }}">


</head>
<body>
<div class="top">
    <div class="inner">
        @include('layouts.partials._search')
    </div>
</div>
<header class="header">
    <div class="inner">
        <a class="header__logo" href="/"><img src="/img/logo.png" alt="Guanacaste Vende"/></a>
        <nav class="header__menu">
            <ul class="header__menu__ul">
                <li class="header__menu__item"><a class="header__menu__link" href="#">Acerca de</a> </li>
                <li class="header__menu__item"><a class="header__menu__link" href="{{ route('products_path') }}">Productos</a> </li>
                <li class="header__menu__item"><a class="header__menu__link" href="#">Contactenos</a> </li>
                <li class="header__menu__item"><a class="header__menu__link" href="#">Blog</a> </li>
                <li class="header__menu__item parent">
                    <span class="header__menu__link">Mi Cuenta</span>
                    <ul class="header__submenu">
                        @if (Auth::guest())
                            <li class="header__submenu__item"><a href="{{ url('/auth/login') }}" class="header__submenu__link">Logueate</a></li>
                            <li class="header__submenu__item"><a href="{{ url('/auth/register') }}" class="header__submenu__link">Registrate</a></li>
                        @else
                            <li class="header__submenu__item"><a href="{{ route('profile.show', $currentUser->username) }}" class="header__submenu__link">Perfil</a></li>
                            <li class="header__submenu__item"><a href="{{ url('/auth/logout') }}" class="header__submenu__link">Cerrar sesion</a></li>
                        @endif
                    </ul>
                </li>



            </ul>
        </nav>
        <button id="btn-menu" class="header__btn-menu"><i class="icon-menu"></i></button>
        <button id="btn-search" class="header__btn-search open"><i class="icon-search"></i></button>
    </div>

</header>
