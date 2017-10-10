<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $producto->id }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $producto->nombre }}</p>
</div>





<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {{ $producto->descripcion }}
</div>

<!-- Especificaciones Field -->
<div class="form-group">
    {!! Form::label('especificaciones', 'Especificaciones:') !!}
    {{ $producto->especificaciones }}
</div>

<!-- Ventajas Field -->
<div class="form-group">
    {!! Form::label('ventajas', 'Ventajas:') !!}
    {{ $producto->ventajas }}
</div>


