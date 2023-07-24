<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\dokumen;
use Illuminate\Http\Request;

class publicController extends Controller
{
    public function homepage(Request $request) {
        $berita = new berita;
        $items = $berita->getPagedBeritas('', 1);

        return view('home', ['items' => $items['searchResult']]);
    }

    public function viewBerita($id, Request $request) {
        $berita = new berita;
        $item = $berita->getBeritasByID($id);

        return view('view-berita', ['item' => $item]);
    }

    public function viewDokumen(Request $request) {
        $dokumen= new dokumen;
        $items = $dokumen->getAll();

        return view('view-dokumen', ['items' => $items, 'tabs' => 'Dokumen']);
    }
}
