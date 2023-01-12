<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all()->first()->paginate(12);
        return view('users.index',['users'=>$users]);
    }

    public function update(Request $request) {
        $user = User::find($request->user_id);
        $user->is_active = 1;
        $isUpdated = $user->save();

        if($isUpdated) {
            return redirect('users')->with('success', "Data pengguna berhasil diaktifkan");
        } else {
            return redirect('users')->with('success', "Data pengguna gagal diaktifkan");
        }
    }
    
    public function destroy(Request $request) {
        $user = User::find($request->user_id);
        $isDeleted = $user->delete();

        if($isDeleted) {
            return redirect('users')->with('success', "Data Berhasil Dihapus");
        } else {
            return redirect('users')->with('success', "Data Gagal Dihapus");
        }
    }

}
