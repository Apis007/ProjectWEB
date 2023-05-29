<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index()
    {
        $users = DataUser::all();
        return view('pages.datatables', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
    $request->validate([
    'username' => 'required|max:255',
    'password' => 'required|max:255',
    'no_hp' => 'required|max:255',
    'email' => 'required|email|unique:user|max:255',
    'alamat' => 'required|max:255',
    'role' => 'required|max:255',
    ]);

        DataUser::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = DataUser::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id_user)
    {
        $user = DataUser::findOrFail($id_user);
        return view('pages.edit', compact('user'));
    }


    public function update(Request $request, $id_user)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'no_hp' => 'nullable',
        ]);

        // Update data user
        $user = DataUser::find($id_user);
        $user->username = $validatedData['username'];
        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->no_hp = $validatedData['no_hp'];
        $user->email = $validatedData['email'];
        $user->alamat = $validatedData['alamat'];
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id_user)
    {
        // Cari user dengan id_user yang sesuai
        $user = DataUser::find($id_user);

        // Hapus user
        $user->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }


    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $response = DataUser::login($email, $password);

        return response()->json(['server_response' => $response]);
    }
}
