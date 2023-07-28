<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;
use Illuminate\Support\Str;

class beritaController extends Controller
{
    public function insert(Request $request) {
        $request -> validate([
            'judul' => ['required', 'string'],
            'isi' => ['required', 'string'],
            'fotoBerita' => ['required', 'image']
        ]);

        if($request->file('fotoBerita')->isValid()) {
            $data = $request->all();
            $beritas = new berita;

            $id = $beritas->insertBerita(
                $data['judul'],
                $this->wrapText($data['isi']),
                $request->session()->get('username'),
                Str::slug($data['judul'], '-')
            );

            $request->file('fotoBerita')->storeAs('public/foto-berita/'.$id.'.jpg');

            return redirect('/admin/berita');
        }
    }

    public function editPage ($id, Request $request) {
        if(!is_numeric($id)) {return redirect('/404');}
        $berita = new berita;
        if($berita->IDExist($id)) {
            $beritaData = $berita->getBeritasByID($id);
            return view('dashboard', ['berita' => $beritaData, 'mode' => 'edit', 'tab' => 'berita']);
        } else {
            return redirect('/404');
        }
    }

    public function editBerita (Request $request) {
        $request -> validate([
            'id' => ['required', 'integer'],
            'judul' => ['required', 'string'],
            'isi' => ['required', 'string'],
        ]);

        $data = $request->all();
        $beritas = new berita;

        if(!$beritas->IDExist($data['id'])) {return back();}

        $beritas->updateBerita(
            $data['id'],
            $data['judul'],
            $this->wrapText($data['isi']),
            Str::slug($data['judul'], '-')
        );

        if($request->has('fotoBerita')) {
            $request->validate([
                'fotoBerita' => ['required', 'image']
            ]);
            $request->file('fotoBerita')->storeAs('public/foto-berita/'.$data['id'].'.jpg');
        }

        return redirect('/admin/berita');
    }

    public function deleteBerita ($id, Request $request) {
        $berita = new berita;
        if(!is_numeric($id)) {return redirect('/404');}
        if($berita->IDExist($id)) {
            $berita->deleteBerita($id);
            return redirect('/admin/berita');
        } else {
            return redirect('/404');
        }
    }

    public function pagedManageBeritas(Request $request) {
        $searchToken = '';
        $page = 1;
        $data = $request->all();
        if(isset($data['page'])) {
            $request -> validate ([
                'page' => ['integer', 'required']
            ]);

            $searchToken = $data['searchToken'];
            $page = $data['page'];
        }

        $berita = new berita;
        $result = $berita->getPagedBeritas($searchToken, $page, 6);
        $beritas = $result['searchResult'];

        return view('dashboard', ["beritas" => $beritas, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage'], "mode" => 'manage',  'tab' => 'berita']);
    }

    private function wrapText($string){
        return str_ireplace(";;", ";", str_ireplace(["\n", "\r\n", "\r"], ';', $string));
    }
}
