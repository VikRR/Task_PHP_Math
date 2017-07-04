<legend>Добавьте название города</legend>
{!! Form::open(['route'=>['city.add', $country->id], 'id'=>'form-add-city']) !!}
<div class="form-group">
    {{Form::text('city', null, ['class'=>'form-control', 'id'=>'city' , 'autofocus'])}}
</div>
{{Form::submit('Next',['class'=>'btn btn-success'])}}
{!! Form::close() !!}