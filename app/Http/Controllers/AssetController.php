<?php

namespace App\Http\Controllers;

use App\Models\AssetModel;

class AssetController extends Controller {
    public function index() {
        $assets = AssetModel::where('status', 'normal')
            ->orderBy('id', 'desc')
            ->get();

        return view('backoffice.asset.list', compact('assets'));
    }

    public function delete($id) {
        $asset = AssetModel::find($id);
        $asset->status = 'cancel';
        $asset->save();

        return redirect()->route('backoffice-asset-list');
    }

    public function info($id) {
        $asset = AssetModel::find($id);
        return view('backoffice.asset.info', compact('asset'));
    }
}