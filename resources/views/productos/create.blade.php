@extends('layouts.app')

@section('title', 'Create Product')

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

    <form method="POST" action="/productos">
        @csrf

        nombre <input type="text" value="{{old('name')}}" name="name" />
        Precio <input type="text" value="{{old('price')}}" name="price" />
        sotkc <input type="text" value="{{old('stock')}}" name="stock" />
        vencimiento <input type="date" value="{{old('fecha_vencimiento')}}" name="fecha_vencimiento" />
        fraccionable <input type="checkbox" value="1" {{old('fraccionable') ? 'checked' : ''}} name="fraccionable" />

        Categoria <select name="categoria_id">
            @foreach(App\Categoria::all() as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary"> Guardar </button>

    </form>
@endsection
