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
        $documentos = Documento::orderBy('id', 'desc')->get();
        return view('site.admin.documentos', compact('documentos'));
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

    public function admin_documentos_delete(Request $request) {

        $doc = Documento::find($request->id);
        if(file_exists('.' . $doc->file)) {
            unlink('.' . $doc->file);
        }
        if($doc) {
            $doc->delete();
        }

        return redirect()->route('documentos_admin');
    }

    public function admin_documentos_edit(Request $request) {
        // dd('ok');
        $documento = Documento::find($request->id);

        if(isset($request->title)) {
            $documento->title = $request->title;
        }
        if(isset($request->description)) {
            $documento->description = $request->description;
        }
        if(isset($request->file)) {

            if(file_exists('.' . $documento->file)) {
                unlink('.' . $documento->file);
            }
            
            $file = $request->file;
            $filename = rand(0, 1000) . $file->getClientOriginalName();
            $file->move(public_path("/uploads/"), $filename);
            $path = '/uploads/' . $filename;
    
            $documento->file = $path;
        }

        $documento->save();

        return redirect()->route('documentos_admin');
    }
}
