<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lista.list', ['listas' => Lista::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lista.create', ['usuarios' => Usuario::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'user_id' =>  Auth::id(),
        ]);
        if (Lista::create($request->all())) {

            return redirect()->route('listas.index')->with('success', 'Lista registrado com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());
    }
     public function adicionar(Request $request)
    {
        $lista= Lista::find($request->lista_id);
        $usuario = Usuario::find($request->usuario_id);
    
       
       
     if (!$lista->usuario->find($usuario)){
       $lista->usuario()->attach($usuario);
    
    
            return redirect()->route('listas.relacionar', $lista)->with('success', 'Usuario adicionado à lista com sucesso!');
         
    }
        return redirect()->route('listas.relacionar', $lista)->with('danger', 'Usuario já consta na lista!');
   
    }

    public function remover(Lista $lista, Usuario $usuario)
    {
           $lista->usuario()->detach($usuario);;
        return redirect()->route('listas.relacionar', $lista)->with('success', 'Usuario removido da lista com sucesso!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(Lista $lista)
    {
        $alistamento2 = $lista->with(['user', 'usuario'])->get();

        return view('lista.show', ['lista' => $alistamento2->find($lista), 'usuarios' => Usuario::all()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        $alistamento2 = $lista->with(['user', 'usuario'])->get();

        return view('lista.edit', ['lista' => $alistamento2->find($lista), 'usuarios' => Usuario::all()]);
  
    }    
    public function relacionar(Lista $lista, Usuario $usuario = null)
    {
        $alistamento2 = $lista->with(['user', 'usuario'])->get();
        // dd($alistamento2->find($lista));
if(isset($usuario)){

            return view('lista.relacionar', ['lista' => $alistamento2->find($lista), 'usuarios' => Usuario::all(), 'usuario' => $usuario]);
  
}
        return view('lista.relacionar', ['lista' => $alistamento2->find($lista), 'usuarios' => Usuario::all()]);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
         if ($lista->update($request->all())) {

            return redirect()->route('listas.index')->with('success', 'Lista atualizado com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
 
        if (Lista::destroy($lista->id))
            return redirect()->route('listas.index')->with('success', 'Lista excluido com sucesso!');
        else return "Erro ao excluir: ".$lista;
    }
}
