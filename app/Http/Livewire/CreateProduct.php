<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Main_category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CreateProduct extends Component
{
    public $title;
    public $description;
    public $price;
    public $mainCategories;

    protected $rules = [
        'title'=>'required|min:4',
        'description'=>'required:20',
        'price'=>'required|numeric',
        'mainCategories'=>'required'
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=> 'Il campo :attribute deve essere un numero'
    ];

    public function cleanForm() {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        
    }

    public function store() {
        $product = Product::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'state'=>'pending',
            'user_id'=>Auth::user()->id
        ]);
        $product->categories()->attach($this->mainCategories);
        $product->save();
        session()->flash('message', 'Annuncio inserito correttamente');
        $this->cleanForm();

    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
