<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\Photo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
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
            
            $picture->url = $savePathToDB;
            $picture->categoria_id = $table->id; 

            $picture->save();
        }

        

        return redirect('/admin/catalogos');
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
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Catalogo::find($id);
        if ($item) {
            $item->delete();
            return redirect('/admin/catalogos');
        }
    }
}
