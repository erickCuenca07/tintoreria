<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaoController extends Controller
{
    public function index()
    {
        $categoria =Categoria::all();
        return view('categorias.index',compact('categoria'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $categoria = new Categoria();

        $categoria->categoria_id = $request->categoria_id;
        $categoria->nombre = $request->nombre;

        $categoria->save();

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $categoria_id)
    {
        $categoria_id = Categoria::find($categoria_id);

        $categoria_id->categoria_id = $request->categoria_id;
        $categoria_id->nombre = $request->nombre;

        $categoria_id->update();

        return redirect()->back();

    }

    public function destroy(Request $request,$categoria_id)
    {
        $categoria_id = Categoria::find($categoria_id);
        $categoria_id->delete();

        return redirect()->back();
    }
}
