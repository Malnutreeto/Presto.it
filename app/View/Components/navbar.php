<?php

namespace App\View\Components;

use App\Models\Main_category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $mainCategories = Main_category::all();
        return view('components.navbar')->with('mainCategories', $mainCategories);
    }
}
