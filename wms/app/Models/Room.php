<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['room_code','name','type_room_id'];
    public $timestamps = false;

    public function items() {
        return $this->hasMany(Item::class,'room_id','room_code');
    } 
    public function roomType() {
        return $this->belongsTo(RoomType::class,'type_room_id');
    }
    public function itemTypes() {
        return $this->belongsToMany(ItemType::class,'item_room_types','room_code','item_type_id','room_code','id')->withPivot(['capacity']);
        // return $this->belongsToMany(ItemType::class,'item_room_types','room_code','item_type_id')->withPivot(['capacity']);
    }
}


