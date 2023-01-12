<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Report;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function indexItems() {
        $items = Item::where('condition',2)->get();
        return view('report_item',['items' => $items]);
    }

    public function index() {
        $reports = Report::all();
        return view('report_list',['reports' => $reports]);
    }

    public function store(Request $request) {
        $request->validate([
            'description' => 'required',
        ],[
            'description.required' => "Field description tidak boleh kosong"
        ]);
        Report::create([
            'description' => $request->description,
            'item_code' => $request->item_code,
            'is_accepted' => 0
        ]);
        return redirect('report-item')->with('success', "Barang berhasil dilaporkan");
    }

    public function accept_report(Request $request) {
        $report = Report::find($request->report_id);
        $report->is_accepted = 1;
        if($report->save()) {
            return redirect('report-data')->with('success', "Barang berhasil dilaporkan");
        } else {
            return redirect('report-data')->with('success', "Barang gagal dilaporkan");

        }
    }

    public function decline_report(Request $request) {
        $report = Report::find($request->report_id);
        $report->is_accepted = 2;
        if($report->save()) {
            return redirect('report-data')->with('success', "Laporan Berhasil ditolak");
        } else {
            return redirect('report-data')->with('success', "Gagal menindak laporan");

        }
    }

}
