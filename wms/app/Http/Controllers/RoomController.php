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
        $rooms = Room::all()->first()->paginate(12);
        $roomTypes = RoomType::all();
        $itemTypes = ItemType::all();
        return view('room.room',['rooms' => $rooms,'room_types' => $roomTypes,'item_types' => $itemTypes]);
    }
    
    public function show($id,$condition) {
        $room = Room::with('itemTypes')->where('room_code',$id)->first();
        $items = $room->items->where('condition',$condition);
        return view('room.detail_ruangan',['room' =>$room,'items'=>$items]);
    }

    public function live_search(Request $request) {
        $rooms = Room::with('roomType')->where('name', 'like', '%'.$request->q.'%')->get();
        return $rooms;
    }

    public function store(Request $request) {
        // $request->validate([
        //     'room_code' => 'required',
        //     'name' => 'required',
        //     'room_type' => 'required',
        //     'item_room_types' => 'array',
        //     'item_room_types.*.id' => 'required',
        //     'item_room_types.*.capacity' => 'required|numeric|min:1',
        // ]);

        $request->validate(['room_code' => 'required',            
        'name' => 'required',
        'room_type' => 'required',
        'item_room_types' => 'array',
        'item_room_types.*.id' => 'required',
        'item_room_types.*.capacity' => 'required|numeric|min:1',
        ],[
            'item_room_types.*.capacity.min' => 'Kapasitas tidak boleh kurang dari 1.'
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

    public function edit($id) {
        $room = Room::where('room_code',$id)->first();
        $roomTypes = RoomType::all();
        $itemTypes = ItemType::all();
        // return response()->json($room->itemTypes);
        return view('room.edit',['room' => $room,'room_types' => $roomTypes,'item_types' => $itemTypes]);
    }

    public function update(Request $request, $id)
    {
        // Find the room to be updated
        $room = Room::find($id);
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'room_type' => 'required|exists:room_types,id',
            'item_room_types.*.id' => 'required|exists:item_types,id',
            'item_room_types.*.capacity' => 'required|numeric|min:1',
        ],[
            'item_room_types.*.capacity.min' => 'Kapasitas tidak boleh kurang dari 1.',
            'name.required' => 'Field nama tidak boleh kosong',
        ]);

        // Update the room's details
        $room->room_code = $id;
        $room->name = $request->name;
        $room->type_room_id = $request->room_type;
        $room->save();
        // Detach the current capacity of room
        $room->itemTypes()->detach();
        
        // Attach the new capacity of the room
        $itemTypes = $request->item_room_types;
        foreach ($itemTypes as $item) {
            $room->itemTypes()->attach($item['id'], ['capacity' => $item['capacity'],"room_code" => $room->room_code]);

        }

        // redirect the user back to the view
        return redirect('room')->with('success', 'Ruangan berhasil diperbarui.');
    }
}
