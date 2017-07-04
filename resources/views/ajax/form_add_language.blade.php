<legend>Добавьте язык</legend>
{!! Form::open(['route'=>['language.store', $city->id], 'id'=>'form-add-language']) !!}
<div class="form-group">
    {{Form::text('language', null, ['class'=>'form-control', 'id'=>'language', 'autofocus'])}}
</div>
{{Form::submit('Добавить...',['class'=>'btn btn-success'])}}
{!! Form::close() !!}