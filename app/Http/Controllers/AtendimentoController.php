<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('atendimento.list', ['atendimentos' => Atendimento::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atendimento.create', ['usuarios' => Usuario::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAtendimentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAtendimentoRequest $request)
    {
        $request->merge([
            'user_id' =>  Auth::id(),
        ]);
        if(Atendimento::create($request->all())){
            
            return redirect()->route('atendimento.index')->with('success', 'Atendimento registrado com sucesso!');
        } else
        return redirect()
            ->back()
            ->withInput($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function show(Atendimento $atendimento)
    {
        $atendimento2 = $atendimento->with(['user', 'usuario'])->get();

        return view('atendimento.show', ['atendimento' => $atendimento2->find($atendimento), 'usuarios' => Usuario::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Atendimento $atendimento)
    {
        $atendimento2 = $atendimento->with(['user', 'usuario'])->get();

        return view('atendimento.edit', ['atendimento' => $atendimento2->find($atendimento), 'usuarios' => Usuario::all()]);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAtendimentoRequest  $request
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento)
    {

        
        if ($atendimento->update($request->all())) {

            return redirect()->route('atendimento.index')->with('success', 'Atendimento atualizado com sucesso!');
        } else
        return redirect()
            ->back()
            ->withInput($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atendimento $atendimento)
    {
       if(Atendimento::destroy($atendimento->id))
        return redirect()->route('atendimento.index')->with('success', 'Atendimento excluido com sucesso!');
       
    }
}
