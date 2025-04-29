<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetViewModel extends Model {
    protected $table = 'tb_asset_views';
    protected $fillable = ['asset_id', 'ip_address', 'user_agent'];

    public function assetImage() {
        $asset = AssetModel::find($this->asset_id);
        return $asset->assetImage();
    }

    public function asset() {
        return $this->belongsTo(AssetModel::class, 'asset_id');
    }
}