<?php

namespace App\Http\Controllers;

use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Facade;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Filtering if the request is for main or sub category
        $validator = FacadesValidator::make($request->all(),[
            'name' => 'required|unique:sub_categories,name|max:50'
        ]);

        //Verify if validator fails and redirect if is true
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        //Create a new sub_category
        $category = Sub_category::create($request->all());
        $category->save();

        return redirect()->route('category.index')->with(['success' => 'Categoria salvata correttamente']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Sub_category $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sub_category $subCategory)
    {
        //Type variable to discriminate main_category to sub_category
        $type = 'sub';

        return view('category.edit')->with('subCategory', $subCategory)->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sub_category $sub_category)
    {
        //Filtering if the request is for main or sub category
        $validator = FacadesValidator::make($request->all(),[
            'name' => 'required|unique:sub_categories,name|max:50'
        ]);

        //Verify if validator fails and redirect if is true
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

        //Save sub_category
        $sub_category->fill($request->all())->save();

        return redirect()->route('category.index')->with(['success' => 'Categoria modificata correttamente.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sub_category $sub_category)
    {
        $sub_category->delete();

        return redirect()->back()->with(['success' => 'Prodotto cancellato correttamente.']);
    }
}
