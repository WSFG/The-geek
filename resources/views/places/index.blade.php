@extends('layouts.app')
@section('content')
    <main>
        @include("aside")
        <section class="content news_content">
            <div id="map"></div>
            <section class="list-places">
                @foreach($places as $place)
                    <section class="item-place">
                        <a href="{{ url('/place/' . $place->id) }}">
                            <div class="place-image">
                                <img src="{{ url($place->getMainImage()->path) }}">
                            </div>
                            <div class="place-text">
                                <h4>{{ $place->name }}</h4>
                                <p>{{ $place->description }}</p>
                                <p><b>Адрес: </b>{{ $place->address }}</p>
                                <p><b>Телефон: </b>{{ $place->phone }}</p>
                                <p><b>Время работы: </b>{{ $place->working_time }}</p>
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

                $.ajax('/api/places', {
                    async: false,
                }).done(function (data) {
                    data.forEach(function (item, index) {
                       markers.push(new google.maps.Marker({
                           position: {
                               lat: parseFloat(item.latitude),
                               lng: parseFloat(item.longitude)
                           },
                           map: map,
                           title: item.name
                       }));
                    });
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6GAYtX1exgaQJjqS6y8HOvuK4--aIuRI&callback=initMap"></script>
@endsection