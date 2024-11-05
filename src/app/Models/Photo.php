<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'user_id']; // Upewnij się, że user_id jest tutaj
    public function user()
    {
        return $this->belongsTo(User::class); // Zakładając, że masz model User w App\Models\User
    }
}
