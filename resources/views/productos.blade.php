@extends('layouts.app')

@section('content')
 <table class="table table-hover">
  <thead> <tr> <th></th> <th></th> 
  <th>
  	@include('search.form')
  </th> 
  <th colspan="2">
  {!! Form::open(['url' => 'foo/bar', 'class'=>'form navbar-form navbar-right searchform']) !!}
    <a href="{{ URL::to('/nuevo')}}/producto/" class="btn btn-primary "><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Nuevo</a>
{!! Form::close() !!}
  </th><th></th> </tr> 
  		 <tr> <th>#</th> <th>Imagen</th> <th>Nombre</th> <th>Url</th><th></th><th></th> </tr>
  </thead>
  <tbody> 
  	@foreach ($productos as $producto)
	<tr>
		<td>{{ $producto->id }}</td><td><img src="{{ $producto->url_image }}" alt="{{ $producto->nombre }}" height="42" width="42"></td><td>{{ $producto->nombre }}</td>
		<td><a href="{{ URL::to('/producto')}}/{{ $producto->id }}">Ver más</a></td>
		<td><a href="{{ URL::to('/herramienta')}}/editar/{{ $producto->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a></td>
		<td><a href="#" class="{{ $producto->url }}"><i class="fa fa-clipboard" aria-hidden="true"></i>

	</tr>
       <!-- 3. Instantiate clipboard -->
    <script>
    var clipboard = new Clipboard('.{{ $producto->url }}', {
        text: function() {
            return '{{ URL::to('/herramienta')}}/{{ $producto->id }}';
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
