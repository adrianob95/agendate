@extends('layouts.template')

@section('title', config('app.name').' - Cadastrar Usuario')
@section('pagina', 'Cadastrar Usuario')
@section('pagina2', 'Cadastrar Usuario')
@section('content')
<script>
    $('.alert').alert();
</script>

<form action="{{route('usuario.store') . '?url='.Request::query('url')}}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nome" class="required">Nome</label>
            <!-- <input type="text" value="{{ old('nome') }}" name="nome" class="form-control @error('nome') is-invalid @enderror"  placeholder="Numero do CPF"> -->

            <input name="nome" id="nome" type="text" value="{{ old('nome') }}" placeholder="Seu nome" class="form-control @error('nome') is-invalid @enderror" required>
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="hidden" class="form-control" name="user_id" id="user_id">
        </div>
        <div class="form-group col-md-3">
            <label for="cpf">CPF</label>
            <input type="text" value="{{ old('cpf') }}" name="cpf" class="form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="Numero do CPF">
            @error('cpf')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-3">
            <label for="datarecebido">RG</label>
            <input type="text" name="rg" value="{{ old('rg') }}" class="form-control @error('rg') is-invalid @enderror" id="rg" placeholder="Numero do RG">
            @error('rg')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class=" form-row">
        <div class="form-group col-md-3">
            <label for="titulo">Titulo de Eleitor</label>
            <input type="text" value="{{ old('titulo') }}" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo" placeholder="Titulo de Eleitor">
            @error('titulo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="sus">N° Cartão do SUS</label>
            <input type="text" value="{{ old('sus') }}" class="form-control @error('sus') is-invalid @enderror" name="sus" id="sus" placeholder="N° do CNS">
            @error('sus')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-6">
            <label for="endereco">Endereço</label>
            <input type="text" value="{{ old('endereco') }}" class="form-control @error('endereco') is-invalid @enderror" name="endereco" id="endereco" placeholder="Seu endereço completo">
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
        <div class="form-group col-md-2">
            <label for="titulo">Data de nascimento</label>
            <input type="date" value="{{ old('datanascimento') }}" class="form-control @error('datanascimento') is-invalid @enderror" name="datanascimento" id="datanascimento" placeholder="Data de nacimento">
            @error('datanascimento')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-5">
            <label for="contato">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-2">
            <label for="endereco">Senha</label>
            <input type="text" value="{{ old('senha') }}" class="form-control @error('senha') is-invalid @enderror" name="senha" id="senha" placeholder="Senha">
            @error('senha')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-md-3">
            <label for="contato">Contato (ex. 75981000000)</label>
            <input type="tel" name="contato" value="{{ old('contato') }}" class="form-control @error('contato') is-invalid @enderror" pattern="[0-9]{11}$" id="contato" placeholder="Celular">
            @error('contato')
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
            <input type="text" value="{{ old('pai') }}" class="form-control @error('pai') is-invalid @enderror" name="pai" id="pai" placeholder="Nome do pai">
            @error('pai')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="contato">Nome completo da mãe</label>
            <input type="text" name="mae" value="{{ old('mae') }}" class="form-control @error('mae') is-invalid @enderror" id="mae" placeholder="Nome da mãe">
            @error('email')
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
            <textarea rows="5" class="form-control" name="obs" id="obs">{{old('obs')}}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar Usuario</button>
</form>
<script>
    var usuarioid = "{{Request::query('usuarioid')}}";

    if (/^\d+$/.test(usuarioid)) {
        if (usuarioid.length == 11) {
            document.getElementById('cpf').value = usuarioid;

        } else if (usuarioid.length == 10) {
            document.getElementById('rg').value = usuarioid;

        } else if (usuarioid.length == 12) {
            document.getElementById('titulo').value = usuarioid;

        } else document.getElementById('nome').value = usuarioid;

    } else document.getElementById('nome').value = usuarioid;
</script>
@stop