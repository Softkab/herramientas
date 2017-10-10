@extends('layouts.app')

@section('content')
 <table class="table table-hover">
  <thead> 
  <tr> <th></th> 
  <th>
    @include('search.form')
  </th> 
  <th>
  {!! Form::open(['url' => 'foo/bar', 'class'=>'form navbar-form navbar-right searchform']) !!}
    <a href="{!! route('categorias.create') !!}" class="btn btn-primary "><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Nuevo</a>
{!! Form::close() !!}
  </th><th></th> <th></th></tr>
  <tr> <th>#</th> <th>Nombre</th> <th>Productos</th> <th>Editar </th><th>Copiar json</th></tr> </thead>
  <tbody> 
  	@foreach ($categorias as $categoria)
	<tr>
		<td>{{ $categoria->id }}</td><td>{{ $categoria->nombre }}</td>
		<td><a href="productos/{{ $categoria->url }}"> Ver Productos</a></td>
<td><a href="{!! route('categorias.edit', $categoria->id ) !!}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>

</a></td>
<td><a href="#" class="{{ $categoria->url }}"><i class="fa fa-clipboard" aria-hidden="true"></i>
</a></td>
	</tr>
	   <!-- 3. Instantiate clipboard -->
    <script>
    var clipboard = new Clipboard('.{{ $categoria->url }}', {
        text: function() {
            return '{{ URL::to('/herramientas')}}/{{ $categoria->url }}';
        }
    });

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>
	@endforeach
  </tbody>
</table>

 
@endsection
    