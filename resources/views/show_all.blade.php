@extends('layouts.app')

@section('content')

    <div class="line">
        <div class="block-country">
            <h3>Страна</h3>
        </div>
        <div class="block-city">
            <h3 class="inline-block">Город</h3>
            <div class="block-lang">
                <h3>Язык</h3>
            </div>
        </div>
    </div>
    @foreach($countries as $country)
        <div class="line">
            <div class="block-country">
                <div >{!! ucfirst($country->country) !!}
                    <div class="button-block inline-block">
                        <a href="{{route('country.edit',[$country->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                        {!! Form::open(['route'=>['country.destroy',$country->id], 'method'=>'DELETE', 'class'=>'inline-block']) !!}
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="block-city">
                @foreach($country->city as $city)
                    <div {{($city->lang->count() === 0)?'':"class=city-language"}}>
                        <div class='inline-block'>
                            {!! ucfirst($city->city)!!}
                            <div class="button-block inline-block">
                                <a href="{{route('city.edit',[$city->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                {!! Form::open(['route'=>['city.destroy',$city->id], 'method'=>'DELETE', 'class'=>'inline-block']) !!}
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        @if($city->lang->count())
                            <div class="block-lang">
                                @foreach($city->lang as $lang)
                                    <div>{!! ucfirst($lang->language)!!}
                                        <div class="button-block inline-block">
                                            <a href="{{route('language.edit',[$lang->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                            {!! Form::open(['route'=>['language.destroy',$lang->id], 'method'=>'DELETE', 'class'=>'inline-block']) !!}
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

@stop