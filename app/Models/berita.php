<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class berita extends Model
{
    use HasFactory;

    public function getBeritasByID($id) {
        return DB::table('beritas')->where('id', $id)->first(); 
    }

    public function getPagedBeritas($searchToken, $page, $epp){
        $start = $epp * ($page-1);

        $count = DB::table('beritas') ->where('judul', 'like' , '%'.$searchToken.'%') -> count();
        $searcQuery = DB::table('beritas') ->where('judul', 'like' , '%'.$searchToken.'%')-> orderBy('id', 'desc') ->get();

        $searcQuery = $searcQuery->slice($start, $epp);
        $maxPage = ceil($count / $epp);

        if($maxPage == 0) {$maxPage = 1;}

        return ["searchResult" => $searcQuery, "maxPage" => $maxPage];
    }

    public function getCount() {
        return DB::table('beritas') -> count();
    }

    public function getBeritasByPenulis($penulis) {
        return DB::table('beritas')->where('penulis', $penulis)->get(); 
    }

    public function IDExist($id) {
        return DB::table('beritas')->where('id', $id)->exists();
    }

    public function getAll() {
        return DB::table('beritas')->get();
    }

    public function insertBerita($judul, $isi, $penulis, $slug) {
        return DB::table('beritas')->insertGetId([
            'judul' => $judul,
            'isi' => $isi,
            'penulis' => $penulis,
            'slug' => $slug,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    public function updateBerita($id, $judul, $isi, $slug) {
        DB::table('beritas')->where('id', $id)->update([
            'judul' => $judul,
            'isi' => $isi,
            'slug' => $slug,
            'updated_at' => now()
        ]);
    }

    public function deleteBerita($id) {
        DB::table('beritas')->where('id', $id)->delete();
    }
}
