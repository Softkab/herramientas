<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Idcategoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria', 'Categoria:') !!}
    <select class="form-control" name="idcategoria">
    @foreach ($categorias as $categoria)
    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
    @endforeach
    </select>
</div>

<!-- Idsubcategoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subcategoria', 'Subcategoria:') !!}
    <select class="form-control" name="idsubcategoria">
    <option value="0">Ninguna</option>
    @foreach ($subcategorias as $subcategoria)
    <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
    @endforeach
    </select>
</div>


<!-- Resumen Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('resumen', 'Resumen:') !!}
    {!! Form::textarea('resumen', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Ventajas Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ventajas', 'Ventajas:') !!}
    {!! Form::textarea('ventajas', null, ['class' => 'form-control ckeditor']) !!}
</div> 

<!-- Especificaciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('especificaciones', 'Especificaciones:') !!}
    {!! Form::textarea('especificaciones', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="#" class="btn btn-default">Cancelar</a>
</div>
