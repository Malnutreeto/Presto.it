<?php

namespace App\Http\Controllers;

use App\Mail\RevisorRequest;
use App\Models\Main_category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ticket;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

   /**
   * Display a home page with product and main categories.
   */
   public function home() {
      
      //Show all accepted product in ascending order
      $products = Product::where('state', 'accepted')->take(10)->get()->sortByDesc('created_at');
      
      $mainCategories = [];
      
      //Show 4 main categories with most product
      foreach (Main_category::withCount('products')->get()->sortByDesc('products_count') as $key=>$value) {
         if($key <= 3) {
            array_push($mainCategories, $value);
         }
      }

      //Option for share component
      $shareComponent = \Share::page(
         'http://127.0.0.1:8000',
         'Corri a vedere le offerte su Presto.it',
     )
     ->facebook()
     ->telegram()
     ->whatsapp();

      return view('home')->with([
            'products' => $products,
            'mainCategories' => $mainCategories,
            'shareComponent' => $shareComponent,
         ]);
   }

   
 /**
   * Display a admin page with products, users and tickets.
   */
   public function adminPanel (){
      
      $this->authorize('viewAny', auth()->user());

      //Get only tickets with state open
      $ticket = Ticket::where('state', 'open')->get();
      //Get only products with state pending
      $products = Product::where('state', 'pending')->get();
      $users = User::all();
      
      return view('adminPanel')->with(['ticket'=> $ticket, 'users' => $users, 'products'=>$products]);
   }

   /**
   * Display a workWithUs page.
   */
   public function workWithUs (){

      //show the page only if user role is equal or minor of 3
      if(Auth::user()->role_id < 4){
         return abort(403, 'Sei già abilitato');
      }
      
      return view('work');
   }

   /**
   * Store a workWithUs request.
   */
   public function workRequest (Request $request){
      $user = Auth::user();
      $request->validate(['g-recaptcha-response' => 'required|captcha']);
      //Set the request
      Ticket::create([
         'type' => 'newRevisorRequest',
         'body' => "L'utente ha chiesto di diventare revisore.",
         'state' => 'open',
         'user_id' => $user->id,
      ]);
      
      //Send confirmation email to requesting user
      Mail::to($user->email)->send(new RevisorRequest($user));

      return redirect()->back()->with('success', 'La richiesta è stata correttamente inviata');
   }

   public function searchProducts(Request $request) {
      $products = Product::search($request->searched)->where('state', 'accepted')->paginate('10');
      return view('product.index', compact('products'));
   }
}

