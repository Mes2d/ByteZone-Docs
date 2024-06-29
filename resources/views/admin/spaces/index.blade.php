@extends('layouts.header')
@section('title','Spaces')
@section('content')

    <div class="uk-section">

        <div class="uk-container">



            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Spaces') }}</h1>
                <a href="{{route('spaces.create')}}" class="uk-button uk-button-primary">Create</a>

                <div class="article-content link-primary ">
                    <table class="uk-table uk-table-responsive uk-table-striped uk-table-middle uk-text-center">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Name Ar</th>
                            <th>Slug Ar</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Detect Date</th>
                            <th>Image</th>
                            <th>Published</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                            @foreach($spaces as $space)
                            <tr>
                                <td>{{$space->name}}</td>
                                <td>{{$space->slug}}</td>
                                <td>{{$space->name_ar}}</td>
                                <td>{{$space->slug_ar}}</td>
                                <td>{{$space->category->name}}</td>
                                <td style="color: {{$space->status->color}}">{{$space->status->name}}</td>
                                <td>{{$space->detected_at ?? "Never"}}</td>
                                <td><img src="{{asset('storage/' . $space->image)}}" alt="{{$space->slug . '-image'}}" width="60"></td>
                                <td>{{$space->is_published ? "Yes" : "No"}}</td>
                                <td>
                                    <a class="uk-button uk-button-success uk-text-warning" href="{{route('spaces.edit',$space)}}">Edit</a>
                                    <a class="uk-button uk-button-danger uk-text-secondary" href="#" onclick="
                                        if(confirm('are you sure ?')){
                                            event.preventDefault();
                                            document.getElementById('delete-space-{{$space->id}}').submit();
                                        }
                                    ">Delete</a>

                                    <form id="delete-space-{{$space->id}}" action="{{ route('spaces.destroy',$space) }}" onsubmit="return confirm('are you sure')" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </article>


        </div>

    </div>

@endsection

