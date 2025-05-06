<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryUser extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'verification_code', 'created_at'];
    public $timestamps = false;
}
