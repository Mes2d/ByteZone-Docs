@extends('layouts.header')
@section('title','Statuses')
@section('content')

    <div class="uk-section">

        <div class="uk-container">

            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Statuses') }}</h1>
                <a href="{{route('statuses.create')}}" class="uk-button uk-button-primary">Create</a>

                <div class="article-content link-primary">
                    <div class="uk-overflow-auto">
                        <table class="uk-table uk-table-responsive uk-table-middle uk-text-center">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Name Ar</th>
                            <th>Color</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($statuses as $status)
                            <tr>
                                <td>{{$status->name}}</td>
                                <td>{{$status->name_ar}}</td>
                                <td>
                                    <div style="width: 40px;height: 40px;background-color: {{$status->color}}"></div>
                                </td>
                                <td>{{$status->active ? "Yes" : "No"}}</td>
                                 <td>
                                    <a class="uk-button uk-button-secondary" href="{{route('statuses.edit',$status)}}">Edit</a>
                                    <a class="uk-button uk-button-danger uk-text-secondary" href="#" onclick="
                                        if(confirm('are you sure ?')){
                                            event.preventDefault();
                                            document.getElementById('delete-status').submit();
                                        }
                                    ">Delete</a>

                                    <form id="delete-status" action="{{ route('statuses.destroy',$status) }}" onsubmit="return confirm('are you sure')" method="POST" class="d-none">
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

