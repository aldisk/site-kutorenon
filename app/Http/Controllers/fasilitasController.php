<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasilitas;
use Illuminate\Support\Str;

class fasilitasController extends Controller
{
    public function insert(Request $request) {
        $request -> validate([
            'nama' => ['required', 'string'],
            'isi' => ['required', 'string'],
            'attachment' => ['required', 'image']
        ]);

        if($request->file('attachment')->isValid()) {
            $data = $request->all();
            $fasilitas = new fasilitas;

            if($fasilitas->nameExist(Str::slug($data['nama'], '-'))) {return back();}

            $id = $fasilitas->insertFasilitas(
                $data['nama'],
                $this->wrapText($data['isi']),
                Str::slug($data['nama'], '-')
            );

            $request->file('attachment')->storeAs('public/foto-fasilitas/'.$id.'.jpg');

            return redirect('/admin/fasilitas');
        }
    }

    public function editPage ($id, Request $request) {
        if(!is_numeric($id)) {return redirect('/404');}
        $fasilitas = new fasilitas;
        if($fasilitas->IDExist($id)) {
            $fasilitasData = $fasilitas->getFasilitasByID($id);
            return view('dashboard', ['item' => $fasilitasData, 'mode' => 'edit', 'tab' => 'fasilitas']);
        } else {
            return redirect('/404');
        }
    }

    public function editFasilitas (Request $request) {
        $request -> validate([
            'id' => ['required', 'integer'],
            'nama' => ['required', 'string'],
            'isi' => ['required', 'string'],
        ]);

        $data = $request->all();
        $fasilitas = new fasilitas;

        if(!$fasilitas->IDExist($data['id'])) {return back();}

        $originalData = $fasilitas->getFasilitasByID($data['id']);

        if(!($originalData->slug == Str::slug($data['nama'], '-')) && $fasilitas->nameExist(Str::slug($data['nama'], '-'))) {return back();}

        $fasilitas->updateFasilitas(
            $data['id'],
            $data['nama'],
            $this->wrapText($data['isi']),
            Str::slug($data['nama'], '-')
        );

        if($request->has('attachment')) {
            $request->validate([
                'attachment' => ['required', 'image']
            ]);
            $request->file('attachment')->storeAs('public/foto-fasilitas/'.$data['id'].'.jpg');
        }

        return redirect('/admin/fasilitas');
    }

    public function deleteFasilitas ($id, Request $request) {
        $fasilitas = new fasilitas;
        if(!is_numeric($id)) {return redirect('/404');}
        if($fasilitas->IDExist($id)) {
            $fasilitas->deleteFasilitas($id);
            return redirect('/admin/fasilitas');
        } else {
            return redirect('/404');
        }
    }

    public function pagedManageFasilitas(Request $request) {
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

        $fasilitas = new fasilitas;
        $result = $fasilitas->getPagedFasilitas($searchToken, $page);
        $items = $result['searchResult'];

        return view('dashboard', ["items" => $items, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage'], "mode" => 'manage', 'tab' => 'fasilitas']);
    }

    private function wrapText($string){
        return str_ireplace(";;", ";", str_ireplace(["\n", "\r\n", "\r"], ';', $string));
    }
}
