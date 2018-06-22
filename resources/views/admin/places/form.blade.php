@extends('admin.index')

@section('content')
    <div id="example" class="content">
        <div class="demo-section k-content">
            <form method="POST" action="{{ $edit ? route('placeEdit', $place->id) : route('placeCreate') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="fieldlist">
                <li>
                    <label for="name">Название</label>
                    <input name="name" id="name" type="text" class="k-textbox" style="width: 100%;" value="{{ old('name') || $place ? $place->name : "" }}" required />
                </li>
                <li>
                    <label for="description">Описание</label>
                    <input id="description" name="description" class="k-textbox" style="width: 100%;" value="{{ old('description') || $place ? $place->description : "" }}" required />
                </li>
                <li>
                    <label for="text">Текст</label>
                    <textarea name="text" id="text" >
                        {{ old('text') || $place ? $place->text : "" }}
                    </textarea>
                </li>
                <li>
                    <label>Изображение</label>
                    <img width="200" src="{{ $placeImage ? url($placeImage->path) : "" }}" alt="">
                    <input name="image" id="image" type="file">
                </li>
                <li>
                    <label for="phone">Номер телефона</label>
                    <input name="phone" id="phone" type="text" class="k-textbox" style="width: 100%;" value="{{ old('phone') || $place ? $place->phone : "" }}" />
                </li>
                <li>
                    <label for="working_time">Время работы</label>
                    <input name="working_time" id="working_time" type="text" class="k-textbox" style="width: 100%;" value="{{ old('working_time') || $place ? $place->working_time : "" }}" />
                </li>
                <li>
                    <label for="address">Адрес</label>
                    <input name="address" id="address" type="text" class="controls" placeholder="" value="{{ old('address') || $place ? $place->address : "" }}" />
                    <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') || $place ? $place->latitude : "" }}">
                    <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') || $place ? $place->longitude : "" }}">
                    <div id="form_map"></div>
                </li>
                <li>
                    <label for="type">Тип места</label>
                    <select name="type" id="type" data-placeholder="Выберите тип места...">
                        @foreach($types as $type)
                            {{ $flag = true }}
                            @if(count($placeTypes))
                                @foreach($placeTypes as $placeType)
                                    @if ($type->id === $placeType->id)
                                        <option selected value="{{ $type->id }}">{{ $type->type }}</option>
                                        {{ $flag = false }}
                                    @endif
                                @endforeach
                            @endif
                            @if ($flag)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                            @endif
                        @endforeach
                    </select>
                </li>
                <li>
                    <button id="news-send" type="submit" class="k-button k-primary">Отправить</button>
                </li>
            </ul>
            </form>
            <style>
                .fieldlist {
                    margin: 0 0 -2em;
                    padding: 0;
                }

                .fieldlist li {
                    list-style: none;
                    padding-bottom: 2em;
                }

                .fieldlist label {
                    display: block;
                    padding-bottom: 1em;
                    font-weight: bold;
                    text-transform: uppercase;
                    font-size: 12px;
                    color: #444;
                }

            </style>
        </div>
    </div>
    <script>
        $(".active").removeClass("active");
        $("#places").addClass('.active');
        $("#records").click();
        var coordinates;
    </script>
    @if(old('latitude'))
        <script>
            coordinates = {
                lat: {{ old('latitude') }},
                lng: {{ old('longitude') }}
            };
        </script>
    @elseif($place)
        <script>
            coordinates = {
                lat: {{ $place->latitude }},
                lng: {{ $place->longitude }}
            };
        </script>
    @endif
    <script>
        $("#type").kendoDropDownList();
        function initAutocomplete() {
            var myLatLng = {};
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    myLatLng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    createMap();
                });
            } else {
                if (coordinates) {
                    myLatLng = coordinates;
                    createMap();
                } else {
                    myLatLng = {lat: -33.8688, lng: 151.2195};
                    createMap();
                }
            }
            function createMap() {
                var map = new google.maps.Map(document.getElementById('form_map'), {
                    center: myLatLng,
                    zoom: 13,
                    mapTypeId: 'roadmap'
                });

                if (coordinates) {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(coordinates.lat, coordinates.lng),
                        map: map
                    });
                }

                var input = document.getElementById('address');
                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                map.addListener('bounds_changed', function() {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];

                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                        return;
                    }

                    if (marker) {
                        marker.setMap(null);
                    }

                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function(place) {
                        if (!place.geometry) {
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };

                        markers.push(new google.maps.Marker({
                            map: map,
                            icon: icon,
                            title: place.name,
                            position: place.geometry.location
                        }));

                        $("#latitude").val(place.geometry.location.lat());
                        $("#longitude").val(place.geometry.location.lng());

                        if (place.geometry.viewport) {
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6GAYtX1exgaQJjqS6y8HOvuK4--aIuRI&libraries=places&callback=initAutocomplete"></script>
@endsection