@extends('layouts.header')

@section('content')

<div class="uk-section">

        <div class="uk-container uk-container-xsmall">

            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Reset Password') }}</h1>

                @if (session('status'))
                    <div class="uk-alert uk-alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="article-content link-primary">

                    <form method="POST" action="{{ route('password.email') }}">
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



                        <div>
                            <input class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" value="{{ __('Send Password Reset Link') }}">
                        </div>


                    </form>
                </div>
            </article>


        </div>

    </div>

@endsection
