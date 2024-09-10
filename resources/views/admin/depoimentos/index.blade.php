@extends('admin.main')

@section('page-title')
    Depoimentos Cadastrados
@endsection

@section('page-caminho')
    Depoimentos
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Sweet Alert css -->
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="col-12">
        <div class="card-box">
            <a data-toggle="modal" data-target="#modal-default" style="margin-bottom: 15px"
               class="btn btn-info waves-effect waves-light pull-right">
                <i class="fa fa-plus m-r-5">
                </i> Adicionar</a>
            <table class="table table-striped" id="tabela">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Profissão</th>
                    <th>Texto</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody id="banner">
                @forelse($depoimentos as $depoimento)
                    <tr id={{$depoimento->id}}>
                        <td width="1%">
                            {{ $depoimento->id }}
                        </td>
                        <td width="15%">
                            <img width="400px" src="{{ asset('uploads/depoimentos/'.$depoimento->foto) }}">
                        </td>
                        <td>
                            {{ $depoimento->nome }}
                        </td>
                        <td>
                            {{ $depoimento->profissao }}
                        </td>
                        <td>
                            {{ $depoimento->texto }}
                        </td>
                        <td width="10%">
                            <span class="hint--top" aria-label="Editar depoimento">
                                <a href="{{ route('depoimentos.edit', $depoimento->id) }}" style="border-radius: 50%"
                                   class="btn btn-warning waves-effect">
                                    <i class="fa fa-pencil m-r-5"></i>
                                </a>
                            </span>
                            <span class="hint--top" aria-label="Deletar depoimento">
                                <button type="button" onclick="goswet({{$depoimento->id}})"
                                        style="border-radius: 50%"
                                        class="btn btn-danger waves-effect">
                                    <i class="fa fa-trash m-r-5"></i>
                                </button>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhum Item cadastrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Cadastrar depoimentos</h4>
                </div>
                <form enctype="multipart/form-data"
                      action="{{ route('depoimentos.store') }}"
                      class="form"
                      method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="file" name="foto" id="foto" class="filestyle"
                                       data-buttonText="Carregar" data-placeholder="Resolução ideal"
                                       data-btnClass="btn-light" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome">Nome:</label>
                                <input placeholder="Preencha este campo" name="nome" id="nome"
                                       class="form-control" autofocus required
                                       maxlength="250" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="profissao">Profissão:</label>
                                <input placeholder="Preencha este campo" name="profissao" id="profissao"
                                       class="form-control" autofocus required
                                       maxlength="250" type="text">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="texto">Texto:</label>
                                <textarea name="texto" id="texto" autofocus required
                                          cols="30" rows="10" class="form-control"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row" style="margin-top: 20px">
                            <div class="col-12">
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit" value="Salvar">
                                        <i class="fa fa-save m-r-5"></i>
                                        Salvar
                                    </button>
                                    <button class="btn btn-danger" data-dismiss="modal">
                                        <i class="fa fa-window-close m-r-5"></i>
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('template/plugins/switchery/switchery.min.js') }}" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>



<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  function goswet(id){
    swal.setDefaults({
      reverseButtons: true
    })
    swal({
        title: "Deseja excluir Depoimento?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    }).then(
      function(){
        $.ajax({
          type: "DELETE",
          url: "{{ url('admin/depoimentos') }}/"+id,
          data: {
             'id': id,
             _token: $("[name='_token']").val(),
          },
          success: function(data){
            swal({
             title: "Depoimento deletado!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
            function(){
             },
             function(){
               window.location = "{{ route('depoimentos.index') }}";
             }
           );
          },
          error: function(xhr,status, data) {
            swal("Não foi possível deletar item");
          }

        });
      }
    );
  }
    </script>
@endsection
