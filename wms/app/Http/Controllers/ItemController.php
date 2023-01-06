<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index() {
        $items = Item::where('condition',1)->get();
        $itemTypes = ItemType::all();
        $rooms = Room::all();
        return view('warehouse',["items" => $items, "itemTypes" => $itemTypes, "rooms" => $rooms]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'exp_date' => 'required',
            'type_item' => 'required',
            'room' => 'required'
        ]);

        Item::create([
            "item_code" => Str::random(10),
            "name" => $request->name,
            "exp_date" => $request->exp_date,
            "condition" => $request->condition,
            "room_id" => $request->room,
            "type_item_id" => $request->type_item,
            "supplier_id" => 1
        ]);

        return redirect('items')->with('success', "Data Berhasil Ditambahkan");
    }

    public function delete(Request $request) {
        $item = Item::where('item_code',$request->item_id);
        $isDelete = $item->delete();

        if($isDelete) {
            return redirect('items')->with('success', "Data Berhasil Dihapus");
        } else {
            return redirect('items')->with('success', "Data Gagal Dihapus");
        }
    }

    public function editCondition(Request $request) {

        $item = Item::where('item_code',$request->item_id)->first();
        $item->condition = 2;

        $edit = $item->update([
            'condition' => 2
        ]);
        if($edit) {
            return redirect('items')->with('success', "Data Berhasil Diubah");
        } else {
            return redirect('items')->with('success', "Data Gagal Diubah");
        }
    }
}
