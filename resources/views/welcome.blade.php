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
            <article class="right-main-item">
                <img src="img/aTMv9MI0j8U-380x215.jpg">
                <h5>Что посмотреть?</h5>
            </article>
            <article class="right-main-item">
                <img src="img/aTMv9MI0j8U-380x215.jpg">
                <h5>Что посмотреть?</h5>
            </article>
            <article class="right-main-item">
                <img src="img/aTMv9MI0j8U-380x215.jpg">
                <h5>Что посмотреть?</h5>
            </article>
            <article class="right-main-item">
                <img src="img/aTMv9MI0j8U-380x215.jpg">
                <h5>Что посмотреть?</h5>
            </article>
            <article class="right-main-item">
                <img src="img/aTMv9MI0j8U-380x215.jpg">
                <h5>Что посмотреть?</h5>
            </article>
            <article class="right-main-item">
                <img src="img/aTMv9MI0j8U-380x215.jpg">
                <h5>Что посмотреть?</h5>
            </article>
        </section>
    </section>
</main>
@endsection