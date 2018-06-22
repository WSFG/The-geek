@extends('layouts.app')
@section('content')
    <main>
        @include("aside")
        <section class="content news_content">
            <section class="news_page">
                <fieldset>
                    <legend><h2>{{ $article->name }}</h2></legend>
                    <article class="news-content">
                        <div class="main_news_information">
                            <img src="{{ url($article->getMainImage()->path) }}" class="news_page_main_image leftimg">
                            <div class="news_page_description">
                                <p>{{ $article->description }}</p>
                            </div>
                        </div>
                        {!! $article->text !!}
                    </article>
                    <div class="info">

                    </div>
                </fieldset>
            </section>
        </section>
    </main>
@endsection