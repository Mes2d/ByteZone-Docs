@extends('layouts.header')

@section('content')

    <div class="uk-section">

        <div class="uk-container uk-container-xsmall">


            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Add Faq') }}</h1>
                <div class="article-content link-primary">
                    <form class="uk-form-stacked  uk-grid-small uk-margin-medium-top" uk-grid method="POST" enctype="multipart/form-data" action="{{ route('faqs.store') }}"
                          accept-charset="UTF-8">
                        @csrf

                           <div class="uk-margin-medium-bottom uk-width-1-2@s">
                               <label class="uk-form-label" for="title">{{ __('Question') }}</label>
                               <div class="uk-form-controls">
                                   <input id="question" class="uk-input  uk-border-rounded" name="question" type="text" value="{{ old('question') }}" required="">
                               </div>

                               @error('question')
                               <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror

                           </div>


                        <div class="uk-margin-medium-bottom uk-width-1-2@s">
                            <label class="uk-form-label" for="title">{{ __('Answer') }}</label>
                            <div class="uk-form-controls">
                                <textarea name="answer" id="answer" class="uk-textarea  uk-border-rounded" required="">{{ old('answer') }}</textarea>
                            </div>

                            @error('answer')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="uk-margin-medium-bottom uk-width-1-2@s">
                            <label class="uk-form-label" for="title">{{ __('Question Arabic') }}</label>
                            <div class="uk-form-controls">
                                <input id="question_ar" class="uk-input  uk-border-rounded" name="question_ar" type="text" value="{{ old('question_ar') }}" required="">
                            </div>

                            @error('question_ar')
                                <span class="uk-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="uk-margin-medium-bottom uk-width-1-2@s">
                            <label class="uk-form-label" for="title">{{ __('Answer Arabic') }}</label>
                            <div class="uk-form-controls">
                                <textarea name="answer_ar" id="answer_ar" class="uk-textarea  uk-border-rounded" required="">{{ old('answer_ar') }}</textarea>
                            </div>

                            @error('answer_ar')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>



                        <div class="uk-margin-medium-bottom uk-width-1-1@s">
                            <label class="uk-form-label " for="published">{{ __('Published') }}</label>
                            <div class="uk-form-controls">
                                <input id="published" class="uk-checkbox  uk-border-rounded" name="published" type="checkbox" @checked(old('published')) value="1" required="">
                            </div>

                            @error('published')
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

