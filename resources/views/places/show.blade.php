@extends('layouts.app')
@section('content')
    <main>
        @include("aside")
        <section class="content news_content">
            <section class="news_page">
                <fieldset>
                    <legend><h2>{{ $place->name }}</h2></legend>
                    <article class="news-content">
                        <div class="main_news_information">
                            <img src="{{ url($place->getMainImage()->path) }}" class="news_page_main_image leftimg">
                            <div class="news_page_description">
                                <p>{{ $place->description }}</p>
                                <p><b>Адрес: </b>{{ $place->address }}</p>
                                <p><b>Телефон: </b>{{ $place->phone }}</p>
                                <p><b>Время работы: </b>{{ $place->working_time }}</p>
                            </div>
                        </div>
                        {!! $place->text !!}
                        <div id="map"></div>
                    </article>
                    <div class="info">

                    </div>
                </fieldset>
            </section>
        </section>
    </main>
    <script>
        function initMap() {
            var myLatLng = {};
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    myLatLng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    createMap();
                }, () => {console.log('Error')});
            } else {
                myLatLng = {lat: -33.8688, lng: 151.2195};
                createMap();
            }
            function createMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: myLatLng
                });

                var markers = [];

                $.ajax('/api/place/{{ $place->id }}', {
                    async: false,
                }).done(function (data) {
                    markers.push(new google.maps.Marker({
                        position: {
                            lat: parseFloat(data.latitude),
                            lng: parseFloat(data.longitude)
                        },
                        map: map,
                        title: data.name
                    }));
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6GAYtX1exgaQJjqS6y8HOvuK4--aIuRI&callback=initMap"></script>
@endsection