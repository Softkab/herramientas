<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
	{!! Form::label('imagen') !!} <br>
	@if( ! empty($categorias))
    <img src="{{ $categorias->url_image }}" alt="{{ $categorias->nombre }}" height="42" width="42">
	@endif
	{!! Form::file('url_image', null) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="#" class="btn btn-default" onclick="history.go(-1)">Cancelar</a>
</div>