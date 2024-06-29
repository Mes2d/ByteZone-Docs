@extends('layouts.header')
@section('title','Faqs')
@section('content')

    <div class="uk-section">
        <div class="uk-container">
            <article class="uk-article">
                <h1 class="uk-article-title uk-text-center">{{ __('Faqs') }}</h1>
                <a href="{{route('faqs.create')}}" class="uk-button uk-button-primary">Create</a>

                <div class="article-content link-primary ">
                    <table class="uk-table uk-table-responsive uk-table-striped uk-table-middle uk-text-center">

                        <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Question Ar</th>
                            <th>Answer Ar</th>
                            <th>Published</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $faq)
                            <tr>
                                <td>{{$faq->question}}</td>
                                <td>{{$faq->answer}}</td>
                                <td>{{$faq->question_ar}}</td>
                                <td>{{$faq->answer_ar}}</td>
                                <td>{{$faq->published ? "Yes" : "No"}}</td>
                                <td>
                                    <a class="uk-button uk-button-success uk-text-warning" href="{{route('faqs.edit',$faq)}}">Edit</a>
                                    <a class="uk-button uk-button-danger uk-text-secondary" href="#" onclick="
                                        if(confirm('are you sure ?')){
                                            event.preventDefault();
                                            document.getElementById('delete-group').submit();
                                        }
                                    ">Delete</a>

                                    <form id="delete-group" action="{{ route('faqs.destroy',$faq) }}" onsubmit="return confirm('are you sure')" method="POST" class="d-none">
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

