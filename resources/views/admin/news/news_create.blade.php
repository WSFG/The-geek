@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        @if(isset($news))
                            {!! Form::model($news, ['url' => '/news/'.$news->id, 'files' => true, 'route' => ['updateroute', $news->id]]) !!}
                        @else
                            {!! Form::open(['url' => '/news', 'files' => true, 'route' => 'createroute']) !!}
                        @endif
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title',  Input::old('title')) !!}
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description', Input::old('description')) !!}
                        {!! Form::label('text', 'Text') !!}
                        {!! Form::textarea('text', Input::old('text')) !!}
                        {!! Form::label('image', 'Main image') !!}
                        {!! Form::file('image', Input::old('image')) !!}
                        {!! Form::submit('Post', ['name' => 'submit']) !!}
                        {!! Form::close() !!}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection