<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetModel;

class HomeController extends Controller {
    public function index() {
        $assets = AssetModel::where('status', 'normal')
            ->orderBy('id', 'desc')
            ->get();
        
        return view('home', compact('assets'));
    }

    public function search(Request $request) {
        $search = $request->search;
        $assets = AssetModel::where('status', 'normal')
            ->where('name', 'like', '%'.$search.'%')
            ->get();

        return view('home', compact('assets', 'search'));
    }

    public function detail($id) {
        $asset = AssetModel::find($id);
        return view('pages.detail', compact('asset'));
    }
}