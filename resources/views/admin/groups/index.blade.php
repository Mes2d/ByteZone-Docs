@extends('layouts.header')
@section('title','Groups')
@section('content')

    <div class="uk-section">
        <div class="uk-container">
            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Groups') }}</h1>
                <a href="{{route('groups.create')}}" class="uk-button uk-button-primary">Create</a>

                <div class="article-content link-primary ">
                    <table class="uk-table uk-table-responsive uk-table-striped uk-table-middle uk-text-center">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Name Ar</th>
                            <th>Slug Ar</th>
                            <th>Space</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                            <tr>
                                <td>{{$group->title}}</td>
                                <td>{{$group->slug}}</td>
                                <td>{{$group->title_ar}}</td>
                                <td>{{$group->slug_ar}}</td>
                                <td>{{$group->space->name}}</td>
                                <td>{{$group->is_published ? "Yes" : "No"}}</td>
                                <td>
                                    <a class="uk-button uk-button-success uk-text-warning" href="{{route('groups.edit',$group)}}">Edit</a>
                                    <a class="uk-button uk-button-danger uk-text-secondary" href="#" onclick="
                                        if(confirm('are you sure ?')){
                                            event.preventDefault();
                                            document.getElementById('delete-group-{{$group->id}}').submit();
                                        }
                                    ">Delete</a>

                                    <form id="delete-group-{{$group->id}}" action="{{ route('groups.destroy',$group) }}" onsubmit="return confirm('are you sure')" method="POST" class="d-none">
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

