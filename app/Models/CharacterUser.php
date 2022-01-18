<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterUser extends Model
{
    use HasFactory;
    protected $fillable = ['character_id', 'user_id'];
}
