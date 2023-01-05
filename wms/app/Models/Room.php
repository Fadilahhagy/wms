<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function items() {
        return $this->hasMany(Item::class);
    } 
    public function roomType() {
        return $this->belongsTo(RoomType::class,'type_room_id');
    }
}
