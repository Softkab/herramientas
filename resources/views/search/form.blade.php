{!! Form::open(array('route' => 'queries.index', 'class'=>'form navbar-form navbar-right searchform')) !!}
  	{!! Form::text('search', null, array('required', 'class'=>'form-control', 'placeholder'=>'Buscar un producto...')) !!}
    {!! Form::submit('Buscar', array('class'=>'btn btn-default')) !!}
	{!! Form::close() !!}