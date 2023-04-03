<?php

namespace App\Http\Controllers;

use App\Models\Main_category;
use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
   public function home() {

   $products = Product::take(10)->get()->sortByDesc('created_at');
   $mainCategories = [];
   foreach (Main_category::withCount('products')->get()->sortByDesc('products_count') as $key=>$value) {
      if($key <= 3) {
         array_push($mainCategories, $value);
      }
   }

// foreach(Main_category::withCount('products')->get() as $category) {
// sortByDesc($category->products_count);
// }




   

    return view('home')->with([
         'products' => $products,
         'mainCategories' => $mainCategories,
      ]);
   }
}

