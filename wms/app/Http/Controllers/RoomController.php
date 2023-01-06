<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::all();
        $roomTypes = RoomType::all();
        $itemTypes = ItemType::all();
        return view('room',['rooms' => $rooms,'room_types' => $roomTypes,'item_types' => $itemTypes]);
    }
    
    public function show($id) {
        $room = Room::with('itemTypes')->where('room_code',$id)->first();
        return view('detail_ruangan',['room' =>$room]);
    }

    public function store(Request $request) {
        $request->validate([
            'room_code' => 'required',
            'name' => 'required',
            'room_type' => 'required',
            'item_room_types' => 'array',
            'item_room_types.*.id' => 'required',
            'item_room_types.*.capacity' => 'required',
        ]);

        $room = Room::create([
            "room_code" => $request->room_code,
            "name" => $request->name,
            "type_room_id" => $request->room_type,
        ]);

        $itemRoomTypes = $request->item_room_types;
        if ($itemRoomTypes) {
            foreach ($itemRoomTypes as $itemTypeData) {
                $room->itemTypes()->attach($itemTypeData['id'], ['capacity' => $itemTypeData['capacity'],"room_code" => $room->room_code]);
            }
        }

        return redirect('room')->with('success', "Data Berhasil Ditambahkan");
    }
}
