@extends('admin.main')

@section('page-title')
    Galeria do evento {{ $evento->id }}
@endsection

@section('page-caminho')
    Eventos
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Sweet Alert css -->
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/css/dropzone.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="col-12">
        <div class="card-box">
            <div class="col-md-12 mb-3">
                <h2>Imagens</h2>
                <form enctype="multipart/form-data"
                      action="{{ route('galeria.store') }}"
                      class="dropzone"
                      id="dropzone"
                      method="post">
                    @csrf
                    <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                </form>
            </div>
            <a style="margin-bottom: 15px" href="{{ route('eventos.index') }}"
               class="btn btn-instagram waves-effect waves-light pull-left">
                Volta
            </a>
            <button class="btn btn-success pull-right" id="submit-all" onclick="window.location.reload()">
                <i class="fa fa-save m-r-5"></i>
                Salvar
            </button>
            <table class="table table-striped" id="tabela">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody id="banner">
                @forelse($evento->galeria as $galeria)
                    <tr id={{$galeria->id}}>
                        <td width="1%">
                            {{ $galeria->id }}
                        </td>
                        <td width="14%">
                            <img width="500px" src="{{ asset('uploads/galeria/'.$galeria->file) }}">
                        </td>
                        <td width="15%">
                            <span class="hint--top" aria-label="Deletar galeria">
                                <button type="button" onclick="goswet({{$galeria->id}})"
                                        style="border-radius: 50%"
                                        class="btn btn-danger waves-effect">
                                    <i class="fa fa-trash m-r-5"></i>
                                </button>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum Item cadastrado</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('template/plugins/switchery/switchery.min.js') }}" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{ asset('template/js/dropzone.js') }}"></script>
    <script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>


    <script type="text/javascript">
Dropzone.options.dropzone = {
  url: "{{ route('galeria.store') }}",
  autoProcessQueue: true,
  acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
  maxFilesize: 5,
  parallelUploads: 50,
  dictDefaultMessage: "Clique ou arraste as fotos aqui, limite de 50 fotos por vez. Tamanho máximo de imagem 2900 x 2900 ",
  dictRemoveFile: "Remover foto",
  addRemoveLinks: true
};
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
        title: "Deseja excluir galeria?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    }).then(
      function(){
        $.ajax({
          type: "DELETE",
          url: "{{ url('admin/eventos/galeria') }}/"+id,
          data: {
             'id': id,
             _token: $("[name='_token']").val(),
          },
          success: function(data){
            swal({
             title: "Galeria deletada!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
            function(){
             },
             function(){
               window.location = "{{ route('eventos.show', ['evento' => $evento->id]) }}";
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
