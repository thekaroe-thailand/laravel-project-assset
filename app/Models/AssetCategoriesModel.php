<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetCategoriesModel extends Model {
    protected $table = 'tb_asset_categories';
    protected $fillable = [
        'name',
        'description'
    ];
}