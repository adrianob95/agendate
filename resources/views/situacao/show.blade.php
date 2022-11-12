@extends('layouts.template')

@section('title', 'SEProc - histórico')
@section('pagina', 'Histórico da requisição')
@section('pagina2', 'Histórico da requisição')
@section('content')
<script>
    $('.alert').alert();
</script>

<h3>Paciente: {{$requisicao->usuario->nome}}</h3>
<h4>Procedimento: {{$requisicao->procedimento}}</h4>
<h5>Recebido em : {{\Carbon\Carbon::parse($requisicao->datarecebido)->format('d/m/Y')}} </h5>

<p class="droptext">
    <a class="font-weight-bold dropdown-toggle" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Detalhe da requisição
    </a>

</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <div class="container">
            <div class="row">
                <div class="col-4"><b>Motivo: </b>{{$requisicao->indicacao}}</div>
                <div class="col-4"><b>Recebido em: </b>{{\Carbon\Carbon::parse($requisicao->datarecebido)->format('d/m/Y')}}</div>
                <div class="col-3"><b>Contato: </b>{{$requisicao->usuario->contato}}</div>
                <div class="col-4"><b>Data de Nasc.: </b>{{\Carbon\Carbon::parse($requisicao->usuario->datanascimento)->format('d/m/Y')}}</div>
                <div class="col-6"><b>Endereço: </b>{{$requisicao->usuario->endereco}}</div>
                <div class="col-12"><br><b>Observação: </b>{{$requisicao->obs}}</div>

            </div>
        </div>
    </div>
</div>


<p class="dropsituacao">
    <a class="font-weight-bold dropdown-toggle" data-bs-toggle="collapse" href="#situacoes" role="button" aria-expanded="false" aria-controls="collapseExample">
        VERIFICAR SITUAÇÃO
    </a>

</p>
<div class="collapse" id="situacoes">
    <div class="card card-body">

        @if($requisicao->situacao)
        @foreach($requisicao->situacao as $situacao)


        <p class="">
            <a class="font-weight-bold dropdown-toggle" data-bs-toggle="collapse" href="#col{{$situacao->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                {{$situacao->situacao}}
            </a>

        </p>
        <div class="collapse" id="col{{$situacao->id}}">
            <div class="card card-body">
                <div class="card card-body">
                    <div class="container">
                        <div class="row">

                            <div class="col-3"><b>Dia: </b>{{\Carbon\Carbon::parse($situacao->data)->format('d/m/Y')}}</div>
                            <div class="col-12"><b>Descrição: </b>{{$situacao->descricao}}</div>
                            <div class="col-12"><b>Registrada por:</b> {{$situacao->user->name}}</div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        @endforeach

        <h7>Recebido em: {{$requisicao->datarecebido}} </h7>

        @endif

    </div>
</div>

@stop