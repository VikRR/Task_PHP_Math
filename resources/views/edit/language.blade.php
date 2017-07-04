@extends('layouts.app')

@section('content')

    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-offset-2 col-md-8">
                    <legend>Измените язык</legend>
                    {!! Form::model($language, ['route'=>['language.update', $language->id], 'method'=>'PUT']) !!}
                    <div class="form-group">
                    {{Form::text('language', null, ['class'=>'form-control', 'autofocus'])}}
                    </div>
                    {{Form::submit('Next',['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection