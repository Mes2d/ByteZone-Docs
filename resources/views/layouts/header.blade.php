@php
$categories = \App\Models\Category::where('is_published', 1)->get();
$locale = \Illuminate\Support\Facades\App::getLocale();
@endphp

<!DOCTYPE html>
<html lang="{{$locale}}" dir="{{$locale == "ar" ? "rtl" : "ltr"}}">

<head>
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">
    <link rel="icon" type="image/png" href="https://cdn.salla.sa/XnOOb/xiuNNHkYrLowShSJgeKZUmUSXmvHweShS3CIegsM.png" />
    <link rel="apple-touch-icon-precomposed" href="https://cdn.salla.sa/XnOOb/rAcMxFkeccHT6ZlIOFpU1iy9h5mYrCUgDjGJfilH.png">
    <meta name="description" content="كل ماتحتاجه لأمنك السيبراني في مكان واحد">
    <meta name="keywords" content="كل,ماتحتاجه,لأمنك,السيبراني,في,مكان,واحد">
    <meta property="og:description" content="كل ماتحتاجه لأمنك السيبراني في مكان واحد">
    <meta property="og:title" content="bzteamSoftwares">
    <meta property="og:type" content="store">
    <meta property="og:locale" content="ar_AR">
    <meta property=":locale:alternate" content="ar_AR">
    <meta property=":locale:alternate" content="en_US">
    <meta property="og:url" content="https://bzteam.org">
    <meta property="og:image" content="https://cdn.salla.sa/XnOOb/rAcMxFkeccHT6ZlIOFpU1iy9h5mYrCUgDjGJfilH.png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="300">
    <meta name="twitter:description" content="كل ماتحتاجه لأمنك السيبراني في مكان واحد">
    <meta name="twitter:image" content="https://cdn.salla.sa/XnOOb/rAcMxFkeccHT6ZlIOFpU1iy9h5mYrCUgDjGJfilH.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="bzdocs">
    <meta name="twitter:url" content="https://docs.bzteam.org">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{{asset( $locale == 'ar' ? 'assets/css/main.rtl.css' : 'assets/css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/js/uikit.js')}}"></script>
    @livewireStyles
</head>

<body>

<header>
    <div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent; top: 200">
        <nav class="uk-navbar-container">
            <div class="uk-container">
                <div data-uk-navbar>
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo uk-visible@m" href="{{url("/" . $locale)}}">
                            <img src="{{asset('assets/imgs/logo.png')}}" alt="logo" width="80" />
                        </a>
                        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas-docs" data-uk-toggle><span
                                data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Docs</span></a>
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li class="uk-active"><a href="{{url("/" . $locale)}}">{{__("HOME")}}</a></li>

                            @if(count($categories))

                                @foreach($categories as $category)

                                   <li>
                                       <a href="{{url("/" . $locale . '/categories/' . $category->name())}}">{{$category->name()}} ({{$category->spaces->count()}})</a>


                                       @if(count($category->spaces))
                                       <div class="uk-navbar-dropdown">
                                           <ul class="uk-nav uk-navbar-dropdown-nav">
                                               @foreach($category->spaces as $space)
                                                   <li>
                                                       <a href="{{url($locale . '/spaces/' . $space->slug())}}">{{$space->name()}} </a>
                                                   </li>
                                               @endforeach
                                           </ul>
                                       </div>
                                       @endif
                                   </li>

                                @endforeach


                            @endif


                            @auth
                                <li>
                                    <a href="#">{{__("ADMIN")}}</a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li><a href="{{route('categories.index')}}">Categories</a></li>
                                            <li><a href="{{route('spaces.index')}}">Spaces</a></li>
                                            <li><a href="{{route('groups.index')}}">Groups</a></li>
                                            <li><a href="{{route('pages.index')}}">Pages</a></li>
                                            <li><a href="{{route('faqs.index')}}">Faq</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @endauth

                            @if($locale == 'ar')
                                <li><a href="{{url("/en")}}">English</a></li>
                            @else
                                <li><a href="{{url("/ar")}}">عربي</a></li>
                            @endif


                        </ul>
                    </div>
                    <div class="uk-navbar-center uk-hidden@m">
                        <a class="uk-navbar-item uk-logo" href="{{url('/' . $locale)}}"><img src="{{asset('assets/imgs/logo.png')}}" alt="logo" width="80" /></a>
                    </div>
                    <div class="uk-navbar-right">
                        <div>
                            <a id="search-navbar-toggle" class="uk-navbar-toggle" data-uk-search-icon href="#"></a>
                            <div class="uk-background-default uk-border-rounded"
                                 data-uk-drop="mode: click; pos: left-center; offset: 0">
                                <form class="uk-search uk-search-navbar uk-width-1-1" onsubmit="return false;">
                                    <input id="search-navbar" class="uk-search-input" type="search" placeholder="Search for answers"
                                           autofocus autocomplete="off" data-minchars="1" data-maxitems="30">
                                </form>
                            </div>
                        </div>
                        <ul class="uk-navbar-nav uk-visible@m">
                            @guest
                            <li>
                                <div class="uk-navbar-item">
                                    <a class="uk-button uk-button-primary-outline" href="{{url('/login')}}">{{__("LOGIN")}}</a>
                                </div>
                            </li>
                            @endguest

                            @auth
                            <li>
                                <div class="uk-navbar-item">
                                    <a class="uk-button uk-button-primary-outline" href="{{url('/logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                </div>
                            </li>

                            @endauth

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>


                            <li>
                                <div class="uk-navbar-item">
                                    <a class="uk-button uk-button-success" href="{{url($locale . '/contact')}}">{{__("CONTACT")}}</a>
                                </div>
                            </li>
                        </ul>
                        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
                                data-uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

</header>



@yield('content')

@include('layouts.offcanvas')
@include('layouts.footer')


</body>
</html>

