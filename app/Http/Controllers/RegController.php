<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;

class RegController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(Request $request)
    {
        $role = Roles::where('name', 'Użytkownik')->first();

        $user = new \App\User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->save();
        $user->roles()->attach($role);

        return redirect()->route('login');
    }
}
