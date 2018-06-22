@extends('layouts.app')

@section('content')
<main>
    @include('aside')
    <section class="content">
        <fieldset>
            <legend>НОВОСТИ</legend>
        <section class="news">
            @foreach($news as $item)
                <section class="main-news-item">
                    <a href="{{ url('/news/' . $item->id) }}">
                        <img src="{{ url($item->getMainImage->path) }}">
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </a>
                    <div class="likes">

                    </div>
                </section>
            @endforeach
        </section>
        </fieldset>
        <section class="right-main-section">
            <h2>РЕКОМЕНДАЦИИ</h2>
            @foreach($articles as $article)
                <a href="{{ url('article/' . $article->id) }}">
                    <article class="right-main-item">
                        <img src="{{ url($article->getMainImage()->path) }}">
                        <h5>{{ $article->name }}</h5>
                    </article>
                </a>
            @endforeach
        </section>
    </section>
</main>
@endsection