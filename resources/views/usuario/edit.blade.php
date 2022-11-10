@extends('layouts.template')

@section('title', config('app.name').' - Editar Usuario')
@section('pagina', 'Editar Usuario')
@section('pagina2', 'Editar Usuario')
@section('content')
<script>
    $('.alert').alert();
</script>

<form action="{{route('usuario.update', $usuario)}}" method="post">
    @method('PUT')
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nome" class="required">Nome</label>
            <input name="nome" type="text" value="@if(old('nome')){{ old('nome') }}@else {{ $usuario->nome }}@endif" placeholder="Seu nome" class="form-control {{$errors->any() ? ($errors->has('nome') ? 'is-invalid' : 'is-valid') : '' }}" required>
            <!-- <input type="hidden" class="form-control" name="user_id" id="user_id"> -->
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group col-md-3">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" value="@if(old('cpf')){{ old('cpf') }}@else{{ $usuario->cpf }}@endif" class="form-control {{$errors->any() ? ($errors->has('cpf') ? 'is-invalid' : 'is-valid') : '' }}" id="cpf" placeholder="Numero do CPF">
            @error('cpf')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="datarecebido">RG</label>
            <input type="text" name="rg" value="@if(old('rg')){{ old('rg') }}@else{{ $usuario->rg }}@endif" class="form-control {{$errors->any() ? ($errors->has('rg') ? 'is-invalid' : 'is-valid') : '' }}" id="rg" placeholder="Numero do RG">
            @error('rg')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class=" form-row">
        <div class="form-group col-md-3">
            <label for="titulo">Titulo de Eleitor</label>
            <input type="text" name="titulo" value="@if(old('titulo')){{ old('titulo') }}@else{{ $usuario->titulo }}@endif" class="form-control {{$errors->any() ? ($errors->has('titulo') ? 'is-invalid' : 'is-valid') : '' }}" name="titulo" id="titulo" placeholder="Titulo de Eleitor">
            @error('titulo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="contato">Contato (ex. 75981000000)</label>
            <input type="tel" name="contato" value="@if(old('contato')){{ old('contato') }}@else{{ $usuario->contato }}@endif" class="form-control {{$errors->any() ? ($errors->has('contato') ? 'is-invalid' : 'is-valid') : '' }}" pattern="[0-9]{11}$" id="contato" placeholder="Apenas numero com DDD e 9">
            @error('contato')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control {{$errors->any() ? ($errors->has('endereco') ? 'is-invalid' : 'is-valid') : '' }}" value="@if(old('endereco')){{ old('endereco') }}@else{{ $usuario->endereco }}@endif" name=" endereco" id="endereco" placeholder="Seu endereço completo">
            @error('endereco')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- <div class="form-group col-md-2">
            <label for="cidade" class="required">Cidade</label>
            <input type="text" class="form-control" required name="cidade" id="cidade" placeholder="Cidade" value="Santo Amaro">
        </div>
        <div class="form-group col-md-2">
            <label for="cep" class="required">CEP</label>
            <input type="text" placeholder="44200000" name="cep" required class="form-control" value="44200000" id="cep">
        </div> -->
    </div>

    <div class=" form-row">
        <div class="form-group col-md-3">
            <label for="titulo">Data de nascimento</label>
            <input type="date" value="@if(old('datanascimento')){{ old('datanascimento') }}@else{{ $usuario->datanascimento }}@endif" class="form-control {{$errors->any() ? ($errors->has('datanascimento') ? 'is-invalid' : 'is-valid') : '' }}" name="datanascimento" id="datanascimento" placeholder="Data de nacimento">
            @error('datanascimento')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-5">
            <label for="contato">Email</label>
            <input type="email" name="email" value="@if(old('email')){{ old('email') }}@else{{ $usuario->email }}@endif" class="form-control {{$errors->any() ? ($errors->has('email') ? 'is-invalid' : 'is-valid') : '' }}" id="email" placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-4">
            <label for="endereco">Senha</label>
            <input type="password" value="@if(old('senha')){{ old('senha') }}@else{{ $usuario->senha }}@endif" class="form-control {{$errors->any() ? ($errors->has('senha') ? 'is-invalid' : 'is-valid') : '' }}" name="senha" id="senha" placeholder="Senha">
            @error('senha')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- <div class="form-group col-md-2">
            <label for="cidade" class="required">Cidade</label>
            <input type="text" class="form-control" required name="cidade" id="cidade" placeholder="Cidade" value="Santo Amaro">
        </div>
        <div class="form-group col-md-2">
            <label for="cep" class="required">CEP</label>
            <input type="text" placeholder="44200000" name="cep" required class="form-control" value="44200000" id="cep">
        </div> -->
    </div>


    <div class=" form-row">
        <div class="form-group col-md-6">
            <label for="titulo">Nome completo do pai</label>
            <input type="text" value="@if(old('pai')){{ old('pai') }}@else{{ $usuario->pai }}@endif" class="form-control {{$errors->any() ? ($errors->has('pai') ? 'is-invalid' : 'is-valid') : '' }}" name="pai" id="pai" placeholder="Nome do pai">
            @error('pai')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="contato">Nome completo da mãe</label>
            <input type="text" name="mae" value="@if(old('mae')){{ old('mae') }}@else{{ $usuario->mae }}@endif" class="form-control {{$errors->any() ? ($errors->has('mae') ? 'is-invalid' : 'is-valid') : '' }}" id="mae" placeholder="Nome da mãe">
            @error('mae')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- <div class="form-group col-md-2">
            <label for="cidade" class="required">Cidade</label>
            <input type="text" class="form-control" required name="cidade" id="cidade" placeholder="Cidade" value="Santo Amaro">
        </div>
        <div class="form-group col-md-2">
            <label for="cep" class="required">CEP</label>
            <input type="text" placeholder="44200000" name="cep" required class="form-control" value="44200000" id="cep">
        </div> -->
    </div>




    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="obs">Observação</label>
            <textarea rows="5" class="form-control {{$errors->any() ? ($errors->has('obs') ? 'is-invalid' : 'is-valid') : '' }}" name=" obs" id="obs">@if(old('obs')){{ old('obs') }}@else{{ $usuario-> obs }}@endif</textarea>
            @error('obs')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <h6>Cadastrado por: {{$usuario->user->name}}<br><br></h6>

    <button type="submit" class="btn btn-primary">Editar Usuario</button>


</form>

@stop