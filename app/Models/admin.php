<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;

class admin extends Model
{
    use HasFactory;
    public function hasEntry($username) {
        return DB::table('users') ->where('username', $username) ->exists();
    }

    public function authenticate($username, $password) {
        $userdata = $this->getEntry($username);
        if((strcasecmp($username, $userdata->username) == 0) && Hash::check($password, $userdata->password)){
            return true;
        }

        return false;
    }

    public function getEntry($username) {
        return DB::table('users') ->where('username', $username) ->first();
    }
}
