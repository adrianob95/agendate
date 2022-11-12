@extends('layouts.template')

@section('title', config('app.name').' - Mostrar Usuario')
@section('pagina', 'Mostrar Usuario')
@section('pagina2', 'Mostrar Usuario')
@section('content')
<script>
    $('.alert').alert();
</script>

<form action="{{route('usuario.store')}}" method="post">

    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nome" class="required">Nome</label>
            <input type="nome" readonly class="form-control" required name="nome" id="nome" placeholder="Nome do Usuario" value="{{$usuario->nome}}">

        </div>
        <div class="form-group col-md-3">
            <label for="cpf">CPF</label>
            <input type="text" readonly name="cpf" value="{{$usuario->cpf}}" class=" form-control" id="cpf" placeholder="Numero do CPF">
        </div>
        <div class="form-group col-md-3">
            <label for="datarecebido">RG</label>
            <input type="text" readonly name="rg" value="{{$usuario->rg}}" class=" form-control" id="rg" placeholder="Numero do RG">
        </div>
    </div>
    <div class=" form-row">
        <div class="form-group col-md-3">
            <label for="titulo">Titulo de Eleitor</label>
            <input type="text" name="titulo" readonly value="{{$usuario->titulo}}" class=" form-control" name="titulo" id="titulo" placeholder="Titulo de Eleitor">
        </div>
        <div class="form-group col-md-3">
            <label for="sus">N° Cartão do SUS</label>
            <input type="text" readonly value="{{$usuario->sus}}" class="form-control" name="sus" id="sus" placeholder="N° do CNS">
        </div>
        <div class="form-group col-md-6">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control " readonly value="{{$usuario->endereco}}" name=" endereco" id="endereco" placeholder="Seu endereço completo">
        </div>
    </div>
    <div class=" form-row">
        <div class="form-group col-md-2">
            <label for="titulo">Data de nascimento</label>
            <input type="date" readonly value="{{$usuario->datanascimento}}" class="form-control" name="datanascimento" id="datanascimento" placeholder="Data de nacimento">
        </div>
        <div class="form-group col-md-5">
            <label for="contato">Email</label>
            <input type="email" name="email" readonly value="{{$usuario->email}}" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group col-md-2">
            <label for="endereco">Senha</label>
            <input type="text" readonly value="{{$usuario->senha}}" class="form-control" name="senha" id="senha" placeholder="Senha">
        </div>
        <div class="form-group col-md-3">
            <label for="contato">Contato (ex. 75981000000)</label>
            <input type="tel" name="contato" readonly value="{{$usuario->contato}}" class="form-control" pattern="[0-9]{11}$" id="contato" placeholder="Apenas numero com DDD e 9">
        </div>
    </div>
    <div class=" form-row">
        <div class="form-group col-md-6">
            <label for="titulo">Nome completo do pai</label>
            <input type="text" readonly value="{{$usuario->pai}}" class="form-control" name="pai" id="pai" placeholder="Nome do pai">
        </div>
        <div class="form-group col-md-6">
            <label for="contato">Nome completo da mãe</label>
            <input type="text" name="mae" readonly value="{{$usuario->mae}}" class="form-control" id="mae" placeholder="Nome da mãe">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="obs">Observação</label>
            <textarea rows="5" readonly class="form-control" name=" obs" id="obs">{{$usuario->obs}}</textarea>
        </div>
    </div>
    <h5>Cadastrado por: {{$usuario->user->name}}</h5>
</form>

@stop