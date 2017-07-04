@extends('layouts.app')

@section('content')

    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-offset-2 col-md-8">
                    {{--<legend>Добавьте название страны</legend>--}}
                    {!! Form::open(['route'=>'country.add', 'id'=>'form-add-country']) !!}
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('country', 'Выберите страну:')}}
                            {{Form::select('country', $countries, null, ['placeholder' => 'Выберите страну...', 'id'=>'select-country', 'class'=>'form-control ']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('city', 'Выберите город:')}}
                            {{--{{Form::select('city', null, ['placeholder' => 'Выберите город...', 'id'=>'city', 'class'=>'form-control']) }}--}}
                            <select id="city" class="form-control">
                                <option selected  value="0">Выберите город...</option>
                            </select>
                        </div>
                    </div>
                    {{--{{Form::submit('Next',['class'=>'btn btn-success'])}}--}}
                    {!! Form::close() !!}
                    <h3 id="title"></h3>
                    <ul id="lang"></ul>
                </div>
            </div>
        </div>
    </div>

@endsection