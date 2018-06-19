@extends('admin.index')

@section('content')
    <div id="example" class="content">
        <div class="demo-section k-content">
            <form method="POST" action="{{ $edit ? route('newsEdit', $news->id) : route('newsCreate') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="fieldlist">
                <li>
                    <label for="title">Название</label>
                    <input name="title" id="title" type="text" class="k-textbox" style="width: 100%;" value="{{ old('title') || $news ? $news->title : "" }}" required />
                </li>
                <li>
                    <label for="description">Описание</label>
                    <input id="description" name="description" class="k-textbox" style="width: 100%;" value="{{ old('description') || $news ? $news->description : "" }}" required />
                </li>
                <li>
                    <label for="text">Текст</label>
                    <textarea name="text" id="text" >
                        {{ old('text') || $news ? $news->text : "" }}
                    </textarea>
                </li>
                <li>
                    <label>Изображение</label>
                    <img width="200" src="{{ $newsImage ? url($newsImage->path) : "" }}" alt="">
                    <input name="image" id="image" type="file">
                </li>
                <li>
                    <label for="universes">Вселенная</label>
                    <select name="universes[]" id="universes" multiple="multiple" data-placeholder="Выберите вселенные...">
                        @foreach($universes as $universe)
                            {{ $flag = true }}
                            @if (count($newsUniverses))
                                @foreach($newsUniverses as $newsUniverse)
                                    @if ($universe->id === $newsUniverse->id)
                                        <option selected value="{{ $universe->id }}">{{ $universe->name }}</option>
                                        {{ $flag = false }}
                                    @endif
                                @endforeach
                            @endif
                            @if ($flag)
                                <option value="{{ $universe->id }}">{{ $universe->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </li>
                <li>
                    <label for="writers">Авторы</label>
                    <select name="writers[]" id="writers" multiple="multiple" data-placeholder="Выберите вселенные...">
                        @foreach($writers as $writer)
                            {{ $flag = true }}
                            @if(count($newsWriters))
                                @foreach($newsWriters as $newsWriter)
                                    @if ($writer->id === $newsWriter->id)
                                        <option selected value="{{ $writer->id }}">{{ $writer->name . " " . $writer->surname }}</option>
                                        {{ $flag = false }}
                                    @endif
                                @endforeach
                            @endif
                            @if ($flag)
                                <option value="{{ $writer->id }}">{{ $writer->name . " " . $writer->surname }}</option>
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
        $("#news").addClass('.active');
        $("#records").click();
    </script>
@endsection