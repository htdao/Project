<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class UserInfo extends Model
{

    protected $table = 'users_info';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
