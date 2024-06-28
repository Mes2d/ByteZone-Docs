@extends('layouts.header')
@section('title',__("HOME"))

@php
    $locale = \Illuminate\Support\Facades\App::getLocale();
@endphp

@section('content')

    <div class="uk-section section-hero uk-position-relative" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
        <div class="uk-container uk-container-small">
            <p class="hero-image uk-text-center"><img src="{{asset('assets/imgs/bg.svg')}}" alt="Hero"></p>
            <h1 class="uk-heading-medium uk-text-center uk-margin-remove-top">{{__("HOW_CAN_WE_HELP_YOU")}}</h1>
            <p class="uk-text-lead uk-text-center">{{__("HOME_DESCRIPTION")}}</p>
            <div class="hero-search">
                <div class="uk-position-relative">
                    <form class="uk-search uk-search-default uk-width-1-1" name="search-hero" onsubmit="return false;">
                        <span class="uk-search-icon-flip" data-uk-search-icon></span>
                        <input id="search-hero" class="uk-search-input uk-box-shadow-large" type="search"
                               placeholder="{{__("SEARCH")}}" autocomplete="off" data-minchars="1" data-maxitems="30">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
