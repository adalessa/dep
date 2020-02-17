@extends('layouts.app')

@section('title', 'Productos')

@section('content')
	
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

	<form method="POST" action="/productos/{{$producto->id}}">
        @csrf
		@method('PUT')

        nombre <input type="text" value="{{$producto->name}}" name="name" />
        Precio <input type="text" value="{{$producto->price}}" name="price" />
        sotkc <input type="text" value="{{$producto->stock}}" name="stock" />
        vencimiento <input type="date" value="{{$producto->fecha_vencimiento}}" name="fecha_vencimiento" />
        fraccionable <input type="checkbox" value="1" {{$producto->fraccionable ? 'checked' : ''}} name="fraccionable" />
        Activo <input type="checkbox" value="1" {{$producto->active ? 'checked' : ''}} name="active" />
        <button type="submit"> Guardar </button>

    </form>
@endsection