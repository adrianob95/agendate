@extends('layouts.template')

@section('title', config('app.name').' - Editar Requisição')
@section('pagina', 'Editar Requisição')
@section('pagina2', 'Editar Requisição')
@section('content')
<script>
    $('.alert').alert();
</script>
<div class="form-row">
    <div class="form-group col-md-12">
        <fieldset>
            <label for="nome" class="required">Nome: </label>
            <input readonly type="nome" value="{{$requisicao->usuario->nome}} - CPF: {{$requisicao->usuario->cpf}} - RG: {{$requisicao->usuario->rg}} - TITULO: {{$requisicao->usuario->titulo}} - COD={{$requisicao->usuario->id}}" onkeyup="up()" class="form-control" required name="nome" id="nome">
        </fieldset>
    </div>
</div>
<form action="" method="">


    <div id="corpo">
        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="datarecebido" class="required">Recebemos em</label>
                <input type="date" required name="datarecebido" readonly class="form-control" id="datarecebido" value="{{date('Y-m-d')}}">
            </div>



            <div class="form-group col-md-5">
                <label for="indicacao">Indicação</label>
                <input type="text" value="{{$requisicao->indicacao}}" readonly class="form-control" id="indicacao" name="indicacao" placeholder="Indicação/Motivo">
            </div>
            <div class="form-group col-md-5">
                <label for="procedimento" class="required">Procedimento</label>
                <input type="text" value="{{$requisicao->procedimento}}" readonly id="procedimento" name="procedimento" required class="form-control">

            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="obs">Descrição</label>
                <textarea rows="5" class="form-control" readonly name="obs" id="obs">{{$requisicao->obs}}</textarea>
            </div>
        </div>

    </div>
</form>
<h6 style="text-align: center;"><a id="btnnovo" class="btn btn-warning" href="{{route('situacao.show', $requisicao)}}">Verificar situação</a>
</h6>
    <h6 style="text-align: center;"><br>Requisição registrado por: {{$requisicao->user->name}} em {{ \Carbon\Carbon::parse($requisicao->created_at)->format('d/m/Y - H:i:s')}}</h6>



    @stop