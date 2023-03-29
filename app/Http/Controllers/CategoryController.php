<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Main_category;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Facade;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
         //Extract all sub:category to import in create view
        $subCategories = Sub_category::all();

        return view('categories.create')->with('subCategories', $subCategories);
    }

    /**
     * Store a newly main_category or sub_category in storage.
     */
    public function store(Request $request)
    {
        //Filtering if the request is for main or sub category
        $validator = FacadesValidator::make($request->all(),[
            'name' => 'required|unique:' . $request->CategoryType . '_categories,name|max:20'
        ]);

        //Verify if validator fails and redirect if is true
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        //If the request CategoryType is main create category and attach sub_categoriws
        if ($request->CategoryType === 'main' ){
            
            $category = Main_category::create($request->all());
            $category->subCategories()->attach($request->subCategories);
            $category->save();
        }
        //If the request CategoryType is sub create sub_category
        elseif($request->CategoryType === 'sub'){
            Sub_category::create($request->all());
        }



        return redirect()->route('category.index')->with(['success' => 'Categoria salvata correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Main_category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Main_category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Main_category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Main_category $category)
    {
        //
    }
}
