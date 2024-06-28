@extends('layouts.header')
@section('title','Contact')

@php
    $locale = \Illuminate\Support\Facades\App::getLocale();
@endphp

@section('content')




    <div class="uk-section">
        <div class="uk-container uk-container-xsmall ">
            <img src="{{asset('assets/imgs/404.svg')}}" alt="404">
            <div class="uk-flex uk-flex-column">
                <h1 class="uk-text-center uk-margin-bottom">{{__("404_TITLE")}}</h1>
                <a class="uk-button uk-button-secondary uk-margin-auto uk-text-center" href="{{url('/' . $locale)}}">{{__("RETURN_TO_HOME")}}</a>
            </div>
        </div>
    </div>

@endsection
