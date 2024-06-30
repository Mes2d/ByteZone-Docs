@extends('layouts.header')
@section('title',$foundPage->title())

@php
    $locale = \Illuminate\Support\Facades\App::getLocale();
@endphp

<style>

    img:not(#logo) {
        width: 100% !important;
    }

</style>

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-large" data-uk-grid>

                <div class="sidebar-fixed-width uk-visible@m">
                    <div class="sidebar-docs uk-position-fixed uk-margin-top">
                        @foreach($foundSpace->groups as $group)
                            <h5>{{$group->title()}}</h5>
                            @if(count($group->pages))
                                <ul class="uk-nav uk-nav-default doc-nav">
                                    @foreach($group->pages as $page)
                                        <li class="@if($foundPage->title == $page->title) uk-active @endif"><a href="{{url($locale . '/spaces/' . $foundSpace->slug() . '/' . $group->slug() . '/' . $page->slug())}}" >{{$page->title()}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="uk-width-1-1 uk-width-expand@m">
                    <article class="uk-article">
                        <h1 class="uk-article-title">{{$foundPage->title()}}</h1>
                        <p class="uk-text-lead uk-text-muted">{{$foundPage->description()}}</p>

                        <div class="article-content link-primary uk-margin-top">
                            {!! $foundPage->content() !!}
                        </div>

                        <h6>{{__("LATEST_CHANGES")}} : {{$foundPage->updated_at->diffForHumans()}}</h6>

                    </article>
                </div>
            </div>
        </div>
    </div>

    <div id="offcanvas-docs" data-uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" data-uk-close></button>

            @foreach($foundSpace->groups as $group)

                <h5 class="uk-margin-top">{{$group->title()}}</h5>
                @if(count($group->pages))
                    <ul class="uk-nav uk-nav-default doc-nav">
                        @foreach($group->pages as $page)
                            <li class="@if($foundPage->title == $page->title) uk-active @endif"><a href="{{url($locale . '/spaces/' . $foundSpace->slug() . '/' . $group->slug() . '/' . $page->slug())}}" >{{$page->title()}}</a></li>
                        @endforeach
                    </ul>
                @endif
            @endforeach



        </div>
    </div>

@endsection
