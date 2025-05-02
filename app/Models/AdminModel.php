<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model {
    protected $table = 'tb_admins';
    protected $filable = ['name', 'username', 'password', 'level'];

    public function getLevelName() {
        if ($this->level == 'admin') {
            return 'ผู้ดูแลระบบ';
        } else {
            return 'ผู้ใช้งาน';
        }
    }
}