@extends('admin.main')

@section('page-title')
    Eventos Cadastrados
@endsection

@section('page-caminho')
    Eventos
@endsection

@section('styles')
    <!-- Sweet Alert css -->
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .mce-notification.mce-in {
            display: none;!important;
        }
    </style>
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
                    <th>Foto principal</th>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Descrição</th>
                    <th>Slug</th>
                    <th>Data publicação</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody id="banner">
                @forelse($eventos as $evento)
                    <tr id={{$evento->id}}>
                        <td width="1%">
                            {{ $evento->id }}
                        </td>
                        <td width="14%">
                            <img width="100px" src="{{ asset('uploads/eventos/'.$evento->foto) }}">
                        </td>
                        <td>
                            {{ $evento->titulo }}
                        </td>
                        <td>
                            {{ $evento->sub_titulo }}
                        </td>
                        <td>
                            {!! strlen($evento->descricao) > 100 ? substr($evento->descricao, 0 ,100)." ..." : $evento->descricao !!}
                        </td>
                        <td>
                            {{ $evento->slug }}
                        </td>
                        <td>
                            {{ $evento->data_evento->format('d/m/Y') }}
                        </td>
                        <td>
                            {{ $evento->categoria->nome }}
                        </td>
                        <td width="15%">
                            <span class="hint--top" aria-label="Editar evento">
                                <a href="{{ route('eventos.edit', $evento->id) }}" style="border-radius: 50%"
                                   class="btn btn-warning waves-effect">
                                    <i class="fa fa-pencil m-r-5"></i>
                                </a>
                            </span>
                            <span class="hint--top" aria-label="Mostrar evento">
                                <a href="{{ route('eventos.show', $evento->id) }}" style="border-radius: 50%"
                                   class="btn btn-instagram waves-effect">
                                    <i class="fa fa-eye m-r-5"></i>
                                </a>
                            </span>
                            <span class="hint--top" aria-label="Deletar evento">
                                <button type="button" onclick="goswet({{$evento->id}})"
                                        style="border-radius: 50%"
                                        class="btn btn-danger waves-effect">
                                    <i class="fa fa-trash m-r-5"></i>
                                </button>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Nenhum Item cadastrado</td>
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
                    <h4 class="modal-title">Cadastrar eventos</h4>
                </div>
                <form enctype="multipart/form-data"
                      action="{{ route('eventos.store') }}"
                      class="form"
                      method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="file" name="foto" id="foto" class="filestyle"
                                       data-buttonText="Carregar" data-placeholder="Resolução ideal"
                                       data-btnClass="btn-light" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="titulo">Título:</label>
                                <input placeholder="Preencha este campo" name="titulo" id="titulo"
                                       class="form-control" autofocus required
                                       maxlength="250" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sub_titulo">Subtítulo:</label>
                                <input placeholder="Preencha este campo" name="sub_titulo" id="sub_titulo"
                                       class="form-control" autofocus
                                       maxlength="250" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">Categoria:</label>
                                <select name="categoria_id" id="categoria_id" class="form-control" required>
                                    <option selected value="" disabled>Selecione uma opção</option>
                                    @foreach(\App\Models\Categorias::all() as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="data_evento">Data evento:</label>
                                <input placeholder="Preencha este campo" name="data_evento" id="data_evento"
                                       class="form-control" autofocus required
                                       maxlength="250" type="date">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="descricao">Descrição:</label>
                                <textarea name="descricao" id="descricao"
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
    <script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script type="text/javascript">
  $(document).ready(function () {
    if($("#descricao").length > 0){
      tinymce.init({
        selector: "#descricao",
        theme: "modern",
        height:200,
        plugins: [
          "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
          "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
          "save table contextmenu directionality emoticons template paste textcolor"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
          {title: 'Bold text', inline: 'b'},
          {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
          {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
          {title: 'Example 1', inline: 'span', classes: 'example1'},
          {title: 'Example 2', inline: 'span', classes: 'example2'},
          {title: 'Table styles'},
          {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
      });
    }
  });

    </script>




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
        title: "Deseja excluir evento?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    }).then(
      function(){
        $.ajax({
          type: "DELETE",
          url: "{{ url('admin/eventos') }}/"+id,
          data: {
             'id': id,
             _token: $("[name='_token']").val(),
          },
          success: function(data){
            swal({
             title: "Evento deletado!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
            function(){
             },
             function(){
               window.location = "{{ route('eventos.index') }}";
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
