<?php

namespace App\Http\Controllers;

use App\Models\dokumen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class dokumenController extends Controller
{
    public function insert(Request $request) {
        $request -> validate([
            'nama' => ['required', 'string'],
            'attachment' => ['required', File::types(['pdf'])]
        ]);

        if($request->file('attachment')->isValid()) {
            $dokumen = new dokumen;
            $data = $request->all();

            $id = $dokumen->insertDokumen($data['nama']);

            $request->file('attachment')->storeAs('public/dokumen/'.$id.'.pdf');

            return redirect('/admin/dokumen');
        }

    }

    public function pagedManageDokumen(Request $request) {
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

        $dokumen = new dokumen;
        $result = $dokumen->getPagedDokumens($searchToken, $page);
        $items = $result['searchResult'];

        return view('dashboard', ["items" => $items, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage'], "mode" => 'manage', 'tab' => 'dokumen']);
    }

    public function editPage ($id, Request $request) {
        if(!is_numeric($id)) {return redirect('/404');}
        $dokumen = new dokumen;
        if($dokumen->IDExist($id)) {
            $itemData = $dokumen->getDokumenByID($id);
            return view('dashboard', ['item' => $itemData, 'mode' => 'edit', 'tab' => 'dokumen']);
        } else {
            return redirect('/404');
        }
    }

    public function editDokumen (Request $request) {
        $request -> validate([
            'id' => ['required', 'integer'],
            'nama' => ['required', 'string']
        ]);

        $data = $request->all();
        $dokumen = new dokumen;

        if(!$dokumen->IDExist($data['id'])) {return back();}

        $dokumen->updateDokumen(
            $data['id'],
            $data['nama']
        );

        if($request->has('attachment')) {
            $request->validate([
                'attachment' => ['required', File::types('pdf')]
            ]);
            $request->file('attachment')->storeAs('public/dokumen/'.$data['id'].'.pdf');
        }

        return redirect('/admin/dokumen');
    }

    public function deleteDokumen ($id, Request $request) {
        $dokumen = new dokumen;
        if(!is_numeric($id)) {return redirect('/404');}
        if($dokumen->IDExist($id)) {
            $dokumen->deleteDokumen($id);
            Storage::delete('public/dokumen/'.$id.'.pdf');
            return redirect('/admin/dokumen');
        } else {
            return redirect('/404');
        }
    }
}
