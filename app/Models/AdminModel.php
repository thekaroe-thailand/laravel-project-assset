<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model {
    protected $table = 'tb_admins';
    protected $filable = ['name', 'username', 'password', 'level'];
}