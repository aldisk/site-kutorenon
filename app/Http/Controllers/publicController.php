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

    public function beritaPage(Request $request) {
        $searchToken = '';
        $page = 1;
        $data = $request->all();
        if(isset($data['page'])) {
            $request -> validate ([
                'page' => ['integer', 'required']
            ]);
            $page = $data['page'];
        }

        if(isset($data['searchToken'])) {
            $request -> validate([
                'searchToken' => ['string']
            ]);
            $searchToken = $data['searchToken'];
        }

        $berita = new berita;
        $result = $berita->getPagedBeritas($searchToken, $page);
        $items = $result['searchResult'];

        return view('view-berita', ["items" => $items, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage']]);
    }

    public function viewBerita($id, Request $request) {
        $berita = new berita;
        $item = $berita->getBeritasByID($id);

        return view('berita', ['item' => $item]);
    }

    public function dokumenPage(Request $request) {
        $dokumen= new dokumen;
        $items = $dokumen->getAll();

        return view('view-dokumen', ['items' => $items, 'tabs' => 'Dokumen']);
    }
}
