@extends('layouts.header')

@section('content')

    <div class="uk-section">

        <div class="uk-container uk-container-xsmall">


            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Add Category') }}</h1>
                <div class="article-content link-primary">
                    <form class="uk-form-stacked  uk-grid-small uk-margin-medium-top" uk-grid method="POST" enctype="multipart/form-data" action="{{ route('categories.store') }}"
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
                                <label class="uk-form-label" for="slug">{{ __('Slug') }}</label>
                                <div class="uk-form-controls">
                                    <input id="slug" class="uk-input  uk-border-rounded" name="slug" type="text" value="{{ old('slug') }}" required="">
                                </div>

                                @error('slug')
                                <span class="uk-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                            <div class="uk-margin-medium-bottom uk-width-1-1@s">
                                <label class="uk-form-label " for="description">{{ __('Description') }}</label>
                                <div class="uk-form-controls">
                                    <textarea name="description" class="uk-textarea  uk-border-rounded" id="description" >{{old('description')}}</textarea>
                                </div>

                                @error('description')
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
                                <label class="uk-form-label " for="slug_ar">{{ __('Slug Arabic') }}</label>
                                <div class="uk-form-controls">
                                    <input id="slug_ar" class="uk-input  uk-border-rounded" name="slug_ar" type="text" value="{{ old('slug_ar') }}" required="">
                                </div>

                                @error('slug_ar')
                                <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                            <div class="uk-margin-medium-bottom uk-width-1-1@s">
                                <label class="uk-form-label " for="description_ar">{{ __('Description Arabic') }}</label>
                                <div class="uk-form-controls">
                                    <textarea name="description_ar" class="uk-textarea  uk-border-rounded" id="description_ar" >{{old('description_ar')}}</textarea>
                                </div>

                                @error('description_ar')
                                <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                        <div class="uk-margin-medium-bottom uk-width-1-1@s">
                            <label class="uk-form-label " for="image">{{ __('Image') }}</label>
                            <div class="uk-form-controls">
                                <input id="image" class="uk-input  uk-border-rounded" name="image" type="file" value="{{ old('image') }}">
                            </div>

                            @error('image')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="uk-margin-medium-bottom uk-width-1-1@s">
                            <label class="uk-form-label " for="is_published">{{ __('Published') }}</label>
                            <div class="uk-form-controls">
                                <input id="is_published" class="uk-checkbox  uk-border-rounded" name="is_published" type="checkbox" @checked(old('is_published')) value="1" >
                            </div>

                            @error('is_published')
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

