<?php

namespace App\Http\Controllers;

use App\Models\anggaran;
use App\Models\berita;
use App\Models\dokumen;
use App\Models\lembaga;
use App\Models\potensi;
use Illuminate\Http\Request;

class publicController extends Controller
{
    public function homepage(Request $request) {
        $berita = new berita;
        $items = $berita->getPagedBeritas('', 1);

        return view('view-home', ['items' => $items['searchResult']]);
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

        return view('view-berita-page', ["items" => $items, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage']]);
    }

    public function viewBerita($id, Request $request) {
        $berita = new berita;
        $item = $berita->getBeritasByID($id);

        return view('view-berita', ['item' => $item]);
    }

    public function potensiPage(Request $request) {
        $potensi = new potensi;
        $items = $potensi->getAll();

        return view('view-potensi-page', ['items' => $items]);
    }

    public function viewPotensi($slug, Request $request) {
        $potensi = new potensi;
        $item = $potensi->getPotensiBySlug($slug);

        return view('view-potensi', ['item' => $item]);
    }

    public function lembagaPage(Request $request) {
        $lembaga = new lembaga;
        $items = $lembaga->getAll();

        return view('view-lembaga-page', ['items' => $items]);
    }

    public function viewLembaga($id, Request $request) {
        $lembaga = new lembaga;
        $item = $lembaga->getLembagaByID($id);

        return view('view-lembaga', ['item' => $item]);
    }

    public function dokumenPage(Request $request) {
        $dokumen= new dokumen;
        $items = $dokumen->getAll();

        return view('view-dokumen', ['items' => $items, 'tabs' => 'Dokumen']);
    }

    public function anggaranPage(Request $request) {
        $anggaran = new anggaran;
        $items = $anggaran->getAll();

        return view('view-dokumen', ['items' => $items, 'tabs' => 'Anggaran']);
    }
}
