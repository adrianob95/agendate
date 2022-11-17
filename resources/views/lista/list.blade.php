@extends('layouts.template')

@section('title', config('app.name')." - Exibir Lista")
@section('pagina', 'Exibir Lista')
@section('pagina2', 'Exibir Lista')

@section('content')
<div class="container mt-3">
    <h2>Tabela de Lista</h2>
    <p>
        Digite algo no campo de entrada abaixo para pesquisar na tabela:
    </p>
    <input class="form-control" id="myInput" type="text" placeholder="Procurar..">
    <br>
    <div class="form-group col-md-12" style="text-align: center;">

        <a class="btn btn-success" style="align: center;" href="{{route('listas.create')}}">Novo lista</a>
    </div>
    <table class="table table-bordered table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th>Mes/Ano</th>
                <th>Descrição</th>
                <th>Registro</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($listas as $lista)
            <tr>
                <td>{{\Carbon\Carbon::parse('01-'.$lista->mes.'-'.$lista->ano)->translatedFormat('F/Y')}}</td>
                <td>{{$lista->descricao}}</td>

                <td>
                    {{ \Carbon\Carbon::parse($lista->created_at)->format('d/m/Y - H:i:s')}} por {{$lista->user->name}}
                </td>
                <td> <a title="Detalhes do lista" style="display: inline-block;" href="{{route('listas.relacionar', $lista->id)}}"><i class="bi bi-eye" style="font-size: 1.4rem; color: blue; padding: 0.3rem;"></i></a>
                    <a title="Editar lista" style="display: inline-block;" href="{{route('listas.edit', $lista->id)}}"><i class="bi-pencil" style="font-size: 1.4rem; color: green;"></i></a>

                    <button title="Exluir lista" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="{{route('listas.destroy', $lista->id)}}"><i class="bi-trash" style="font-size: 1.4rem; color: red;"></i></button>
                    <!-- <a style="display: inline-block;" title="Alterar a situação" href=""><i class="bi bi-list-ol" style="font-size: 1.4rem; color: black;"></i></a> -->
                </td>
            </tr>

            @endforeach



        </tbody>
    </table>

</div>
<style>
    table button {
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
    }
</style>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <label for="recipient-name" class="col-form-label"><b>Tem certeza que deseja deletar este lista? </b><br>Esta ação não poderá ser desfeita!</label>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <form name="formdel" action="" id="formmodal" method="post" style="display: inline-block;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary" type="button" onclick="enviar();" id="deletarbtn">Excluir lista</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)

        // var ac = "route('listas.destroy', '" + recipient + "')"

        // $('#formdel').attr('action', recipient)
        document.formdel.action = recipient;
        // $('#formmodal').attr('action', ac + '/' + recipient)
    })

    function enviar() {

        document.formdel.submit();
    }
</script>

@stop