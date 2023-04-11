<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;
    
    protected $fillable = ['title', 'description', 'price', 'user_id', 'state'];

    public function toSearchableArray() {
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $category,
        ];
        return $array;
    }


    /**
     * Create the relation for Product and Main_category
     */
    public function categories()
    {
        return $this->belongsToMany(Main_category::class);
    }


    /**
     * Create the relation for Product and User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
