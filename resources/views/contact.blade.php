@extends('layouts.header')
@section('title','Contact')

@php
    $locale = \Illuminate\Support\Facades\App::getLocale();
@endphp

@section('content')

    <div class="uk-section">
        <div class="uk-container uk-container-xsmall">
            <article class="uk-article">
                <h1 class="uk-article-title">{{__("GOT_QUESTIONS")}}</h1>
                <div class="article-content link-primary">


                    @if(session()->has('success'))
                        <div class="uk-alert uk-alert-success">
                            <h6>{{session()->get('success')}}</h6>
                        </div>
                    @endif

                    <form class="uk-form-stacked uk-margin-medium-top" method="POST" action="{{url($locale . '/contact/send')}}"
                          accept-charset="UTF-8">
                        @csrf
                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="name">{{__("NAME")}}</label>
                            <div class="uk-form-controls">
                                <input id="name" class="uk-input uk-form-large uk-border-rounded" name="name" type="text">
                            </div>
                            @error('name')
                                <span class="uk-text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="email">{{__("EMAIL")}}</label>
                            <div class="uk-form-controls">
                                <input id="email" class="uk-input uk-form-large uk-border-rounded" name="email" type="email">
                            </div>
                            @error('message')
                            <span class="uk-text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="subject">{{__("SUBJECT")}}</label>
                            <div class="uk-form-controls">
                                <input id="subject" class="uk-input uk-form-large uk-border-rounded" name="subject" type="text">
                            </div>
                            @error('subject')
                            <span class="uk-text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="message">{{__("MESSAGE")}}</label>
                            <div class="uk-form-controls">
                                <textarea id="message" class="uk-textarea uk-form-large uk-border-rounded" name="message" rows="5" minlength="10"
                       ></textarea>
                            </div>
                            @error('message')
                            <span class="uk-text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <input class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" value="{{__("SEND")}}">
                        </div>



                    </form>
                </div>
            </article>
        </div>
    </div>

@endsection
