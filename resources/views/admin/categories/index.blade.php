@extends('layouts.header')
@section('title','Categories')
@section('content')

    <div class="uk-section">

        <div class="uk-container">



            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Categories') }}</h1>
                <a href="{{route('categories.create')}}" class="uk-button uk-button-primary">Create</a>

                <div class="article-content link-primary">
                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-responsive uk-table-middle uk-text-center">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Name Ar</th>
                            <th>Slug Ar</th>
                            <th>Description Ar</th>
                            <th>Spaces</th>
                            <th>Image</th>
                            <th>Published</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->name_ar}}</td>
                                <td>{{$category->slug_ar}}</td>
                                <td>{{$category->description_ar}}</td>
                                <td class="uk-text-danger">{{$category->spaces->count()}}</td>
                                <td><img src="{{asset('storage/' . $category->image)}}" alt="{{$category->slug . '-image'}}" width="60"></td>
                                <td>{{$category->is_published ? "Yes" : "No"}}</td>
                                <td>
                                    <a class="uk-button uk-button-secondary" href="{{route('categories.edit',$category)}}">Edit</a>
                                    <a class="uk-button uk-button-danger uk-text-secondary" href="#" onclick="
                                        if(confirm('are you sure ?')){
                                            event.preventDefault();
                                            document.getElementById('delete-category').submit();
                                        }
                                    ">Delete</a>

                                    <form id="delete-category" action="{{ route('categories.destroy',$category) }}" onsubmit="return confirm('are you sure')" method="POST" class="d-none">
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
                </div>
            </article>


        </div>

    </div>

@endsection

