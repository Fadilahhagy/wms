<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        $items = Item::where('condition',2)->get();
        return view('report_item',['items' => $items]);
    }

}
