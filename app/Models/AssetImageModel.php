<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class AssetImageModel extends Model {
    protected $table = 'tb_asset_images';
    protected $fillable = ['asset_id', 'image', 'is_main'];
}