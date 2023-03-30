<?php

namespace App\Http\Controllers;

use App\Models\Main_category;
use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
   public function home() {

   $products = Product::all();
   $mainCategories = Main_category::all();


    return view('home')->with([
         'products' => $products,
         'mainCategories' => $mainCategories,
      ]);
   }
}

