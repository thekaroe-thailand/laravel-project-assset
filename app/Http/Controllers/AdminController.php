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

        if (!Hash::check($password, $admin->password)) {
            return redirect()->route('backoffice-signin')
                ->withErrors('wrong password');
        }

        $dataForSession = [
            'id' => $admin->id,
            'name' => $admin->name,
            'level' => $admin->level
        ];

        session(['admin' => $dataForSession]);

        return redirect()->route('backoffice-dashboard');
    }

    public function dashboard() {
        return view('backoffice.home');
    }

    public function signout() {
        session()->forget('admin');
        return redirect()->route('backoffice-signin');
    }

    public function editProfile() {
        $adminId = session('admin')['id'];
        $admin = AdminModel::find($adminId);

        return view('backoffice.edit-profile', compact('admin'));
    }

    public function editProfileSubmit(Request $request) {
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('backoffice-edit-profile')
                ->withErrors('password not match');
        }

        $adminId = session('admin')['id'];
        $admin = AdminModel::find($adminId);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password) ?? $admin->password;
        $admin->save();

        return redirect()->route('backoffice-edit-profile')
            ->with('success', 'Profile updated successully');
    }

    public function list() {
        $admins = AdminModel::all();

        return view('backoffice.list', compact('admins'));
    }

    public function addAdmin() {
        return view('backoffice.add-admin');
    }

    public function addAdminSubmit(Request $request) {
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('backoffice-add-admin')
                ->withErrors('password not match');
        }

        $admin = new AdminModel();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->level = $request->role;
        $admin->save();

        return redirect()->route('backoffice-list')->with('success', 'Admin added successfully');
    }

    public function deleteAdmin($id) {
        $admin = AdminModel::find($id);
        $admin->delete();

        return redirect()->route('backoffice-list');
    }

    public function editAdmin($id) {
        $admin = AdminModel::find($id);
        return view('backoffice.add-admin', compact('admin'));
    }

    public function editAdminSubmit(Request $request, $id) {
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('backoffice-add-admin')
                ->withErrors('password not match');
        }

        $admin = AdminModel::find($id);
        $admin->name = $request->name;
        $admin->username = $request->username;

        if (!empty($request->password)) {
            $admin->password = Hash::make($request->password);
        }

        $admin->level = $request->role;
        $admin->save();

        return redirect()->route('backoffice-list')->with('success', 'Admin updated successfully');
    }

}



















