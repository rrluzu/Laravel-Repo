<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;

Route::get('products', function(){
    $products = Product::all();
    return view('products.index', compact('products'));
})->name('products.index');

Route::get('products/create', function(){
    return view('products.create');
})->name('products.create');

Route::post('products', function(Request $request){
    return $request->all();
})->name('products.store');

Route::post('products', function(Request $request){
    $newProduct = new Product;
    $newProduct -> description = $request->input('description');
    $newProduct -> price = $request->input('price');
    $newProduct -> save();
    return redirect() -> route('products.index')->with('info', 'Producto insertado correctamente');
})->name('products.store');