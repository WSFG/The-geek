@extends('layouts.app')

@section('content')
    <main>
        @include('aside')
        <section class="content news_content">
            <section class="list-places">
                @foreach($articles as $article)
                    <section class="item-place">
                        <a href="{{ url('/article/' . $article->id) }}">
                            <div class="place-image">
                                <img src="{{ url($article->getMainImage()->path) }}">
                            </div>
                            <div class="place-text">
                                <h4>{{ $article->name }}</h4>
                                <p>{{ $article->description }}</p>
                            </div>
                        </a>
                        <div class="likes">

                        </div>
                    </section>
                @endforeach
            </section>
        </section>
    </main>
@endsection