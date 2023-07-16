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

    public function insertBerita($judul, $isi, $penulis) {
        return DB::table('beritas')->insertGetId([
            'judul' => $judul,
            'isi' => $isi,
            'penulis' => $penulis,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function updateBerita($id, $judul, $isi) {
        DB::table('beritas')->where('id', $id)->update([
            'judul' => $judul,
            'isi' => $isi,
            'updated_at' => now()
        ]);
    }

    public function deleteBerita($id) {
        DB::table('beritas')->where('id', $id)->delete();
    }
}
