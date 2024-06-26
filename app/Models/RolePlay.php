<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePlay extends Model
{
    use HasFactory;
    protected $appends = ['characters'];
    protected $fillable = ['user_id', 'name', 'slug'];

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
    //return the GM of the rolePlay
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Return all players in the rolePlay
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
