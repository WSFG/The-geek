@extends('layouts.app')
@section('content')
    <main>
        @include("aside")
        <section class="content news_content">
            <section class="news_page">
                <fieldset>
                    <legend><h2>{{ $event->name }}</h2></legend>
                    <article class="news-content">
                        <div class="main_news_information">
                            <img src="{{ url($event->getMainImage()->path) }}" class="news_page_main_image leftimg">
                            <div class="news_page_description">
                                <p>{{ $event->description }}</p>
                                <p><b>Дата начала: </b>{{ $event->date_of_start }}</p>
                                <p><b>Дата окончания: </b>{{ $event->date_of_end }}</p>
                            </div>
                        </div>
                        {!! $event->text !!}
                    </article>
                    <div class="info">

                    </div>
                </fieldset>
            </section>
        </section>
    </main>
@endsection