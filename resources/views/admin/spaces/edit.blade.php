@extends('layouts.header')

@section('content')

    <div class="uk-section">

        <div class="uk-container uk-container-xsmall">


            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Edit Space') }}</h1>
                <div class="article-content link-primary">
                    <form class="uk-form-stacked  uk-grid-small uk-margin-medium-top" uk-grid method="POST" enctype="multipart/form-data" action="{{ route('spaces.update',$space) }}"
                          accept-charset="UTF-8">
                        @csrf
                        @method('PUT')
                        <div class="uk-margin-medium-bottom uk-width-1-2@s">
                            <label class="uk-form-label" for="name">{{ __('Name') }}</label>
                            <div class="uk-form-controls">
                                <input id="name" class="uk-input  uk-border-rounded" name="name" type="text" value="{{ $space->name }}" required="">
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
                                <input id="slug" class="uk-input  uk-border-rounded" name="slug" type="text" value="{{ $space->slug }}" required="">
                            </div>

                            @error('slug')
                            <span class="uk-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                        </div>

                        <div class="uk-margin-medium-bottom uk-width-1-2@s">
                            <label class="uk-form-label " for="name_ar">{{ __('Name Arabic') }}</label>
                            <div class="uk-form-controls">
                                <input id="name_ar" class="uk-input  uk-border-rounded" name="name_ar" type="text" value="{{ $space->name_ar }}" required="">
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
                                <input id="slug_ar" class="uk-input  uk-border-rounded" name="slug_ar" type="text" value="{{ $space-> slug_ar }}" required="">
                            </div>

                            @error('slug_ar')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="uk-margin-medium-bottom uk-width-1-2@s">
                            <label class="uk-form-label " for="status_id">{{ __("Status") }}</label>
                            <div class="uk-form-controls">
                                <select name="status_id" id="status_id" class="uk-select">
                                    <option value="" disabled>Select Status</option>
                                    @foreach($statuses as $status)
                                        <option value="{{$status->id}}" style="color: {{$status->color}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('status_id')
                            <span class="uk-text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>



                        <div class="uk-margin-medium-bottom uk-width-1-2@s">
                            <label class="uk-form-label " for="detected_at">{{ __('Detection Date') }}</label>
                            <div class="uk-form-controls">
                                <input id="detected_at" class="uk-input  uk-border-rounded" name="detected_at" type="datetime-local" value="{{ old('detected_at') }}">
                            </div>

                            @error('detected_at')
                            <span class="uk-text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror

                        </div>


                        <div class="uk-margin-medium-bottom uk-width-1-1@s">
                            <label class="uk-form-label" for="slug">{{ __('Categories') }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select  uk-border-rounded" name="category_id" id="category_id">
                                    <option value="" disabled>Choose Category</option>
                                    @foreach($categories as $key => $category)
                                        <option value="{{$category->id}}" @selected($space->category_id == $category->id)>{{$key + 1 . ' - ' .$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('category_id')
                            <span class="uk-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                        </div>


                        <img src="{{asset('storage/' . $space->image)}}" alt="{{$space->slug . '-image'}}" width="60">

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
                                <input id="is_published" class="uk-checkbox  uk-border-rounded" name="is_published" type="checkbox" @checked($space->is_published) value="1" >
                            </div>

                            @error('is_published')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="uk-width-1-1">
                            <input class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" value="{{ __('Update') }}">
                        </div>

                    </form>
                </div>
            </article>


        </div>

    </div>

@endsection

