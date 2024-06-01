@extends('layouts.header')
@section('title',$category->name)
@section('content')

    <div class="uk-container uk-padding-large">
        <h1 class="uk-h1 uk-text-center">{{$category->name}}</h1>
        <p class="uk-text-lead uk-text-center">{{$category->description}}</p>
        <div class="uk-child-width-1-3@m uk-grid-match uk-text-center uk-margin-medium-top uk-grid uk-grid-stack" data-uk-grid="">
            @foreach($category->spaces as $space)
            <div class="uk-first-column">
                    <div class="uk-card uk-card-default uk-box-shadow-medium uk-card-hover uk-card-body uk-inline border-radius-large border-xlight">
                        <a class="uk-position-cover" href="{{url('spaces/' . $space->slug)}}"></a>
                        <div data-src="{{asset('storage/' . $space->image)}}" uk-img style="height: 300px;background-size: cover;background-position: center">…</div>
                        <h3 class="uk-card-title uk-margin">{{$space->name}}</h3>
                        <p>{{$space->description}}</p>
                    </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
