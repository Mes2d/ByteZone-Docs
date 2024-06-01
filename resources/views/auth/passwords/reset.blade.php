@extends('layouts.app')

@section('content')

    @extends('layouts.header')

    @section('content')

        <div class="uk-section">

            <div class="uk-container uk-container-xsmall">

                <article class="uk-article">
                    <h1 class="uk-article-title uk-text-center">{{ __('Reset Password') }}</h1>
                    <div class="article-content link-primary">

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="uk-margin-medium-bottom">
                                <label class="uk-form-label uk-margin-small-bottom" for="name">{{ __('Email Address') }}</label>
                                <div class="uk-form-controls">
                                    <input id="email" class="uk-input uk-form-large uk-border-rounded" name="email" type="email" value="{{ old('email') }}" required="">
                                </div>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="uk-margin-medium-bottom">
                                <label class="uk-form-label uk-margin-small-bottom" for="name">{{ __('Password') }}</label>
                                <div class="uk-form-controls">
                                    <input id="password" class="uk-input uk-form-large uk-border-rounded" name="password" type="password" value="{{ old('password') }}" required="">
                                </div>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div>
                                <input class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" value="{{ __('Login') }}">
                            </div>

                        </form>
                    </div>
                </article>


            </div>

        </div>

    @endsection



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
