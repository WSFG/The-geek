@extends('admin.index')

@section('content')
    <div id="example" class="content">
        <div class="demo-section k-content">
            <form method="POST" action="{{ $edit ? route('articleEdit', $article->id) : route('articleCreate') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="fieldlist">
                <li>
                    <label for="name">Название</label>
                    <input name="name" id="name" type="text" class="k-textbox" style="width: 100%;" value="{{ old('name') || $article ? $article->name : "" }}" required />
                </li>
                <li>
                    <label for="description">Описание</label>
                    <input id="description" name="description" class="k-textbox" style="width: 100%;" value="{{ old('description') || $article ? $article->description : "" }}" required />
                </li>
                <li>
                    <label for="text">Текст</label>
                    <textarea name="text" id="text" >
                        {{ old('text') || $article ? $article->text : "" }}
                    </textarea>
                </li>
                <li>
                    <label for="type">Тип записи</label>
                    <select name="type" id="type" data-placeholder="Выберите тип записи...">
                        @foreach($types as $type)
                            {{ $flag = true }}
                            @if(count($articleTypes))
                                @foreach($articleTypes as $articleType)
                                    @if ($type->id === $articleType->id)
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
                    <label>Изображение</label>
                    <img width="200" src="{{ $articleImage ? url($articleImage->path) : "" }}" alt="">
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
        $("#type").kendoDropDownList();
        $(".active").removeClass("active");
        $("#articles").addClass('.active');
        $("#records").click();
        $(".date").kendoDateTimePicker({
            value: new Date(),
            dateInput: true
        });
    </script>
@endsection