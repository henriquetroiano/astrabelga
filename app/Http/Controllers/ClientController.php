<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;
use App\Models\Documento;


class ClientController extends Controller
{
    public function catalogos() {
        $catalogos = Catalogo::all();

        return view('site.catalogos', compact('catalogos'));
    }

    public function catalogos_view($id) {
        $peca = Catalogo::find($id);

        return view('site.catalogo_view', compact('peca'));
    }

    public function documentos() {
        $documentos = Documento::orderBy('id', 'desc')->get();
        return view('site.documentos', compact('documentos'));
    }
}
