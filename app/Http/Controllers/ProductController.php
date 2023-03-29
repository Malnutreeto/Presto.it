<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Main_category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index')->with('mainCategories', Main_category::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create')->with('mainCategories', Main_category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
                'user_id' => Auth::id(),
                'state' => 'pending',
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
        ]);

        $product->categories()->attach($request->mainCategories);

        $product->save();
  
        return redirect()->route('products.create', $product)->with(['success' => 'Prodotto salvato correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit')->with('product',$product)->with('mainCategories', Main_category::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->state = 'pending';

        $product->save();

        $product->categories()->detach();
        $product->categories()->attach($request->mainCategories);

        return redirect()->route('products.create')->with(['success' => 'Prodotto Modificato correttamente']);   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();

        $product->delete();

        return redirect()->back()->with(['success' => 'Prodotto cancellato correttamente.']);
    }
}
