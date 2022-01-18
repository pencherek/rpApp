<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $fillable = ['role_play_id', 'name', 'stats'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function inventories()
    {
        return $this->belongsToMany(Inventory::class);
    }

    public function rolePlay()
    {
        return $this->belongsTo(RolePlay::class);
    }

    public function itemInventories()
    {
        return $this->hasManyThrough(ItemInventory::class,Inventory::class);
    }

    public static function boot()
    {
        parent::boot();

        Character::deleting(function($character)
        {
            $character->users()->detach();
            $character->inventories()->detach();
        });
    }
}
