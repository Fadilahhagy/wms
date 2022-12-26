<?php

namespace App\Http\Controllers;

use App\Models\SupplierModels;
use Illuminate\Http\Request;

//
class SupplierController extends Controller
{
    public function index(){
        //get data supplier dari model Supplier
        $suppliers = SupplierModels::latest()->paginate(10);

        //menampilkan data supplier ke halaman yang dituju
        return view('supplier', compact('suppliers'));

    }

    public function create()
    {
        return view('supplier');
    }

    public function store(Request $request){
        //untuk validasi
        $this->validate($request, [
            'name'      => 'required|min:5',
            'email'     => 'required|min:10',
            'address'   => 'required|min:10',
            'phone'     => 'required|min:11'
        ]);
        
        //create
        SupplierModels::store([
            'name'      => $request->name,
            'email'     => $request->email,
            'address'   => $request->address,
            'phone'    => $request->phone
        ]);

        //redirect ke halaman jika data berhasil disimpan
        return redirect()->route('supplier')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}