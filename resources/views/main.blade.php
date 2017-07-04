@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')

    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-offset-2 col-md-8">
                    <fieldset id="form-add-data">
                        <legend>Добавьте название страны</legend>
                        {!! Form::open(['route'=>'country.add', 'id'=>'form-add-country']) !!}
                        <div class="form-group">
                            {{Form::text('country', null, ['class'=>'form-control', 'id'=>'country', 'required', 'autofocus'])}}
                        </div>
                        {{Form::submit('Next',['class'=>'btn btn-success'])}}
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

@stop