<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('categoria', 'Categoria:') !!}
   <select class="form-control" name="categoria">
	@foreach ($categorias as $categoria)
	<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
	@endforeach
</select>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('subcategoria', 'Subcategoria:') !!}
   <select class="form-control" name="subcategoria">
	@foreach ($subcategorias as $subcategoria)
	<option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
	@endforeach
</select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="#" class="btn btn-default" onclick="history.go(-1)">Cancelar</a>
</div>
