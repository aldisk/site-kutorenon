<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class berita extends Model
{
    use HasFactory;

    public function getBeritasByID($id) {
        return DB::table('beritas')->where('id', $id)->get(); 
    }

    public function getBeritasByPenulis($penulis) {
        return DB::table('beritas')->where('penulis', $penulis)->get(); 
    }

    public function getAll() {
        return DB::table('beritas')->get();
    }
}
