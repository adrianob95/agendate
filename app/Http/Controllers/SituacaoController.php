<?php

namespace App\Http\Controllers;

use App\Models\Requisicao;
use App\Models\Situacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SituacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Requisicao $requisicao)
    {
        return view('situacao.create', ['requisicao' => $requisicao]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Requisicao $requisicao)
    {
        
        $request->merge([
            'user_id' =>  Auth::id(),
            'requisicao_id' =>  $requisicao->id,
        ]);
        if (Situacao::create($request->all())) {

            return redirect()->route('situacao.show', $requisicao )->with('success', 'Situação atualizada com sucesso!');
        } else
            return redirect()
                ->back()
                ->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Situacao  $situacao
     * @return \Illuminate\Http\Response
     */
    public function show(Requisicao $requisicao)
    {
        return view('situacao.show', ['requisicao' => $requisicao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Situacao  $situacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Situacao $situacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Situacao  $situacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Situacao $situacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Situacao  $situacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Situacao $situacao)
    {
        //
    }
}
