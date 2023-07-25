<?php

namespace App\Http\Controllers;

use App\Models\lembaga;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class lembagaController extends Controller
{
    public function insert(Request $request) {
        $request -> validate([
            'nama' => ['required', 'string'],
            'isi' => ['required', 'string'],
            'attachment' => ['required', 'image']
        ]);

        $data = $request->all();
        $lembaga = new lembaga;
        if($lembaga->IDExist(Str::slug($data['nama'], '-'))) {return back();}

        if($request->file('attachment')->isValid()) {
        
            $lembaga->insertLembaga(
                $data['nama'],
                Str::slug($data['nama'], '-'),
                $this->wrapText($data['isi'])
            );

            $request->file('attachment')->storeAs('public/lembaga/'.Str::slug($data['nama'], '-').'.jpg');

            return redirect('/admin/lembaga');
        }
    }

    public function editPage ($id, Request $request) {
        if(!is_string($id)) {return redirect('/404');}
        $lembaga = new lembaga;
        if($lembaga->IDExist($id)) {
            $itemData = $lembaga->getLembagaByID($id);
            return view('dashboard', ['item' => $itemData, 'mode' => 'edit', 'tab' => 'lembaga']);
        } else {
            return redirect('/404');
        }
    }

    public function editLembaga (Request $request) {
        $request -> validate([
            'id' => ['required', 'string'],
            'isi' => ['required', 'string']
        ]);

        $data = $request->all();
        $lembaga = new lembaga;

        if(!$lembaga->IDExist($data['id'])) {return back();}

        $lembaga->updateLembaga(
            $data['id'],
            $this->wrapText($data['isi'])
        );

        if($request->has('attachment')) {
            $request->validate([
                'attachment' => ['required', 'image']
            ]);
            $request->file('attachment')->storeAs('public/lembaga/'.$data['id'].'.jpg');
        }

        return redirect('/admin/lembaga');
    }

    public function deleteLembaga ($id, Request $request) {
        $lembaga = new lembaga;
        if(!is_string($id)) {return redirect('/404');}
        if($lembaga->IDExist($id)) {
            $lembaga->deleteLembaga($id);
            Storage::delete('public/lembaga/'.$id.'.jpg');
            return redirect('/admin/lembaga');
        } else {
            return redirect('/404');
        }
    }

    public function pagedManageLembaga(Request $request) {
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

        $lembaga = new lembaga;
        $result = $lembaga->getPagedLembagas($searchToken, $page);
        $items = $result['searchResult'];

        return view('dashboard', ["items" => $items, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage'], "mode" => 'manage', 'tab' => 'lembaga']);
    }

    private function wrapText($string){
        return str_ireplace(";;", ";", str_ireplace(["\n", "\r\n", "\r"], ';', $string));
    }
}
