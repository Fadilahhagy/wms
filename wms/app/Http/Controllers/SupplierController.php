<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

//
class SupplierController extends Controller
{
    public function index(Request $request){

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
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                Rule::unique('suppliers'),
                'email',
                'string',
                'max:255'
            ],
            'address' => 'required|string',
            'phone' => [
                'required',
                'regex:/^08[0-9]{9,12}$/',
                'numeric'
            ],
        ],[
            'email.unique' => 'Email sudah digunakan.',
            'phone.regex' => 'Format no telp salah.'
        ]);

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

    public function update(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|min:8',
            'address' => 'required|min:8',
            'phone' => 'required|min:10'
        ]);
    }

    public function delete(Request $request){
        $supplier = Suppliers::where('id',$request->id);
        $isDelete = $supplier->delete();

        if($isDelete){
            return redirect('supplier')->with('success', "Data Berhasil Dihapus");
        } else{
            return redirect('supplier')->with('success', "Data Gagal Dihapus");
        }
    }
    public function search(Request $request){
        $suppliers = Suppliers::where([
            ['name', '!=', null],
            [function ($query) use ($request) {
                if(($qword = $request->search)){
                    $query->orWhere('name', 'LIKE', '%' . $qword . '%')
                            ->orWhere('alamat', 'LIKE', '%' . $qword . '%')
                            ->orWhere('email', 'LIKE', '%' . $qword . '%')
                            ->orWhere('phone', 'LIKE', '%' . $qword . '%')
                            ->get();
                }
            }]
        ])->paginate(10);

        return view('search.supplier_search', compact('suppliers'));
    }
    
}