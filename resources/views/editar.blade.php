@extends('layouts.app')
@section('content')
<form action="/herramienta/editar/{{ $producto->id }}" method="post"  enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<label for="Nombre">Nombre</label>
<input type="text" name="nombre" class="form-control" placeholder="Nombre del Producto" value="{{ $producto->nombre }}">


<div class="form-group {{ $errors->has('ID_categoria_producto') ? 'has-error' : ''}}">
                {!! Form::label('ID_categoria_producto', 'Categorias: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                     <select  multiple  name="categoria[]">
                      @foreach ($producto->categorias as $categoria)
                         <option  selected="selected" value="{{$categoria->id}}">{{$categoria->nombre }}</option>
                     @endforeach                  
                     @foreach($info as $clave => $valor)
                         <option  value="{{$clave}}">{{$valor}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
{!! Form::label('Subcategoria') !!}
<select class="form-control" name="subcategoria">

<option value="{!! $subcategoria->id !!}" selected>{!! $subcategoria->nombre !!}</option>	
	@foreach ($subcategorias as $subcategoria)
	<option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
	@endforeach
</select>
{!! Form::label('SubSubcategoria') !!}
<select class="form-control" name="subsubcategoria">
    <option value="0">Ninguna</option>
	@foreach ($subsubcategorias as $subsubcategoria)
	<option value="{{$subsubcategoria->id}}">{{$subsubcategoria->nombre}}</option>
	@endforeach
</select>
{!! Form::label('Resumen') !!}
<textarea class="form-control ckeditor" rows="3" name="resumen">
{{ $producto->resumen }}
</textarea>

{!! Form::label('imagen') !!} <br>
<img src="{{ $producto->url_image }}" alt="{{ $producto->nombre }}" height="42" width="42">{!! Form::file('url_image', null) !!}
<label for="Descripción">Descripción</label>
<textarea class="form-control ckeditor" rows="3" name="descripcion">
{{ $producto->descripcion }}
</textarea>
<label for="Ventajas y Beneficios">Ventajas y beneficios</label>
<textarea class="form-control ckeditor" rows="3" name="ventajas">
{{ $producto->ventajas }}
</textarea>
<label for="Ventajas y Beneficios">Especificaciones técnicas</label>
<textarea class="form-control ckeditor" rows="3" name="especificaciones">
{{ $producto->especificaciones }}
</textarea>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>


{!! Form::open(['route' => ['herramienta.destroy', $producto->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="fa fa-times-circle"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('¿Estas seguro que quieres borrar este producto?')"]) !!}
                {!! Form::close() !!}

<a class="btn btn-success" href="{{ url('/herramienta/nuevo') }}"> Crear Producto</a>
@endsection