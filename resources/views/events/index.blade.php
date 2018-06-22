@extends('layouts.app')

@section('content')
    <main>
        @include('aside')
        <section class="content news_content">
            <div id="calendar"></div>
            <section class="list-places">
                @foreach($events as $event)
                    <section class="item-place">
                        <a href="{{ url('/event/' . $event->id) }}">
                            <div class="place-image">
                                <img src="{{ url($event->getMainImage()->path) }}">
                            </div>
                            <div class="place-text">
                                <h4>{{ $event->name }}</h4>
                                <p>{{ $event->description }}</p>
                                <p><b>Дата начала: </b>{{ $event->date_of_start }}</p>
                                <p><b>Дата окончания: </b>{{ $event->date_of_end }}</p>
                            </div>
                        </a>
                        <div class="likes">

                        </div>
                    </section>
                @endforeach
            </section>
        </section>
    </main>
    <script>
        $.ajax("/api/events", {
            async: false
        }).done(function (data) {
            var result = data.map(function (value, index) {
                return {
                    title: value.name,
                    url: "event/" + value.id,
                    start: value.date_of_start,
                    end: value.date_of_end,
                }
            });
            calendarCreate(result);
        });
    </script>
@endsection