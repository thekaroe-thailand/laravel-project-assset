<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AssetCategoriesModel;

class AssetModel extends Model {
    protected $table = 'tb_assets';
    protected $fillable = [
        'asset_categories_id',
        'name',
        'price',
        'detail',
        'contact',
        'status',
        'user_id'
    ];

    public $timestamps = false;

    public function assetCategories() {
        return $this->belongsTo(AssetCategoriesModel::class, 'asset_categories_id');
    }

    public function statusText() {
        if ($this->status == 'normal') {
            return 'ปกติ';
        } elseif ($this->status == 'sale') {
            return 'ขายแล้ว';
        } elseif ($this->status == 'cancel') {
            return 'ยกเลิก';
        }
    }

    public function assetImage() {
        $assetImage = AssetImageModel::where('asset_id', $this->id)
            ->where('is_main', 1)
            ->first();

        return $assetImage ?? null;
    }

    public function user() {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function images() {
        return $this->hasMany(AssetImageModel::class, 'asset_id', 'id');
    }

    public function countViews() {
        return AssetViewModel::where('asset_id', $this->id)->count();
    }
}