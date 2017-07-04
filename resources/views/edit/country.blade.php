@extends('layouts.app')

@section('content')

    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-offset-2 col-md-8">
                    <legend>Измените название страны</legend>
                    {!! Form::model($country, ['route'=>['country.update', $country->id], 'method'=>'PUT']) !!}
                    <div class="form-group">
                    {{Form::text('country', null, ['class'=>'form-control', 'autofocus'])}}
                    </div>
                    {{Form::submit('Next',['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection