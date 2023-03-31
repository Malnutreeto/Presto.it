<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Main_category;
use App\Models\Product;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Facade;

class CategoryController extends Controller
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
        $mainCategories = Main_category::all();
        $subCategories = Sub_category::all();
        
        return view('category.index')->with([
            'mainCategories'=> $mainCategories,
            'subCategories'=> $subCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
         //Extract all sub:category to import in create view
        $subCategories = Sub_category::all();

        return view('category.create')->with('subCategories', $subCategories);
    }

    /**
     * Store a newly main_category or sub_category in storage.
     */
    public function store(Request $request)
    {
        //Filtering if the request is for main or sub category
        $validator = FacadesValidator::make($request->all(),[
            'name' => 'required|unique:main_categories,name|max:50'
        ]);

        //Verify if validator fails and redirect if is true
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        //Create a new category
        $category = Main_category::create($request->all());
        //Attach sub category
        $category->subCategories()->attach($request->subCategories);

        $category->save();

        return redirect()->route('category.index')->with(['success' => 'Categoria salvata correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Main_category $category)
    {
        return view('category.show')->with([
            'category' => $category,
            'products'=> $category->products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Main_category $category)
    {
        //SubCategories variable for impor all sub categories in view
        $subCategories = Sub_category::all();

        //Type variable to discriminate main_category to sub_category
        $type = 'main';

        return view('category.edit')->with([
            'category' => $category,
            'subCategories' => $subCategories,
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Main_category $category)
    {
        //Filtering if the request is for main or sub category
        $validator = FacadesValidator::make($request->all(),[
            'name' => 'required|unique:main_categories,name|max:50'
        ]);

        //Verify if validator fails and redirect if is true
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

        $category->fill($request->all())->save();
            
        //Detach sub_categories to category for modify it
        $category->subCategories()->detach();

         //Attach new sub_categories to category
        $category->subCategories()->attach($request->subCategories);

        return redirect()->route('category.index')->with(['success' => 'Categoria modificata correttamente.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Main_category $category)
    {
        //Detach sub category to delete category
        $category->subCategories()->detach();
        
        $category->delete();

        return redirect()->back()->with(['success' => 'Prodotto cancellato correttamente.']);
    }
}
