<?php 

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\AssetCategoriesModel;
use App\Models\AssetModel;

class UserController extends Controller {
    public function register(Request $request) {
        $user = new UserModel();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('login');
    }

    public function login(Request $request) {
        $user = UserModel::select('id', 'name')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            $request->session()->put('user', $user);
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        return redirect()->route('home');
    }

    public function post() {
        $assetCategories = AssetCategoriesModel::orderBy('name')->get();
        return view('pages.post', compact('assetCategories'));
    }

    public function postSubmit(Request $request) {
        $assetModel = new AssetModel();
        $assetModel->asset_categories_id = $request->asset_categories_id;
        $assetModel->name = $request->name;
        $assetModel->price = $request->price;
        $assetModel->detail = $request->detail;
        $assetModel->contact = $request->contact;
        $assetModel->user_id = $request->session()->get('user')->id;
        $assetModel->save();

        return redirect()->route('home');
    }

    public function myPost() {
        $assets = AssetModel::orderBy('id', 'desc')->get();
        return view('pages.my-post', compact('assets'));
    }

    public function saleAsset(Request $request) {
        $asset = AssetModel::find($request->id);
        $asset->status = 'sale';
        $asset->save();

        return redirect()->route('my-post');
    }

    public function normalAsset(Request $request) {
        $asset = AssetModel::find($request->id);
        $asset->status = 'normal';
        $asset->save();

        return redirect()->route('my-post');
    }

    public function cancelAsset(Request $request) {
        $asset = AssetModel::find($request->id);
        $asset->status = 'cancel';
        $asset->save();

        return redirect()->route('my-post');
    }

}


