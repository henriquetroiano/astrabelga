<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\Marca;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class CatalogoController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos = Catalogo::all();
        return view('site.admin.catalogos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $table = new Catalogo;
        $table->name = $data['name'];
        $table->save();
        
        $files = $request->file('image');

        foreach ($files as $file) {

            $picture = new Photo;

            $filename = rand(0, 1000) . $file->getClientOriginalName();
            $saveImage = $file->move(public_path("/uploads/"), $filename);
            $savePathToDB = '/uploads/' . $filename;
            
            $picture->type = 1;
            $picture->url = $savePathToDB;
            $picture->catalogo_id = $table->id; 

            $picture->save();
        }

        

        return redirect('/admin/catalogos');
    }

    public function store_image(Request $request, $id)
    {
        $files = $request->file('image');

        foreach ($files as $file) {

            $picture = new Photo;

            $filename = rand(0, 1000) . $file->getClientOriginalName();
            $saveImage = $file->move(public_path("/uploads/"), $filename);
            $savePathToDB = '/uploads/' . $filename;
            
            $picture->type = 1;
            $picture->url = $savePathToDB;
            $picture->catalogo_id = $id; 

            $picture->save();
        }

        

        return redirect('/admin/catalogo/edit/' . $id);
    }

    public function delete_image(Request $request, $id, $photo_id)
    {
        $file = Photo::find($photo_id);

        if(file_exists('.' . $file->url)) {
            // array_map('unlink', $v);
            unlink('.' . $file->url);
        } 
        // dd($file);
        if ($file) {
            $file->delete();
            return redirect('/admin/catalogo/edit/' . $id);
        }

        
    }

    public function store_marca(Request $request, $id)
    {
        $data = $request->all();

        $table = new Marca;
        $table->name = $data['name'];
        $table->code = $data['code'];
        $table->description = $data['description'];
        $table->catalogo_id = $id;

        $table->save();
        
        $files = $request->file('image');

        foreach ($files as $file) {

            $picture = new Photo;

            $filename = rand(0, 1000) . $file->getClientOriginalName();
            $saveImage = $file->move(public_path("/uploads/"), $filename);
            $savePathToDB = '/uploads/' . $filename;
            
            $picture->type = 2;
            $picture->url = $savePathToDB;
            $picture->marca_id = $table->id; 

            $picture->save();
        }

        

        return redirect('/admin/catalogo/edit/' . $id);
    }

    public function edit_marca(Request $request, $catId, $marcaId)
    {

        $target = Marca::find($marcaId);
        if(isset($request->name)) {
            $target->name = $request->name;
        }
        if(isset($request->code)) {
            $target->code = $request->code;
        }
        if(isset($request->description)) {
            $target->description = $request->description;
        }
        $target->save();

        return redirect('/admin/catalogo/edit/' . $catId);
    }

    public function delete_marca(Request $request, $catId, $marcaId)
    {

        $target = Marca::find($marcaId);
        // DD($target);
        if($target->photos) {
            foreach ($target->photos as $f) {
                if(file_exists('.' . $f->url)) {
                    unlink('.' . $f->url);
                }
            }
        }
        // dd("ok");
        $target->delete();

        return redirect('/admin/catalogo/edit/' . $catId);
    }



    public function edit_photo_marca(Request $request, $catId, $marcaId)
    {

        $files = $request->file('image');

        // dd($files); 

        foreach ($files as $file) {

            $picture = new Photo;

            $filename = rand(0, 1000) . $file->getClientOriginalName();
            $saveImage = $file->move(public_path("/uploads/"), $filename);
            $savePathToDB = '/uploads/' . $filename;
            
            $picture->type = 2;
            $picture->url = $savePathToDB;
            $picture->marca_id = $marcaId; 

            $picture->save();
        }

        

        return redirect('/admin/catalogo/edit/' . $catId);
    }

    public function delete_photo_marca(Request $request, $catId, $marcaId, $photoId)
    {

        $target = Photo::find($photoId);
        // dd($target);
        if(file_exists('.' . $target->url)) {
            // array_map('unlink', $v);
            unlink('.' . $target->url);
        } 

        if(isset($target)) {
            $target->delete();
        }

        return redirect('/admin/catalogo/edit/' . $catId);
    }


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Catalogo::find($id);
        // dd($item->marcas);
        // echo $item;
        return view('site.admin.catalogos-edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function edit_name_catalogo(Request $request, $id)
    {
        $item = Catalogo::find($id);
        $item->name = $request['name'];
        $item->save();
        return redirect('/admin/catalogo/edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // array_map('unlink, $files');
        $item = Catalogo::find($id);

        // delete from the system the 'catalogos' pictures
        $array_photos_catalogo = [];
        // add to array the files able to delete
        if($item->photos) {
            foreach ($item->photos as $photo => $p) {
                array_push($array_photos_catalogo, '.' . $p->url);
            }
        }
        // loop thru the array of files and check one by one and delete it if true
        foreach ($array_photos_catalogo as $k => $v) {
            if(file_exists($v)) {
                // array_map('unlink', $v);
                unlink($v);
            } 
        }

        // delete from the system the 'marcas' pictures, a dependency of catalogos
        $array_photos_marca = [];
        // add to array the files able to delete
        if($item->marcas) {
            foreach ($item->marcas as $marca => $m) {
                foreach ($m->photos as $p) {
                    array_push($array_photos_marca, '.' . $p->url);
                }
            }
        }
        // loop thru the array of files and check one by one and delete it if true
        foreach ($array_photos_marca as $k => $v) {
            if(file_exists($v)) {
                // array_map('unlink', $v);
                unlink($v);
            } 
        }

        $item = Catalogo::find($id);
        if ($item) {
            if($item->photos) {
                foreach($item->photos as $photo) {
                    Photo::find($photo->id)->delete();
                }
            }
            foreach($item->marcas as $marca) {
                if($marca) {
                    if($marca->photos) {
                        foreach ($marca->photos as $photo) {
                            Photo::find($photo->id)->delete();
                        }
                    }
                    Marca::find($marca->id)->delete();
                }
            }
            $item->delete();
            return redirect('/admin/catalogos');
        }

    }
}
