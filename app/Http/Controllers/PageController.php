<?php

namespace App\Http\Controllers;

use App\Models\Main_category;
use Illuminate\Http\Request;

class PageController extends Controller
{
   public function home() {
    return view('home')->with('mainCategories', Main_category::all());
   }
}

