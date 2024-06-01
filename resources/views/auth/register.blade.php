@extends('layouts.header')

@section('content')


<div class="uk-section">

        <div class="uk-container uk-container-xsmall">

            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Register') }}</h1>
                <div class="article-content link-primary">

                    <form class="uk-form-stacked uk-margin-medium-top" method="POST" action="{{ route('register') }}"
                          accept-charset="UTF-8">
                        @csrf

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="name">{{ __('Name') }}</label>
                            <div class="uk-form-controls">
                                <input id="name" class="uk-input uk-form-large uk-border-rounded" name="name" type="text" value="{{ old('name') }}" required="">
                            </div>

                            @error('name')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="email">{{ __('Email Address') }}</label>
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

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="password-confirm">{{ __('Confirm Password') }}</label>
                            <div class="uk-form-controls">
                                <input id="password-confirm" class="uk-input uk-form-large uk-border-rounded" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" required="">
                            </div>

                            @error('password')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div>
                            <input class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" value="{{ __('Register') }}">
                        </div>


                    </form>
                </div>
            </article>
        </div>
    </div>

@endsection
