@extends('layouts.header')

@section('content')

    <div class="uk-section">

        <div class="uk-container uk-container-xsmall">


            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Add Group') }}</h1>
                <div class="article-content link-primary">
                    <form class="uk-form-stacked  uk-grid-small uk-margin-medium-top" uk-grid method="POST" enctype="multipart/form-data" action="{{ route('groups.store') }}"
                          accept-charset="UTF-8">
                        @csrf

                           <div class="uk-margin-medium-bottom uk-width-1-2@s">
                               <label class="uk-form-label" for="title">{{ __('Title') }}</label>
                               <div class="uk-form-controls">
                                   <input id="title" class="uk-input  uk-border-rounded" name="title" type="text" value="{{ old('title') }}" required="">
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



                            <div class="uk-margin-medium-bottom uk-width-1-2@s">
                                <label class="uk-form-label " for="title_ar">{{ __('Title Arabic') }}</label>
                                <div class="uk-form-controls">
                                    <input id="title_ar" class="uk-input  uk-border-rounded" name="title_ar" type="text" value="{{ old('title_ar') }}" required="">
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
                            <label class="uk-form-label" for="spaces">{{ __('Spaces') }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select  uk-border-rounded" name="space_id" id="space_id">
                                    <option value="" selected disabled>Choose Space</option>
                                    @foreach($spaces as $key => $space)
                                        <option value="{{$space->id}}" @selected($space->id == old('space_id'))>{{$key + 1 . ' - ' .$space->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('space_id')
                            <span class="uk-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                        </div>

                        <div class="uk-margin-medium-bottom uk-width-1-1@s">
                            <label class="uk-form-label " for="is_published">{{ __('Published') }}</label>
                            <div class="uk-form-controls">
                                <input id="is_published" class="uk-checkbox  uk-border-rounded" name="is_published" type="checkbox" @checked(old('is_published')) value="1" required="">
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

