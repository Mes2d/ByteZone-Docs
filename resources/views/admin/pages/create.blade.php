@extends('layouts.header')

@section('content')

    <div class="uk-section">

        <div class="uk-container uk-container-xsmall">


            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Add Page') }}</h1>
                <div class="article-content link-primary">
                    <form class="uk-form-stacked  uk-grid-small uk-margin-medium-top" uk-grid method="POST" enctype="multipart/form-data" action="{{ route('pages.store') }}"
                          accept-charset="UTF-8">
                        @csrf

                           <div class="uk-margin-medium-bottom uk-width-1-2@s">
                               <label class="uk-form-label" for="name">{{ __('Title') }}</label>
                               <div class="uk-form-controls">
                                   <input id="name" class="uk-input  uk-border-rounded" name="title" type="text" value="{{ old('title') }}" required="">
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

                        <div class="uk-margin-medium-bottom uk-width-1-1@s">
                            <label class="uk-form-label " for="content">{{ __('Content') }}</label>
                            <div class="uk-form-controls">
                                <textarea name="content" class="uk-textarea  uk-border-rounded" id="content" >{{old('content')}}</textarea>
                            </div>

                            @error('content')
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
                            <label class="uk-form-label " for="content_ar">{{ __('Content Arabic') }}</label>
                            <div class="uk-form-controls">
                                <textarea name="content_ar" class="uk-textarea  uk-border-rounded" id="content_ar" >{{old('content_ar')}}</textarea>
                            </div>

                            @error('content_ar')
                            <span class="uk-text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="uk-margin-medium-bottom uk-width-1-1@s">
                            <label class="uk-form-label" for="slug">{{ __('Groups') }}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select  uk-border-rounded" name="group_id" id="group_id">
                                    <option value="" selected disabled>Choose Group</option>
                                    @foreach($spaces as $space)
                                            <optgroup label="{{$space->name}}">
                                                @foreach($space->groups as $key => $group)
                                                    <option value="{{$group->id}}">{{$key + 1 . ' - ' .$group->title}}</option>
                                                @endforeach
                                            </optgroup>
                                    @endforeach


                                </select>
                            </div>

                            @error('group_id')
                            <span class="uk-text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                        </div>


                        <div class="uk-margin-medium-bottom uk-width-1-1@s">
                            <label class="uk-form-label " for="cover">{{ __('Cover') }}</label>
                            <div class="uk-form-controls">
                                <input id="cover" class="uk-input  uk-border-rounded" name="cover" type="file" value="{{ old('cover') }}" >
                            </div>

                            @error('cover')
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


<script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>]\


    <script>

        const watchdog = new CKSource.EditorWatchdog();

        window.watchdog = watchdog;

        watchdog.setCreator( ( element, config ) => {
            return CKSource.Editor
                .create( element, config )
                .then( editor => {
                    return editor;
                } );
        } );

        watchdog.setDestructor( editor => {
            return editor.destroy();
        } );

        watchdog.on( 'error', handleSampleError );

        watchdog
            .create( document.querySelector( '#content' ), {
                codeBlock: {
                    class: 'highlight'
                }
            } )
            .catch( handleSampleError );

        function handleSampleError( error ) {
            const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

            const message = [
                'Oops, something went wrong!',
                `Please, report the following error on ${ issueUrl } with the build id "vq9ukgrxrkx0-xuoysp1ucpzn" and the error stack trace:`
            ].join( '\n' );

            console.error( message );
            console.error( error );
        }


    </script>

@endsection

