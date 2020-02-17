<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        /* $products = Product::where('active', 1) */
        /*     ->where('stock', '>', 3) */
        /*     ->where('price', '<', 1000) */
        /*     ->orderBy('price') */
        /*     ->get(); */

        $products = Product::all();

        return view('productos.index', ['productos'=> $products]);

    }

    public function create()
    {
        return view('productos.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required|numeric|gte:0',
            'stock' => 'required|integer|gte:0',
            'fecha_vencimiento' => 'required|date|after:tomorrow',
            'fraccionable' => 'boolean',
        ]);

        $new = new Product();
        $new->name = $request->name;
        $new->price = $request->price;
        $new->stock = $request->stock;
        $new->fecha_vencimiento = $request->fecha_vencimiento;
        $new->fraccionable = $request->fraccionable ?? false;
        $new->active = true;
        $new->save();

        return redirect('/productos');
    }

    public function show(Product $producto)
    {   
        return view('productos.show', ['producto'=> $producto]);
    }

    public function edit(Product $producto)
    {     
        return view('productos.edit', ['producto'=> $producto]);
    }

    public function update(Request $request,Product $producto)
    {   
        $request->validate([
            'name' => 'required|unique:products,name,'.$producto->id,
            'price' => 'required|numeric|gte:0',
            'stock' => 'required|integer|gte:0',
            'fraccionable' => 'boolean',
            'active'=> 'boolean',
            'fecha_vencimiento'=> 'date',
        ]);   

        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->fecha_vencimiento = $request->fecha_vencimiento;
        $producto->fraccionable = $request->fraccionable ?? false;
        $producto->active = $request->active ?? false;
        $producto->save();

        return redirect('/productos/'.$producto->id);

    }

    public function destroy(Product $producto)
    {
        $producto->delete();
        return redirect('/productos');
    }


}
