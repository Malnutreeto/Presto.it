<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    /**
     * Create the relation for Category and Sub_category
     */
    public function subCategories()
    {
        return $this->belongsToMany(Sub_category::class);
    }
}
