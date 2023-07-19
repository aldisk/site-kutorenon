<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class dokumen extends Model
{
    use HasFactory;

    public function insertDokumen($nama, $slug) {
        return DB::table('dokumens')->insertGetId([
            'nama' => $nama,
            'slug' => $slug,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function getAll() {
        return DB::table('dokumens')->get();
    }

    public function getDokumenByID($id) {
        return DB::table('dokumens')->where('id', $id)->first();
    }

    public function getPagedDokumens($searchToken, $page) {
        $epp = 6;

        $start = $epp * ($page-1);

        $count = DB::table('dokumens') ->where('nama', 'like' , '%'.$searchToken.'%') -> count();
        $searcQuery = DB::table('dokumens') ->where('nama', 'like' , '%'.$searchToken.'%')-> orderBy('id', 'desc') ->get();

        $searcQuery = $searcQuery->slice($start, $epp);
        $maxPage = ceil($count / $epp);

        if($maxPage == 0) {$maxPage = 1;}

        return ["searchResult" => $searcQuery, "maxPage" => $maxPage];
    }

    public function updateDokumen($id, $nama, $slug) {
        DB::table('dokumens')->where('id', $id)->update([
            'nama' => $nama,
            'slug' => $slug
        ]);
    }

    public function deleteDokumen($id) {
        DB::table('dokumens')->where('id', $id)->delete();
    }

    public function IDExist($id) {
        return DB::table('dokumens')->where('id', $id)->exists();
    }
}