@extends('layouts.header')

@section('content')

    <div class="uk-section">

        <div class="uk-container uk-container-xsmall">


            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Add Status') }}</h1>
                <div class="article-content link-primary">
                    <form class="uk-form-stacked  uk-grid-small uk-margin-medium-top" uk-grid method="POST" enctype="multipart/form-data" action="{{ route('statuses.store') }}"
                          accept-charset="UTF-8">
                        @csrf

                           <div class="uk-margin-medium-bottom uk-width-1-2@s">
                               <label class="uk-form-label" for="name">{{ __('Name') }}</label>
                               <div class="uk-form-controls">
                                   <input id="name" class="uk-input  uk-border-rounded" name="name" type="text" value="{{ old('name') }}" required="">
                               </div>

                               @error('name')
                               <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror

                           </div>



                            <div class="uk-margin-medium-bottom uk-width-1-2@s">
                                <label class="uk-form-label " for="name_ar">{{ __('Name Arabic') }}</label>
                                <div class="uk-form-controls">
                                    <input id="name_ar" class="uk-input  uk-border-rounded" name="name_ar" type="text" value="{{ old('name_ar') }}" required="">
                                </div>

                                @error('name_ar')
                                <span class="uk-text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror

                            </div>

                            <div class="uk-margin-medium-bottom uk-width-1-2@s">
                                <label class="uk-form-label " for="color">{{ __('Color') }}</label>
                                <div class="uk-form-controls">
                                    <input id="color" class="uk-input  uk-border-rounded" name="color" type="color" value="{{ old('color') }}" required="">
                                </div>

                                @error('color')
                                <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>



                        <div class="uk-width-1-1">
                            <input class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" value="{{ __('Create') }}">
                        </div>

                    </form>
                </div>
            </article>


        </div>

    </div>

@endsection

