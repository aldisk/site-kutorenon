<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;

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
                $request->session()->get('username')
            );

            $request->file('fotoBerita')->storeAs('public/foto-berita/'.$id.'.jpg');
        }
    }

    private function wrapText($string){
        return str_ireplace(";;", ";", str_ireplace(["\n", "\r\n", "\r"], ';', $string));
    }
}
