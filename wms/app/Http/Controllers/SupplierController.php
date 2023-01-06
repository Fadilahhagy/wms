<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

//
class SupplierController extends Controller
{
    public function index(){
        //get data supplier dari model Supplier
        $suppliers = Suppliers::first()->paginate(10);

        //menampilkan data supplier ke halaman yang dituju
        return view('supplier', ['suppliers' => $suppliers]);

    }

    public function create()
    {
        return view('supplier');
    }

    public function store(Request $request){
        // //untuk validasi
        // $this->validate($request, [
        //     'name'      => 'required|min:5',
        //     'email'     => 'required|min:10',
        //     'address'   => 'required|min:10',
        //     'phone'     => 'required|min:11'
        // ]);
        
        $create = new Suppliers;
        $create->name = $request['name'];
        $create->email = $request['email'];
        $create->address = $request['address'];
        $create->phone = $request['phone'];
        $create->save();

        //kembali ke halaman jika data berhasil disimpan
        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }
}