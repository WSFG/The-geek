@extends('layouts.app')

@section('content')
<main>
    @yield('aside')
    <section class="content">
        <section class="news">
            <h2>НОВОСТИ</h2>
            @foreach($news as $item)
                <section class="main-news-item">
                    {{ strval($item->getMainImage) }}
{{--                    <img src="{{ url($item->getMainImage()->path) }}">--}}
                    <h4>{{ $item->title }}</h4>
                    <p>{{ $item->description }}</p>
                    <div class="likes">

                    </div>
                </section>
            @endforeach
        </section>
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