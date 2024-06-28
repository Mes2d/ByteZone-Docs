@extends('layouts.header')
@section('title','Contact')

@php
    $locale = \Illuminate\Support\Facades\App::getLocale();
@endphp

@section('content')

    <div class="uk-section">
        <div class="uk-container uk-container-xsmall">
            <article class="uk-article">
                <h1 class="uk-article-title">Got Any Questions</h1>
                <div class="article-content link-primary">
                    <h5 id="morbi-varius-in-accumsan-blandit-elit-ligula-velit-luctus-mattis-ante-nulla-nulla">Morbi varius in
                        accumsan blandit, elit ligula velit, luctus mattis ante nulla nulla.</h5>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                        dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    <form class="uk-form-stacked uk-margin-medium-top" method="POST" action="https://formspree.io/my_name@gmail.com"
                          accept-charset="UTF-8">
                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="name">Name</label>
                            <div class="uk-form-controls">
                                <input id="name" class="uk-input uk-form-large uk-border-rounded" name="name" type="text" required="">
                            </div>
                        </div>
                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="_replyto">Email</label>
                            <div class="uk-form-controls">
                                <input id="_replyto" class="uk-input uk-form-large uk-border-rounded" name="_replyto" type="email" required="">
                            </div>
                        </div>
                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="_subject">Subject</label>
                            <div class="uk-form-controls">
                                <input id="_subject" class="uk-input uk-form-large uk-border-rounded" name="_subject" type="text">
                            </div>
                        </div>
                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label uk-margin-small-bottom" for="message">Message</label>
                            <div class="uk-form-controls">
              <textarea id="message" class="uk-textarea uk-form-large uk-border-rounded" name="message" rows="5" minlength="10"
                        required=""></textarea>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="_next" value="https://docs.jekyll.plus/thanks/">
                            <input type="text" name="_gotcha" style="display:none">
                            <input class="uk-button uk-button-primary uk-button-large uk-width-1-1" type="submit" value="Send">
                        </div>
                    </form>
                </div>
            </article>
        </div>
    </div>

@endsection
