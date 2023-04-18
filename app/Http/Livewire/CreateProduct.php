<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Main_category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CreateProduct extends Component
{
    use WithFileUploads;
    
    public $title;
    public $description;
    public $category;
    public $price;
    public $message;
    public $mainCategories;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $image;
    public $product; 

    
    protected $rules = [
        'title'=>'required|min:4',
        'description'=>'required:20',
        'price'=>'required|numeric',
        'mainCategories'=>'required',
        'images.*' =>  'image|max:1024',
        'temporary_images.*' =>  'image|max:1024',
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=> 'Il campo :attribute deve essere un numero',
        'temporary_images.require' => 'L\' immagine pè richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\' immagine dev\' essere massimo di 1mb',
        'images.image' => 'L\' immagine dev\' essere un immagine',
        'images.image.require' => 'L\' immagine dev\' essere massimo di 1mb',

    ];

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' =>  'image|max:1024',
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if (in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function cleanForm() {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->images = [];
        $this->temporary_images = [];
    }

    public function store() {
        $product = Product::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'category'=>$this->category,
            'state'=>'pending',
            'user_id'=>Auth::user()->id
            
        ]);
        
        if (count($this->images)){
            foreach($this->images as $key => $image){
                $product->images()->create(['path' => $image->storeAs('public/images/' . Auth::id(),  Str::slug($product['title'], '_'). $key . '.' . $image->extension())]);
            }
        }

        $product->categories()->attach($this->category);
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
