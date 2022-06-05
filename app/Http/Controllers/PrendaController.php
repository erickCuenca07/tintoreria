<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prenda;
use App\Models\Categoria;

class PrendaController extends Controller
{
  
    public function index()
    {
        $prendas=Prenda::all();
        $categoria=Categoria::all();
        return view('prendas.index',compact('prendas','categoria'));
    }

  
    public function store(Request $request)
    {
        $prenda = new Prenda();
        
        $prenda->prenda_id = $request->prendas_id;
        $prenda->nombre = $request->nombre;
        $prenda->descripcion = $request->descripcion;

        if( $request->hasFile('foto') ) {
            $file = $request->file('foto');
            $destinationPath = 'img/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $prenda->foto = $destinationPath . $filename;
        }
        $prenda->categoria_id =$request->categoria;
        $prenda->save();

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }
 
    public function update(Request $request, $prenda_id)
    {
        $prenda_id= Prenda::find($prenda_id);

        $prenda_id->prenda_id= $request->prenda_id;
        $prenda_id->nombre= $request->nombre;
        $prenda_id->descripcion=$request->descripcion;
        
        if( $request->hasFile('foto') ) {
            $file = $request->file('foto');
            $destinationPath = 'img/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $prenda_id->foto = $destinationPath . $filename;
        }
        $prenda_id->update();

        return redirect()->back();
    }

    public function destroy(Request $request,$prenda_id)
    {
        $prenda_id= Prenda::find($prenda_id);
        $prenda_id->delete();

        return redirect()->back();
    }
}
