@extends('layouts.header')
@section('title',__("HOME"))

@php
    $locale = \Illuminate\Support\Facades\App::getLocale();
@endphp

@section('content')

    <div class="uk-section section-hero uk-position-relative" data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
        <div class="uk-container uk-container-small">
            <p class="hero-image uk-text-center"><img src="{{asset('assets/imgs/bg.svg')}}" alt="Hero"></p>
            <h1 class="uk-heading-medium uk-text-center uk-margin-remove-top">{{__("HOW_CAN_WE_HELP_YOU")}}</h1>
            <p class="uk-text-lead uk-text-center">{{__("HOME_DESCRIPTION")}}</p>
            <div class="hero-search">
                <div class="uk-position-relative">
                    <form class="uk-search uk-search-default uk-width-1-1" name="search-hero" onsubmit="return false;">
                        <span class="uk-search-icon-flip" data-uk-search-icon></span>
                        <input id="search-hero" class="uk-search-input uk-box-shadow-large" type="search"
                               placeholder="{{__("SEARCH")}}" autocomplete="off" data-minchars="1" data-maxitems="30">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="uk-section">
        <div class="uk-container">
            <h2 class="uk-h1 uk-text-center">{{__("FEATURES")}}</h2>
            <p class="uk-text-lead uk-text-center">{{__("FEATURES_DESCRIPTION")}}</p>
            <div class="uk-child-width-1-3@m uk-grid-match uk-text-center uk-margin-medium-top" data-uk-grid>
                <div>
                    <div
                        class="uk-card uk-card-default uk-box-shadow-medium uk-card-hover uk-card-body uk-inline border-radius-large border-xlight">
                        <a class="uk-position-cover" href="#"></a>
                        <span data-uk-icon="icon: receiver; ratio: 3.4" class=""></span>
                        <h3 class="uk-card-title uk-margin">{{__("FEATURE_1_TITLE")}}</h3>
                        <p>{{__("FEATURE_1_DESCRIPTION")}}</p>
                    </div>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-box-shadow-medium uk-card-hover uk-card-body uk-inline border-radius-large border-xlight">
                        <a class="uk-position-cover" href="#"></a>
                        <span data-uk-icon="icon:  users; ratio: 3.4" class=""></span>
                        <h3 class="uk-card-title uk-margin">{{__("FEATURE_2_TITLE")}}</h3>
                        <p>{{__("FEATURE_2_DESCRIPTION")}}</p>
                    </div>
                </div>
                <div>
                    <div
                        class="uk-card uk-card-default uk-box-shadow-medium uk-card-hover uk-card-body uk-inline border-radius-large border-xlight">
                        <a class="uk-position-cover" href="#"></a>
                        <span data-uk-icon="icon: lock; ratio: 3.4" class=""></span>
                        <h3 class="uk-card-title uk-margin">{{__("FEATURE_3_TITLE")}}</h3>
                        <p>{{__("FEATURE_3_DESCRIPTION")}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(count($pages))
        <div class="uk-section section-featured">
            <div class="uk-container uk-container-small">
                <h2 class="uk-h1 uk-text-center">{{__("LATEST_ARTICLES")}}</h2>
                <p class="uk-text-center uk-text-lead">{{__("LATEST_ARTICLES_DESCRIPTION")}}</p>
                <ul class="uk-list uk-list-large uk-margin-medium-top">
                    @foreach($pages as $page)
                        <li><a class="uk-box-shadow-hover-small" href="{{url('/' . $locale . '/spaces/' . $page->group->space->slug() . '/' . $page->group->slug() . '/' . $page->slug())}}">{{$page->title()}} | {{$page->group->space->name()}}</a></li>
                    @endforeach


                </ul>
            </div>
        </div>
    @endif


    @if(count($faqs))

    <div class="uk-section">
        <div class="uk-container uk-container-small">
            <h2 class="uk-h1 uk-text-center">{{__("FAQ")}}</h2>
            <p class="uk-text-center uk-text-lead">{{__("FAQ_DESCRIPTION")}}</p>
            <ul class="uk-margin-medium-top" data-uk-accordion="multiple: true">
                @foreach($faqs as $faq)

                    <li>
                        <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">{{$faq->question()}}</a>
                        <div class="article-content uk-accordion-content link-primary">
                          {{$faq->answer()}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    @endif




    <div class="uk-section section-team">
        <div class="uk-container uk-container-expand">
            <h2 class="uk-h1 uk-text-center">{{__("WE_ARE_HERE")}}</h2>
            <p class="uk-text-lead uk-text-center">{{__("WE_ARE_HERE_DESCRIPTION")}}</p>
            <div class="uk-margin-medium-top uk-grid-small uk-flex-center uk-text-center uk-margin-medium-top" data-uk-grid>
                <div>
                    <div class="uk-card">
                        <img class="uk-border-circle" src="https://via.placeholder.com/172" alt="Musaed" />
                        <h5 class="uk-margin-remove-bottom uk-margin-top">Musaed</h5>
                        <p class="uk-article-meta uk-margin-remove-bottom uk-margin-small-top">Team Leader</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card">
                        <img class="uk-border-circle" src="https://via.placeholder.com/172" alt="Saud" />
                        <h5 class="uk-margin-remove-bottom uk-margin-top">Saud</h5>
                        <p class="uk-article-meta uk-margin-remove-bottom uk-margin-small-top">Developer</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card">
                        <img class="uk-border-circle" src="https://via.placeholder.com/172" alt="Oussama" />
                        <h5 class="uk-margin-remove-bottom uk-margin-top">Oussama</h5>
                        <p class="uk-article-meta uk-margin-remove-bottom uk-margin-small-top">Developer</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card">
                        <img class="uk-border-circle" src="https://via.placeholder.com/172" alt="Abdulaziz" />
                        <h5 class="uk-margin-remove-bottom uk-margin-top">Abdulaziz</h5>
                        <p class="uk-article-meta uk-margin-remove-bottom uk-margin-small-top">Design Engineer</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="uk-section uk-text-center">
        <div class="uk-container uk-container-small">
            <div data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
                <h2 class="uk-h1 uk-margin-bottom">{{__("DID_NOT_FIND_ANSWER")}}</h2>
                <p class="uk-text-lead uk-text-center">{{__("DID_NOT_FIND_ANSWER_DESCRIPTION")}}</p>
                <a class="uk-button uk-button-primary uk-button-large uk-margin-medium-top" href="{{$locale . '/contact'}}">{{__("CONTACT")}}</a>
            </div>
        </div>
    </div>


@endsection
