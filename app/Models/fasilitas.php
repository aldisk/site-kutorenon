<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class fasilitas extends Model
{
    use HasFactory;

    public function getFasilitasByID($id) {
        return DB::table('fasilitas')->where('id', $id)->first(); 
    }

    public function getCount() {
        return DB::table('fasilitas') -> count();
    }

    public function getFasilitasBySlug($slug) {
        return DB::table('fasilitas')->where('slug', $slug)->first();
    }

    public function getPagedFasilitas($searchToken, $page){
        $epp = 6;

        $start = $epp * ($page-1);

        $count = DB::table('fasilitas') ->where('nama', 'like' , '%'.$searchToken.'%') -> count();
        $searcQuery = DB::table('fasilitas') ->where('nama', 'like' , '%'.$searchToken.'%')-> orderBy('id', 'desc') ->get();

        $searcQuery = $searcQuery->slice($start, $epp);
        $maxPage = ceil($count / $epp);

        if($maxPage == 0) {$maxPage = 1;}

        return ["searchResult" => $searcQuery, "maxPage" => $maxPage];
    }

    public function IDExist($id) {
        return DB::table('fasilitas')->where('id', $id) ->exists();
    }

    public function nameExist($slug) {
        return DB::table('fasilitas')->where('slug', $slug) ->exists();
    }

    public function getAll() {
        return DB::table('fasilitas')->get();
    }

    public function insertFasilitas($nama, $isi, $slug) {
        return DB::table('fasilitas')->insertGetId([
            'nama' => $nama,
            'isi' => $isi,
            'slug' => $slug,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function updateFasilitas($id, $nama, $isi, $slug) {
        DB::table('fasilitas')->where('id', $id)->update([
            'nama' => $nama,
            'isi' => $isi,
            'slug' => $slug,
            'updated_at' => now()
        ]);
    }

    public function deleteFasilitas($id) {
        DB::table('fasilitas')->where('id', $id)->delete();
    }
}
