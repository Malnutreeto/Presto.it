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
            //Show only products with state accepted
            'products' => Product::where('state', 'accepted')->get(),
            'mainCategories', Main_category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Show all products created taht day by the logged user
        $products = Product::all();

        return view('product.create')->with([
            'mainCategories' => Main_category::all(),
            'products' => $products,
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
    public function update(Request $request, Product $product)
    {
        //If the request is for update only the state of product.
        if ($request->action) {
            
            $product->state = $request->action;

        }//If the request is for update other parametr of the product.
        else{
            $product->fill($request->all());
        }
        
        $this->authorize('update', $product);
        $this->authorize('acceptProduct', $product);

        $product->save();

        $product->categories()->detach();
        $product->categories()->attach($request->mainCategory);

        //If the request is for update only the state of product return in admin panel.
        if ($request->action){
            return redirect()->back()->with(['success' => 'Prodotto Aìaccettato correttamente']);
        }//If the request is for update other parametr of the product return in product create page.
        else{
            return redirect()->route('product.create')->with(['success' => 'Prodotto Modificato correttamente']);   
        }
    }

    /**
    * Update the state of multiple resource in storage.
    */
    public function multiUpdate(Request $request){

        //Split the all firld in array
        $productArray = explode(',', $request->all);

        //For only single elemnte find in db, update the state and save
        foreach($productArray as $element){
            $product = Product::find($element);
            
            if($product){
                $product->state = $request->state;
                $product->save();
            }
        }

        return redirect()->back()->with('success', 'Tutti i prodotti sono stati modificati');
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
