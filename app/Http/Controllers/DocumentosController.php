<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\Marca;
use App\Models\Photo;
use App\Models\Documento;
use Illuminate\Support\Facades\Storage;
use File;

class DocumentosController extends Controller
{
    public function index() {
        return view('site.admin.documentos');
    }

    public function admin_documentos_uploader(Request $request) {
        // dd('ok');
        $documento = new Documento;
        $documento->title = $request->title;
        $documento->description = $request->description;

        $file = $request->file;
        $filename = rand(0, 1000) . $file->getClientOriginalName();
        $file->move(public_path("/uploads/"), $filename);
        $path = '/uploads/' . $filename;

        $documento->file = $path;

        $documento->save();

        return redirect()->route('documentos_admin');


    }
}
