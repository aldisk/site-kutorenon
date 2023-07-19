<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class anggaran extends Model
{
    use HasFactory;

    public function insertDokumen($nama) {
        return DB::table('anggarans')->insertGetId([
            'nama' => $nama,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function getAll() {
        return DB::table('anggarans')->get();
    }

    public function getDokumenByID($id) {
        return DB::table('anggarans')->where('id', $id)->first();
    }

    public function getPagedDokumens($searchToken, $page) {
        $epp = 6;

        $start = $epp * ($page-1);

        $count = DB::table('anggarans') ->where('nama', 'like' , '%'.$searchToken.'%') -> count();
        $searcQuery = DB::table('anggarans') ->where('nama', 'like' , '%'.$searchToken.'%')-> orderBy('id', 'desc') ->get();

        $searcQuery = $searcQuery->slice($start, $epp);
        $maxPage = ceil($count / $epp);

        if($maxPage == 0) {$maxPage = 1;}

        return ["searchResult" => $searcQuery, "maxPage" => $maxPage];
    }

    public function updateDokumen($id, $nama) {
        DB::table('anggarans')->where('id', $id)->update([
            'nama' => $nama
        ]);
    }

    public function deleteDokumen($id) {
        DB::table('anggarans')->where('id', $id)->delete();
    }

    public function IDExist($id) {
        return DB::table('anggarans')->where('id', $id)->exists();
    }
}
