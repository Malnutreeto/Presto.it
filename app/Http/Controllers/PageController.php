<?php

namespace App\Http\Controllers;

use App\Mail\RevisorRequest;
use App\Models\Main_category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ticket;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

      return view('home')->with([
            'products' => $products,
            'mainCategories' => $mainCategories,
         ]);
   }

   public function adminPanel (){
      $this->authorize('viewAny', auth()->user());
      return view('adminPanel');
   }

   public function workWithUs (){
      return view('work');
   }

   public function workRequest (){
      $user = Auth::user();
      Ticket::create([
         'type' => 'newRevisorRequest',
         'body' => "L'utente ha chiesto di diventare revisore.",
         'state' => 'open',
         'user_id' => $user->id,
      ]);
      Mail::to($user->email)->send(new RevisorRequest($user));

      return redirect()->back()->with('success', 'La richiesta è stata correttamente inviata');
   }
}

