<?php

namespace App\Http\Controllers;

use App\Models\Requisicao;
use App\Http\Requests\StoreRequisicaoRequest;
use App\Http\Requests\UpdateRequisicaoRequest;
use App\Models\Procedimento;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class RequisicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('requisicao.list', ['requisicoes' => Requisicao::all(),]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('requisicao.create', ['usuarios' => Usuario::all(),'procedimentos' => Procedimento::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequisicaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequisicaoRequest $request)
    {
        $request->merge([
            'user_id' =>  Auth::id(),
        ]);
        if (Requisicao::create($request->all())) {

            return redirect()->route('requisicao.index')->with('success', 'Requisicao registrado com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function show(Requisicao $requisicao)
    {
        $atendimento2 = $requisicao->with(['user', 'usuario'])->get();

        return view('requisicao.show', ['requisicao' => $atendimento2->find($requisicao), 'usuarios' => Usuario::all()]);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisicao $requisicao)
    {
        $atendimento2 = $requisicao->with(['user', 'usuario'])->get();

        return view('requisicao.edit', ['requisicao' => $atendimento2->find($requisicao), 'usuarios' => Usuario::all(), 'procedimentos' => Procedimento::all()]);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequisicaoRequest  $request
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequisicaoRequest $request, Requisicao $requisicao)
    {
        if ($requisicao->update($request->all())) {

            return redirect()->route('requisicao.index')->with('success', 'Requisicao atualizado com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisicao $requisicao)
    {
        if (Requisicao::destroy($requisicao->id))
            return redirect()->route('requisicao.index')->with('success', 'Requisicao excluido com sucesso!');
       
    }
}
