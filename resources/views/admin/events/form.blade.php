@extends('admin.index')

@section('content')
    <div id="example" class="content">
        <div class="demo-section k-content">
            <form method="POST" action="{{ $edit ? route('eventEdit', $event->id) : route('eventCreate') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="fieldlist">
                <li>
                    <label for="name">Название</label>
                    <input name="name" id="name" type="text" class="k-textbox" style="width: 100%;" value="{{ old('name') || $event ? $event->name : "" }}" required />
                </li>
                <li>
                    <label for="description">Описание</label>
                    <input id="description" name="description" class="k-textbox" style="width: 100%;" value="{{ old('description') || $event ? $event->description : "" }}" required />
                </li>
                <li>
                    <label for="text">Текст</label>
                    <textarea name="text" id="text" >
                        {{ old('text') || $event ? $event->text : "" }}
                    </textarea>
                </li>
                <li>
                    <label for="date_of_start">Дата начала</label>
                    <input id="date_of_start" name="date_of_start" class="date" style="width: 100%;" value="{{ old('date_of_start') || $event ? $event->date_of_start : "" }}" required />
                </li>
                <li>
                    <label for="date_of_end">Дата окончания</label>
                    <input id="date_of_end" name="date_of_end" class="date" style="width: 100%;" value="{{ old('date_of_end') || $event ? $event->date_of_end : "" }}" required />
                </li>
                {{--<li>--}}
                    {{--<label for="places">Места</label>--}}
                    {{--<select name="places[]" id="places" multiple="multiple" data-placeholder="Выберите место...">--}}
                        {{--@foreach($universes as $universe)--}}
                            {{--{{ $flag = true }}--}}
                            {{--@if (count($newsUniverses))--}}
                                {{--@foreach($newsUniverses as $newsUniverse)--}}
                                    {{--@if ($universe->id === $newsUniverse->id)--}}
                                        {{--<option selected value="{{ $universe->id }}">{{ $universe->name }}</option>--}}
                                        {{--{{ $flag = false }}--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                            {{--@if ($flag)--}}
                                {{--<option value="{{ $universe->id }}">{{ $universe->name }}</option>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</li>--}}
                <li>
                    <label>Изображение</label>
                    <img width="200" src="{{ $eventImage ? url($eventImage->path) : "" }}" alt="">
                    <input name="image" id="image" type="file">
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
        $("#events").addClass('.active');
        $("#records").click();
        $(".date").kendoDateTimePicker({
            value: new Date(),
            dateInput: true
        });
    </script>
@endsection