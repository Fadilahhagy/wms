<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;
    protected $table = 'item_types';
    public function rooms() {
        return $this->belongsToMany(Room::class,'item_room_types','room_code','item_type_id')->withPivot(['capacity']);
    }

    public function items() {
        return $this->hasMany(Item::class,'type_item_id','id');
    }
}
