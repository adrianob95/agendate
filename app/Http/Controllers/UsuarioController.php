<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('usuario.list', ['usuarios' => Usuario::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $request->merge([
            'user_id' =>  Auth::id(),
        ]);
if($usuario = Usuario::create($request->all())){
    if($request->query('url')){
                return redirect()->route($request->query('url'), ['usuario'=>$usuario])->with('success', $usuario->nome . ' cadastrado com sucesso!');
    
    } 
return redirect()->route('index')->with('success', $usuario->nome.' cadastrado com sucesso!');
}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {

        $usuario2 = $usuario->with('user')->get();
        
       return view('usuario.show', ['usuario' => $usuario2->find($usuario)] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {

        $usuario2 = $usuario->with('user')->get();

        return view('usuario.edit', ['usuario' => $usuario2->find($usuario)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->update($request->all());
        return redirect()->route('usuario.index')->with('success', $usuario->nome.' atualizado com sucesso!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        if($usuario->destroy($usuario->id))
            return redirect()->route('usuario.index')->with('success', $usuario->nome . ' excluido com sucesso!');
else return redirect()->route('usuario.index')->with('danger', ' Erro ao Excluir o usuario: ' .$usuario->nome .'!');

    }
}
