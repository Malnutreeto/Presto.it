<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProduct extends Component
{
    public $title;
    public $body;
    public $price;

    protected $rules = [
        'title'=>'required|min:4',
        'body'=>'required:20',
        'price'=>'required|numeric'
    ];

    protected $messages = [
        'required'=>'Il campo :attribute è richiesto',
        'min'=>'Il campo :attribute è troppo corto',
        'numeric'=> 'Il campo :attribute deve essere un numero'
    ];

    public function store() {
        Product::create( [
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price
        ]);
        session()->flash('message', 'Annuncio inserito correttamente');
        $this->cleanForm();
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function cleanForm() {
        $this->title = '';
        $this->body = '';
        $this->price = '';
    }





    public function render()
    {
        return view('livewire.create-product');
    }
}
