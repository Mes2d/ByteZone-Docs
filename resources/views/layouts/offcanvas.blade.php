
<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">
        <a class="uk-logo" href="index.html">BzDocs</a>
        <button class="uk-offcanvas-close" type="button" data-uk-close></button>
        <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-top">
            <li class="uk-active"><a href="{{url("/" . $locale)}}">{{__("HOME")}}</a></li>
            @if(count($categories))

                @foreach($categories as $category)

                    <li>
                        <a href="{{url("/" . $locale . '/categories/' . $category->name())}}">{{$category->name()}} ({{$category->spaces->count()}})</a>


                        @if(count($category->spaces))
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    @foreach($category->spaces as $space)
                                        <li>
                                            <a href="{{url($locale . '/spaces/' . $space->slug())}}">{{$space->name()}} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>

                @endforeach


            @endif
            <li>
                <a href="#">{{__("ADMIN")}}</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="{{route('categories.index')}}">Categories</a></li>
                        <li><a href="{{route('spaces.index')}}">Spaces</a></li>
                        <li><a href="{{route('groups.index')}}">Groups</a></li>
                        <li><a href="{{route('pages.index')}}">Pages</a></li>
                    </ul>
                </div>
            </li>

            @if($locale == 'ar')
                <li><a href="{{url("/en")}}">English</a></li>
            @else
                <li><a href="{{url("/ar")}}">عربي</a></li>
            @endif

            <li>
                <div class="uk-navbar-item"><a class="uk-button uk-button-success" href="contact.html">Contact</a></div>
            </li>
        </ul>
    </div>
</div>
