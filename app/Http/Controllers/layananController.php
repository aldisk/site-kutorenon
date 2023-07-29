<?php

namespace App\Http\Controllers;

use App\Models\layanan;
use Illuminate\Http\Request;

class layananController extends Controller
{
    public function insert(Request $request) {
        $request -> validate([
            'nama' => ['required', 'string'],
            'link' => ['required', 'string']
        ]);

        $layanan = new layanan;
        $data = $request->all();

        $id = $layanan->insertLayanan($data['nama'], $data['link']);

        return redirect('/admin/layanan');
    }

    public function pagedManageLayanan(Request $request) {
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

        $layanan = new layanan;
        $result = $layanan->getPagedLayanan($searchToken, $page, 6);
        $items = $result['searchResult'];

        return view('dashboard', ["items" => $items, "searchToken" => $searchToken, "page" => $page, "maxPage" => $result['maxPage'], "mode" => 'manage', 'tab' => 'layanan']);
    }

    public function editPage ($id, Request $request) {
        if(!is_numeric($id)) {return redirect('/404');}
        $layanan = new layanan;
        if($layanan->IDExist($id)) {
            $itemData = $layanan->getLayananByID($id);
            return view('dashboard', ['item' => $itemData, 'mode' => 'edit', 'tab' => 'layanan']);
        } else {
            return redirect('/404');
        }
    }

    public function editLayanan (Request $request) {
        $request -> validate([
            'id' => ['required', 'integer'],
            'nama' => ['required', 'string'],
            'link' => ['required', 'string']
        ]);

        $data = $request->all();
        $layanan = new layanan;

        if(!$layanan->IDExist($data['id'])) {return back();}

        $layanan->updateLayanan(
            $data['id'],
            $data['nama'],
            $data['link']
        );

        return redirect('/admin/layanan');
    }

    public function deleteLayanan ($id, Request $request) {
        $layanan = new layanan;
        if(!is_numeric($id)) {return redirect('/404');}
        if($layanan->IDExist($id)) {
            $layanan->deleteLayanan($id);
            return redirect('/admin/layanan');
        } else {
            return redirect('/404');
        }
    }
}
