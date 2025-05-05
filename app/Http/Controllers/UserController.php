<?php 

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\AssetCategoriesModel;
use App\Models\AssetModel;
use App\Models\AssetImageModel;

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

    public function assetImage(Request $request) {
        $assetImages = AssetImageModel::where('asset_id', $request->id)->get();
        $asset = AssetModel::find($request->id);

        return view('pages.asset-image', compact('assetImages', 'asset'));
    }

    public function assetImageSubmit(Request $request) {
        $image = $request->file('image');
        $fileName = $image->store('uploads', 'public');
        $fileName = str_replace('uploads/', '', $fileName);

        $assetImage = new AssetImageModel();
        $assetImage->asset_id = $request->id;
        $assetImage->image = $fileName;
        $assetImage->save();

        return redirect()->route('asset-image', ['id' => $request->id]);
    }

    public function setMainImage(Request $request) {
        $assetImage = AssetImageModel::find($request->id);
        AssetImageModel::where('asset_id', $assetImage->asset_id)->update(['is_main' => 0]);

        $assetImage = AssetImageModel::find($request->id);
        $assetImage->is_main = 1;
        $assetImage->save();

        return redirect()->route('asset-image', ['id' => $assetImage->asset_id]);
    }

    public function deleteImage(Request $request) {
        $assetImage = AssetImageModel::find($request->id);
        $imageName = $assetImage->image;
        $assetImage->delete();

        unlink(storage_path('app/public/uploads/'.$imageName));

        return redirect()->route('asset-image', ['id' => $assetImage->asset_id]);
    }


    public function editProfile() {
        $userId = session()->get('user')->id;
        $user = UserModel::find($userId);

        return view('pages.edit-profile', compact('user'));
    }

    public function editProfileSubmit(Request $request) {
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('edit-profile');
        }

        $user = session()->get('user');
        $oldUser = UserModel::find($user->id);
        $oldUser->name = $request->name;
        $oldUser->email = $request->email;
        $oldUser->password = $request->password ?? $oldUser->password;
        $oldUser->save();

        return view('pages.edit-profile-success');
    }

    public function list() {
        $users = UserModel::all();
        return view('backoffice.user.list', compact('users'));
    }

    public function delete(Request $request) {
        $user = UserModel::find($request->id);
        $user->status = 'inactive';
        $user->save();

        return redirect()->route('backoffice-user-list');
    }

    public function active(Request $request) {
        $user = UserModel::find($request->id);
        $user->status = 'active';
        $user->save();

        return redirect()->route('backoffice-user-list');
    }

}


