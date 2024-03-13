<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        return view("admin.pages.user.index", [
            'users' => User::all(),
        ]);
    }


    public function create()
    {
        // Kode untuk menampilkan halaman form pembuatan
    }

    public function store(Request $request)
    {
        // Kode untuk menyimpan data dari form pembuatan
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'nis_nip' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        User::create($validatedData);

        return redirect()->back()->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        // Kode untuk menampilkan detail data
        // return view('admin.pages.users.show', [
        //     // 'users' => $user,
        // ]);
    }

    public function edit($id)
    {
        // Kode untuk menampilkan halaman form pengeditan
    }

    public function update(Request $request, $id)
    {
        // Kode untuk menyimpan data dari form pengeditan
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'nis_nip' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id)->update($validatedData);

        return redirect()->back()->with('success', 'user berhasil diedit!');
    }

    public function destroy($id)
    {
        // Kode untuk menghapus data
        $user = User::find($id)->delete();
        return redirect()->back()->with('success', 'user berhasil di hapus!');
    }
}
