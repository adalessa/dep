@extends('layouts.app')

@section('title', 'Productos')

@section('content')
	<div>Numero de id:{{$producto->id}}</div>
	<div>Nombre: {{$producto->name}}</div>
	<div>Es fraccionable:{{$producto->fraccionable  ? 'Si' : 'No'	}}</div>
	<div>Precio: {{$producto->price}}</div>
	<div>Fecha de vencimiento:{{$producto->fecha_vencimiento}}</div>
	<div>Stock: {{$producto->stock}}</div>
	<div>Es un activo: {{$producto->active ? 'Si' : 'No'}}</div>

	<a href="/productos/{{$producto->id}}/edit">Editar</a>
	<form method="POST" action="/productos/{{$producto->id}}">
		@csrf
		@method('DELETE')

		<button type="submit">Eliminar</button>
	</form>
@endsection