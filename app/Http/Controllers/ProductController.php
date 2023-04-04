<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Main_category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('verified')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index')->with([
            'products' => Product::all(),
            'mainCategories', Main_category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $lastProducts = Product::where('created_at', '>', Carbon::now()->subDays(1))->where('user_id', Auth::user()->id)->get();

        return view('product.create')->with([
            'mainCategories' => Main_category::all(),
            'lastProducts' => $lastProducts,
        ]);
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

        $product->categories()->attach($request->mainCategory);
        $product->save();
  
        return redirect()->route('product.create')->with(['success' => 'Prodotto salvato correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        return view('product.edit')->with('product',$product)->with('mainCategories', Main_category::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());

        $product->state = $product->state === 'accepted' ?  'accepted' : 'pending';

        $this->authorize('update', $product);
        $this->authorize('acceptProduct', $product);

        $product->save();

        $product->categories()->detach();
        $product->categories()->attach($request->mainCategory);

        return redirect()->route('product.create')->with(['success' => 'Prodotto Modificato correttamente']);   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $product->categories()->detach();

        $product->delete();

        return redirect()->back()->with(['success' => 'Prodotto cancellato correttamente.']);
    }

}
