<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function statusText() {
        if ($this->status == 'normal') {
            return 'ปกติ';
        } elseif ($this->status == 'sale') {
            return 'ขายแล้ว';
        } elseif ($this->status == 'cancel') {
            return 'ยกเลิก';
        }
    }
}