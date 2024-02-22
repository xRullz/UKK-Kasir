<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CrudUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('CrudUser.index', compact('users'));
    }

    public function create()
    {
        return view('CrudUser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/CrudUser')->with('status', 'User successfully added');
    }

    public function edit($id)
    {
        $CrudUser = User::find($id);
        return view('CrudUser.edit', compact('CrudUser'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $CrudUser = User::find($id);
        $CrudUser->name = $request ->name;
        $CrudUser->email = $request->email;
        $CrudUser->password = Hash::make($request->password);

        $CrudUser->update();
        return redirect('/CrudUser');
    }

    public function destroy($id)
    {
        $CrudUser = User::find($id);
        $CrudUser->delete();
        return redirect('/CrudUser');
    }
}
