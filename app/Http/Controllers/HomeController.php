<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetModel;
use App\Models\AssetViewModel;
use Illuminate\Support\Facades\DB;
use App\Models\AssetCategoriesModel;

class HomeController extends Controller {
    public function index() {
        $assets = AssetModel::where('status', 'normal')
            ->orderBy('id', 'desc')
            ->get();
        
        return view('home', compact('assets'));
    }

    public function search(Request $request) {
        $priceOrder = $request->price_order;
        $search = $request->search;
        $assets = AssetModel::where('status', 'normal')
            ->where('name', 'like', '%'.$search.'%');

        if ($priceOrder != "") {
            if ($priceOrder == "min-to-max") {
                $assets = $assets->orderBy('price', 'asc');
            } else {
                $assets = $assets->orderBy('price', 'desc');
            }
        } else {
            $assets = $assets->orderBy('id', 'desc');
        }
        
        $assets = $assets->get();

        return view('home', compact('assets', 'search'));
    }

    public function detail($id) {
        $asset = AssetModel::find($id);

        $view = AssetViewModel::where('asset_id', $id)
            ->where('ip_address', request()->ip())
            ->first();

        if (!$view) {
            $view = new AssetViewModel();
            $view->asset_id = $id;
            $view->ip_address = request()->ip();
            $view->user_agent = request()->userAgent();
            $view->save();
        }

        return view('pages.detail', compact('asset'));
    }

    public function popular() {
        $countCondition = DB::raw('COUNT(*) as count_views');
        $assets = AssetViewModel::select('asset_id', $countCondition)
            ->groupBy('asset_id')
            ->orderBy('count_views', 'desc')
            ->get();
        
        return view('pages.popular', compact('assets'));
    }

    public function assetInCategories($id) {
        $assets = AssetModel::where('asset_categories_id', $id)
            ->orderBy('id', 'desc')
            ->get();

        $category = AssetCategoriesModel::find($id);
        
        return view('pages.asset-in-categories', compact('assets', 'category'));
    }
    
}