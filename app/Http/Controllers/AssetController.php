<?php

namespace App\Http\Controllers;

use App\Models\AssetModel;
use App\Models\AssetViewModel;
use Illuminate\Support\Facades\DB;

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

    public function popular() {
        $countCondition = DB::raw('COUNT(*) as count_views');
        $assets = AssetViewModel::select('asset_id', $countCondition)
            ->groupBy('asset_id')
            ->orderBy('count_views', 'desc')
            ->get();
        
        return view('backoffice.asset.popular', compact('assets'));
    }
}