@extends('layouts.app')
@section('content')
    <main>
        @include("aside")
        <section class="content news_content">
            <section class="news_page">
                <fieldset>
                    <legend><h2>{{ $news->title }}</h2></legend>
                    <article class="news-content">
                        <div class="main_news_information">
                            <img src="{{ url($news->getMainImage->path) }}" class="news_page_main_image leftimg">
                            <p class="news_page_description">{{ $news->description }}</p>
                        </div>
                        {!! $news->text !!}
                    </article>
                    <div class="info">

                    </div>
                </fieldset>
            </section>
            @include('comments')
        </section>
    </main>
    @auth
        <input type="hidden" name="news_id" id="news_id" value="{{ Auth::user()->id }}">
    @endauth
    <script>
        $(".send-comment").addClass("send-news-comment");
    </script>
@endsection