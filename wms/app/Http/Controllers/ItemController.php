<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use App\Models\Room;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index() {
        $items      = Item::where('condition',1)->first()->paginate(12);
        $itemTypes  = ItemType::all();
        $rooms      = Room::all();
        $suppliers  = Suppliers::all();
        return view('warehouse',["items" => $items, "itemTypes" => $itemTypes, "rooms" => $rooms,"suppliers" => $suppliers]);
    }

    public function get_by_condition($condition) {
        $items = Item::where('condition',$condition)->get();
        $itemTypes = ItemType::all();
        $rooms = Room::all();
        $suppliers = Suppliers::all();
        return view('warehouse',["items" => $items, "itemTypes" => $itemTypes, "rooms" => $rooms,"suppliers" => $suppliers]);
    }

    public function live_search($id,Request $request) {
        $items = Item::with('itemType','room')->where('name', 'like', '%'.$request->q.'%')->where('condition',$id)->get();
        return $items;
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
            "supplier_id" => $request->item_supplier,
        ]);

        return redirect('items/condition/'.$request->condition)->with('success', "Data Berhasil Ditambahkan");
    }

    public function delete(Request $request) {
        $item = Item::find($request->item_id);
        $condition = $item->condition;
        $isDelete = $item->delete();

        if($isDelete) {
            return redirect('items/condition/'.$condition)->with('success', "Data Berhasil Dihapus");
        } else {
            return redirect('items/condition/'.$condition)->with('failed', "Data Gagal Dihapus");
        }
    }

    public function editCondition(Request $request) {

        $item = Item::find($request->item_id);

        $edit = $item->update([
            'condition' => 2
        ]);
        if($edit) {
            return redirect('items/condition/2')->with('success', "Data Berhasil Diubah");
        } else {
            return redirect('items/condition/1')->with('failed', "Data Gagal Diubah");
        }
    }

    public function edit($id) {
        $item = Item::where('item_code',$id)->first();
        $itemTypes = ItemType::all();
        $suppliers = Suppliers::all();
        $rooms = Room::all();
        return view('items.edit',['item'=>$item,'itemTypes' => $itemTypes,'suppliers' => $suppliers,'rooms' => $rooms]);
    } 

    public function update(Request $request, $item_code) {
        $item = Item::find($item_code);
        $request->validate([
            'name' => 'required',
            'exp_date' => 'required',
            'type_item' => 'required',
            'room' => 'required'
        ]);
        $item->name = $request->name;
        $item->exp_date = $request->exp_date;
        $item->room_id = $request->room;
        $item->supplier_id = $request->item_supplier;
        $item->type_item_id = $request->type_item;

        if($item->condition == 2) {
            $item->condition = $request->condition;
        } 

        if($item->save()) {
            return redirect('/items/condition/'.$item->condition)->with('success', "Data Berhasil Diubah");
        } else {
            return redirect('/items/condition/'.$item->condition)->with('failed', "Data Gagal Diubah");
        }
    }
}
