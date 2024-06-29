@extends('layouts.header')
@section('title','Pages')
@section('content')

    <div class="uk-section">

        <div class="uk-container">



            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Pages') }}</h1>
                <a href="{{route('pages.create')}}" class="uk-button uk-button-primary">Create</a>

                <div class="article-content link-primary ">
                    <table class="uk-table uk-table-responsive uk-table-striped uk-table-middle uk-text-center">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Name Ar</th>
                            <th>Slug Ar</th>
                            <th>Group</th>
                            <th>Cover</th>
                            <th>Published</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>

                            @foreach($pages as $page)
                            <tr>
                                <td>{{$page->title}}</td>
                                <td>{{$page->slug}}</td>
                                <td>{{$page->title_ar}}</td>
                                <td>{{$page->slug_ar}}</td>
                                <td class="uk-text-danger">{{$page->group->title}}</td>
                                <td><img src="{{asset('storage/' . $page->cover)}}" alt="{{$page->slug . '-cover'}}" width="60"></td>
                                <td>{{$page->is_published ? "Yes" : "No"}}</td>
                                <td>
                                    <a class="uk-button uk-button-success uk-text-warning" href="{{route('pages.edit',$page)}}">Edit</a>
                                    <a class="uk-button uk-button-danger uk-text-secondary" href="#" onclick="
                                        if(confirm('are you sure ?')){
                                            event.preventDefault();
                                            document.getElementById('delete-page-{{$page->id}}').submit();
                                        }
                                    ">Delete</a>

                                    <form id="delete-page-{{$page->id}}" action="{{ route('pages.destroy',$page) }}" onsubmit="return confirm('are you sure')" method="POST" class="d-none">
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

