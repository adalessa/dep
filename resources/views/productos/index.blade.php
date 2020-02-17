@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    @foreach($productos as $produ)
		<div>Producto: {{$produ->name}}</div>
		
		<a href="/productos/{{$produ->id}}">Mostrar detalle</a>


	@endforeach

	<div><a href="/productos/create">Crear productos</a></div>
@endsection