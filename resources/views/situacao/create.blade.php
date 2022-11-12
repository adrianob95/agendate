@extends('layouts.template')

@section('title', 'SEProc - Registrar nova situação')
@section('pagina', 'Registrar nova situação da requisição')
@section('pagina2', 'Nova situação')
@section('content')
<script>
    $('.alert').alert();
</script>
<h3>Paciente: {{$requisicao->usuario->nome}}</h3>
<h4>Procedimento: {{$requisicao->procedimento}}</h4>
<h5>Recebido em : {{\Carbon\Carbon::parse($requisicao->datarecebido)->format('d/m/Y')}} </h5>
<form action="{{route('situacao.store', $requisicao)}}" style="margin-top: 3em;" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="situacao" class="required">Situacao</label>
            <select class="form-control" required name="situacao" id="situacao">
                <option value="Marcado"></option>
                <option value="Marcado">Marcado</option>
                <option value="Comunicado">Comunicado</option>
                <option value="Aguardando vaga">Aguardando vaga</option>
                <option value="Falta documento/Pendencias">Falta documento/Pendencias</option>
                <option value="Regulado">Regulado</option>
                <option value="Entregue ao paciente">Entregue ao paciente</option>
                <option value="Não identificado">Não identificado</option>
                <option value="Não faz">Não faz</option>
                <option value="Outro">Outro (use o campo abaixo para descrever)</option>
            </select>

        </div>
        <div class="form-group col-md-6">
            <label for="data">Insira a data da situação</label>
            <input type="date" name="data" required class="form-control" id="data" value="{{date('Y-m-d')}}">
        </div>
    </div>





    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="descricao">Observação / Descrição</label>
            <textarea rows="5" class="form-control" name="descricao" id="descricao"></textarea>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Atualizar Situação</button>
</form>

@stop