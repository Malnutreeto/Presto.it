<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'price', 'user_id', 'state'];

    /**
     * Create the relation for Product and Main_category
     */
    public function categories()
    {
        return $this->belongsToMany(Main_category::class);
    }


    /**
     * Create the relation for Product and Main_category
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
