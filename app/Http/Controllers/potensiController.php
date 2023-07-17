<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\potensi;

class potensiController extends Controller
{
    public function insert(Request $request) {
        $request -> validate([
            'nama' => ['required', 'string'],
            'isi' => ['required', 'string'],
            'fotoPotensi' => ['required', 'image']
        ]);

        if($request->file('fotoPotensi')->isValid()) {
            $data = $request->all();
            $potensi = new potensi;

            $id = $potensi->insertPotensi(
                $data['nama'],
                $this->wrapText($data['isi'])
            );

            $request->file('fotoPotensi')->storeAs('public/foto-potensi/'.$id.'.jpg');

            return redirect('/admin/potensi');
        }
    }

    public function editPage ($id, Request $request) {
        if(!is_numeric($id)) {return redirect('/404');}
        $potensi = new potensi;
        if($potensi->IDExist($id)) {
            $potensiData = $potensi->getPotensiByID($id);
            return view('dashboard', ['potensi' => $potensiData, 'mode' => 'edit', 'tab' => 'potensi']);
        } else {
            return redirect('/404');
        }
    }

    public function editPotensi (Request $request) {
        $request -> validate([
            'id' => ['required', 'integer'],
            'nama' => ['required', 'string'],
            'isi' => ['required', 'string'],
        ]);

        $data = $request->all();
        $potensi = new potensi;

        if(!$potensi->IDExist($data['id'])) {return back();}

        $potensi->updatePotensi(
            $data['id'],
            $data['nama'],
            $this->wrapText($data['isi'])
        );

        if($request->has('fotoPotensi')) {
            $request->validate([
                'fotoPotensi' => ['required', 'image']
            ]);
            $request->file('fotoPotensi')->storeAs('public/foto-potensi/'.$data['id'].'.jpg');
        }

        return redirect('/admin/potensi');
    }

    public function deletePotensi ($id, Request $request) {
        $potensi = new potensi;
        if(!is_numeric($id)) {return redirect('/404');}
        if($potensi->IDExist($id)) {
            $potensi->deletePotensi($id);
            return redirect('/admin/potensi');
        } else {
            return redirect('/404');
        }
    }

    public function pagedManagePotensi(Request $request) {
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

        $potensi = new potensi;
        $result = $potensi->getPagedPotensis($searchToken, $page);
        $potensis = $result['searchResult'];

        return view('dashboard', ["potensis" => $potensis, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage'], "mode" => 'manage', 'tab' => 'potensi']);
    }

    private function wrapText($string){
        return str_ireplace(";;", ";", str_ireplace(["\n", "\r\n", "\r"], ';', $string));
    }
}
