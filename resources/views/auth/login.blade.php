@extends('layouts.header')

@section('content')

    <div class="uk-section">

        <div class="uk-container uk-container-xsmall">

            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Login') }}</h1>
                <div class="article-content link-primary">

                    <form class="uk-form-stacked uk-margin-medium-top" method="POST" action="{{ route('login') }}"
                          accept-charset="UTF-8">
                        @csrf

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="name">{{ __('Email Address') }}</label>
                            <div class="uk-form-controls">
                                <input id="email" class="uk-input uk-form-large uk-border-rounded" name="email" type="email" value="{{ old('email') }}" required="">
                            </div>

                            @error('email')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="name">{{ __('Password') }}</label>
                            <div class="uk-form-controls">
                                <input id="password" class="uk-input uk-form-large uk-border-rounded" name="password" type="password" value="{{ old('password') }}" required="">
                            </div>

                            @error('password')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div>
                            <input class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" value="{{ __('Login') }}">
                        </div>

                        @if (Route::has('password.request'))
                            <a class="uk-button uk-button-large uk-width-1-1 uk-margin-top" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </article>


        </div>

    </div>

@endsection


