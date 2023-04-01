<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon'];


    /**
     * Create the relation for Category and Sub_category
     */
    public function subCategories()
    {
        return $this->belongsToMany(Sub_category::class);
    }

    /**
     * Create the relation for Category and product
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
