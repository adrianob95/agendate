@extends('layouts.template')

@section('title', config('app.name').' - Cadastrar nova lista')
@section('pagina', 'Cadastrar nova lista')
@section('pagina2', 'Cadastrar nova lista')
@section('content')
<script>
    $('.alert').alert();
</script>

<form action="{{route('listas.store')}}" method="post">
    @csrf

    <input type="hidden" class="form-control" name="user_id" id="user_id">


    <div id="corpo">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="obs">Mês da lista</label>
                <select name="mes" class="form-control" id="atendimento">
                    @for($i=1; $i<13; $i++) <option @if(\Carbon\Carbon::parse('01-'.$i.'-2022')->translatedFormat('m') == date('m')) selected @endif value="{{ \Carbon\Carbon::parse('01-'.$i.'-2022')->translatedFormat('m')}}">{{ \Carbon\Carbon::parse('01-'.$i.'-2022')->translatedFormat('F')}}</option>
                        <!-- <option value="02">Fevereiro</option>
                    <option value="03">Março</option>
                    <option value="04">Abril</option>
                    <option value="05">Maio</option>
                    <option value="06">Junho</option>
                    <option value="07">Julho</option>
                    <option value="08">Agosto</option>
                    <option value="09">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option> -->
                        @endfor </select>

            </div>
            <div class="form-group col-md-5">
                <label for="obs">Ano da lista</label>
                <input type="text" class="form-control" required name="ano" id="ano" value="{{date('Y')}}">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="obs">Descrição</label>
                <textarea rows="5" class="form-control" name="descricao" id="descricao"></textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Criar Lista</button>
    </div>
</form>

@stop