<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class lembaga extends Model
{
    use HasFactory;

    public function getLembagaByID($id) {
        return DB::table('lembagas')->where('id', $id)->first(); 
    }

    public function getPagedLembagas($searchToken, $page){
        $epp = 6;

        $start = $epp * ($page-1);

        $count = DB::table('lembagas') ->where('nama', 'like' , '%'.$searchToken.'%') -> count();
        $searcQuery = DB::table('lembagas') ->where('nama', 'like' , '%'.$searchToken.'%')->get();

        $searcQuery = $searcQuery->slice($start, $epp);
        $maxPage = ceil($count / $epp);

        if($maxPage == 0) {$maxPage = 1;}

        return ["searchResult" => $searcQuery, "maxPage" => $maxPage];
    }

    public function IDExist($id) {
        return DB::table('lembagas')->where('id', $id)->exists();
    }

    public function getAll() {
        return DB::table('lembagas')->get();
    }

    public function getCount() {
        return DB::table('lembagas') -> count();
    }

    public function insertLembaga($nama, $id, $isi) {
        return DB::table('lembagas')->insertGetId([
            'nama' => $nama,
            'isi' => $isi,
            'id' => $id
        ]);
    }

    public function updateLembaga($id, $isi) {
        DB::table('lembagas')->where('id', $id)->update([
            'isi' => $isi,
        ]);
    }

    public function deleteLembaga($id) {
        DB::table('lembagas')->where('id', $id)->delete();
    }
}
