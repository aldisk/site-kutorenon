<?php

namespace App\Http\Controllers;

use App\Models\berita;
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
}
