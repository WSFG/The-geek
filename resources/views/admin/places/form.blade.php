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
                    <input name="address" id="address" type="text" class="k-textbox" style="width: 100%;" value="{{ old('address') || $place ? $place->address : "" }}" />
                    <div id="form_map"></div>
                </li>
                {{--<li>--}}
                    {{--<label for="writers">Авторы</label>--}}
                    {{--<select name="writers[]" id="writers" multiple="multiple" data-placeholder="Выберите вселенные...">--}}
                        {{--@foreach($writers as $writer)--}}
                            {{--{{ $flag = true }}--}}
                            {{--@if(count($newsWriters))--}}
                                {{--@foreach($newsWriters as $newsWriter)--}}
                                    {{--@if ($writer->id === $newsWriter->id)--}}
                                        {{--<option selected value="{{ $writer->id }}">{{ $writer->name . " " . $writer->surname }}</option>--}}
                                        {{--{{ $flag = false }}--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                            {{--@if ($flag)--}}
                                {{--<option value="{{ $writer->id }}">{{ $writer->name . " " . $writer->surname }}</option>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</li>--}}
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
        $("#news").addClass('.active');
        $("#records").click();
    </script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('form_map'), {
                center: {lat: 53.9045398, lng: 27.5615244},
                zoom: 11
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6GAYtX1exgaQJjqS6y8HOvuK4--aIuRI&callback=initMap"></script>
@endsection