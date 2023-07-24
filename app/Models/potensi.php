<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class potensi extends Model
{
    use HasFactory;

    public function getPotensiByID($id) {
        return DB::table('potensis')->where('id', $id)->first(); 
    }

    public function getPagedPotensis($searchToken, $page){
        $epp = 6;

        $start = $epp * ($page-1);

        $count = DB::table('potensis') ->where('nama', 'like' , '%'.$searchToken.'%') -> count();
        $searcQuery = DB::table('potensis') ->where('nama', 'like' , '%'.$searchToken.'%')-> orderBy('id', 'desc') ->get();

        $searcQuery = $searcQuery->slice($start, $epp);
        $maxPage = ceil($count / $epp);

        if($maxPage == 0) {$maxPage = 1;}

        return ["searchResult" => $searcQuery, "maxPage" => $maxPage];
    }

    public function IDExist($id) {
        return DB::table('potensis')->where('id', $id) ->exists();
    }

    public function nameExist($slug) {
        return DB::table('potensis')->where('slug', $slug) ->exists();
    }

    public function getAll() {
        return DB::table('potensis')->get();
    }

    public function insertPotensi($nama, $isi, $slug) {
        return DB::table('potensis')->insertGetId([
            'nama' => $nama,
            'isi' => $isi,
            'slug' => $slug,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function updatePotensi($id, $nama, $isi, $slug) {
        DB::table('potensis')->where('id', $id)->update([
            'nama' => $nama,
            'isi' => $isi,
            'slug' => $slug,
            'updated_at' => now()
        ]);
    }

    public function deletePotensi($id) {
        DB::table('potensis')->where('id', $id)->delete();
    }
}
