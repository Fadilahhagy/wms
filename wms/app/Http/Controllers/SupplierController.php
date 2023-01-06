<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

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
        
        // //create
        // SupplierModels::store([
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'address'   => $request->address,
        //     'phone'    => $request->phone
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

    public function edit(Request $request){
        $data = Suppliers::findOrFail($request->get('id'));
        return response()->json($data);
    }

    public function update(Request $request, Supplier $supplier){
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|min:8',
            'address' => 'required|min:8',
            'phone' => 'required|min:10'
        ]);
    }
}