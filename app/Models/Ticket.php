<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'body', 'state', 'user_id'];

    /**
     * Create the relation for Product and User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
