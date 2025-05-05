<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model {
    protected $table = 'tb_users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    public function getStatusName() {
        return $this->status == 'active' ? 'ใช้งาน' : 'ระงับการใช้งาน';
    }
}

