<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class layanan extends Model
{
    public function insertLayanan($nama, $link) {
        return DB::table('layanans')->insertGetId([
            'nama' => $nama,
            'link' => $link
        ]);
    }

    public function getAll() {
        return DB::table('layanans')->get();
    }

    public function getLayananByID($id) {
        return DB::table('layanans')->where('id', $id)->first();
    }

    public function getPagedLayanan($searchToken, $page, $epp) {

        $start = $epp * ($page-1);

        $count = DB::table('layanans') ->where('nama', 'like' , '%'.$searchToken.'%') -> count();
        $searcQuery = DB::table('layanans') ->where('nama', 'like' , '%'.$searchToken.'%')-> orderBy('id', 'desc') ->get();

        $searcQuery = $searcQuery->slice($start, $epp);
        $maxPage = ceil($count / $epp);

        if($maxPage == 0) {$maxPage = 1;}

        return ["searchResult" => $searcQuery, "maxPage" => $maxPage];
    }

    public function updateLayanan($id, $nama, $link) {
        DB::table('layanans')->where('id', $id)->update([
            'nama' => $nama,
            'link' => $link
        ]);
    }

    public function deleteLayanan($id) {
        DB::table('layanans')->where('id', $id)->delete();
    }

    public function IDExist($id) {
        return DB::table('layanans')->where('id', $id)->exists();
    }
}
