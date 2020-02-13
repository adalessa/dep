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

        dd($products);
    }

    public function create()
    {
        return view('productos.create');
    }


    public function store(Request $request)
    {
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

}
