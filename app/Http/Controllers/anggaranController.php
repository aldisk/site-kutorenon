<?php

namespace App\Http\Controllers;

use App\Models\anggaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;

class anggaranController extends Controller
{
    public function insert(Request $request) {
        $request -> validate([
            'nama' => ['required', 'string'],
            'attachment' => ['required', File::types(['pdf'])]
        ]);

        if($request->file('attachment')->isValid()) {
            $anggaran = new anggaran;
            $data = $request->all();

            $id = $anggaran->insertDokumen($data['nama']);

            $request->file('attachment')->storeAs('public/anggaran/'.$id.'.pdf');

            return redirect('/admin/anggaran');
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

        $anggaran = new anggaran;
        $result = $anggaran->getPagedDokumens($searchToken, $page);
        $items = $result['searchResult'];

        return view('dashboard', ["items" => $items, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage'], "mode" => 'manage', 'tab' => 'anggaran']);
    }

    public function editPage ($id, Request $request) {
        if(!is_numeric($id)) {return redirect('/404');}
        $anggaran = new anggaran;
        if($anggaran->IDExist($id)) {
            $itemData = $anggaran->getDokumenByID($id);
            return view('dashboard', ['item' => $itemData, 'mode' => 'edit', 'tab' => 'anggaran']);
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
        $anggaran = new anggaran;

        if(!$anggaran->IDExist($data['id'])) {return back();}

        $anggaran->updateDokumen(
            $data['id'],
            $data['nama']
        );

        if($request->has('attachment')) {
            $request->validate([
                'attachment' => ['required', File::types('pdf')]
            ]);
            $request->file('attachment')->storeAs('public/anggaran/'.$data['id'].'.pdf');
        }

        return redirect('/admin/anggaran');
    }

    public function deleteDokumen ($id, Request $request) {
        $anggaran = new anggaran;
        if(!is_numeric($id)) {return redirect('/404');}
        if($anggaran->IDExist($id)) {
            $anggaran->deleteDokumen($id);
            Storage::delete('public/anggaran/'.$id.'.pdf');
            return redirect('/admin/anggaran');
        } else {
            return redirect('/404');
        }
    }
}
