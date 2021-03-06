<!DOCTYPE html>
<html class="es">

<head>
    <!-- Some assets concatenated and minified to improve load speed. Download version includes source css, javascript and less assets -->
    <!-- meta -->
    <meta charset="utf-8">
    <meta name="description" content="@yield('meta-description','Vende lo que no ocupes')">
    <meta name="viewport" content="width=device-width, user-scalable=1, initial-scale=1, maximum-scale=1">
    <link href='//fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <title>@yield('meta-title','Guanacaste Vende | Home')</title>
    @yield('meta-share')
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
                <li class="header__menu__item"><a class="header__menu__link" href="{{ route('products_path') }}">Productos</a> </li>
                <li class="header__menu__item parent">
                    <span class="header__menu__link">
                         Hola,
                         @if (Auth::guest())
                             Inicia Sesion
                         @else
                            {{ $currentUser->username  }} 
                         @endif
                       <br /> <span class="header__menu__account">Tu Cuenta</span>
                    </span>

                    <ul class="header__submenu">
                        @if (Auth::guest())
                            <li class="header__submenu__item"><a href="{{ url('/auth/login') }}" class="header__submenu__link">Ingresar</a></li>
                            <li class="header__submenu__item"><a href="{{ url('/auth/register') }}" class="header__submenu__link">Registrate</a></li>
                        @else
                            <li class="header__submenu__item"><a href="{{ route('profile.show', $currentUser->username) }}" class="header__submenu__link">Perfil</a></li>
                            <li class="header__submenu__item"><a href="{{ route('product_create') }}" class="header__submenu__link header__submenu__link__featured">Vender articulo</a></li>
                            <li class="header__submenu__item"><a href="{{ route('profile_favorites', $currentUser->username) }}" class="header__submenu__link">Favoritos</a></li>
                            <li class="header__submenu__item"><a href="{{ url('/auth/logout') }}" class="header__submenu__link">Cerrar sesion</a></li>
                        @endif
                    </ul>
                </li>
                <li class="header__menu__item"><a class="header__menu__link" href="/blog" target="_blank">Noticias</a> </li>
                <li class="header__menu__item"><a class="header__menu__link" href="{{ route('about_path') }}">Acerca de</a> </li>
                <li class="header__menu__item"><a class="header__menu__link" href="{{ route('contact_path') }}">Contactenos</a> </li>
                <li class="header__menu__item"><a href="{{ route('product_create') }}" class="header__menu__link header__submenu__link__featured">Vender <span class="long">articulo</span></a></li>



            </ul>
        </nav>
        <button id="btn-menu" class="header__btn-menu"><i class="icon-menu"></i></button>
        <button id="btn-search" class="header__btn-search open"><i class="icon-search"></i></button>
    </div>

</header>
@if (!Auth::guest() && !$currentUser->profile->isComplete())
    <div class="info__system">
        Actualiza tu <a href="{{ route('profile.edit', $currentUser->username) }}">Perfil</a>, parece que esta incompleto !!
    </div>

@endif
@if (!Auth::guest() && $currentUser->comments()->notViewed()->count())
    <div class="info__system">
        <div class="notification">
            Tienes <a href="#" class="notification-count">{{ $currentUser->comments()->notViewed()->count() }} comentarios</a> no vistos
            <div class="notification-list">
                <ul>
                    @foreach($currentUser->comments()->notViewed()->get() as $item)
                        <li><a href="{{ route('product_path', $item->product->id) }}" class="notification-link">Nuevo comentario en {{ str_limit($item->product->name, 20)  }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        
    </div>

@endif

@if (false)
    <div class="info__system">
        Procedimiento de pago en periodo de prueba!!
    </div>
@endif

