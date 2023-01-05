<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::all();
        return view('room',['rooms' => $rooms]);
    }
    
    public function roomDetail($id) {
        $room = Room::where('room_code',$id)->get();
        return view('detail_ruangan',['room' =>$room]);
    }
}
