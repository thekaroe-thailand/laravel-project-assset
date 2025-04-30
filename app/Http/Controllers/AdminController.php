<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    public function index() {
        return view('backoffice.signin');
    }

    public function signin(Request $request) {
        $username = $request->username;
        $password = $request->password;

        $admin = AdminModel::select('id', 'name', 'level', 'password')
            ->where('username', $username)
            ->first();

        if (!$admin) {
            return redirect()->route('backoffice-signin')
                ->withErrors('user not found');
        }
        if (!Hash::check($password, $admin->passowrd)) {
            return redirect()->route('backoffice-signin')
                ->withErrors('wrong password');
        }

        $dataForSession = [
            'id' => $admin->id,
            'name' => $admin->name,
            'level' => $admin->level
        ];

        session(['admin' => $dataForSession]);

        return redirect()->route('backoffice.dashboard');
    }
}