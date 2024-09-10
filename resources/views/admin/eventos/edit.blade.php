@extends('admin.main')

@section('page-title')
    Editar evento {{ $evento->id }}
@endsection

@section('page-caminho')
    Evento
@endsection

@section('styles')
    <!-- Sweet Alert css -->
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .mce-notification.mce-in {
            display: none;!important;
        }
    </style>
@endsection
@section('content')
    <div class="col-12">
        <div class="card-box">
            <form enctype="multipart/form-data"
                  action="{{ route('eventos.update', ['evento' => $evento->id])}}"
                  class="form"
                  method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <img width="400px" src="{{ asset('uploads/eventos/'.$evento->foto) }}">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="file" name="foto" id="foto" class="filestyle"
                                       data-buttonText="Carregar" data-placeholder="{!! $evento->foto !!}"
                                       data-btnClass="btn-light">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="titulo">Título:</label>
                                <input placeholder="Preencha este campo" name="titulo" id="titulo"
                                       class="form-control" autofocus required
                                       maxlength="250" type="text" value="{{ $evento->titulo }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sub_titulo">Subtítulo:</label>
                                <input placeholder="Preencha este campo" name="sub_titulo" id="sub_titulo"
                                       class="form-control" autofocus
                                       maxlength="250" type="text" value="{{ $evento->sub_titulo }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="title">Categoria:</label>
                                <select name="categoria_id" id="categoria_id" class="form-control" required>
                                    <option selected value="" disabled>
                                        Selecione uma opção
                                    </option>
                                    @foreach(\App\Models\Categorias::all() as $categoria)
                                        <option {{ $categoria->id == $evento->categoria_id ? 'selected' : '' }}
                                                value="{{ $categoria->id }}">
                                            {{ $categoria->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="data_evento">Data evento:</label>
                                <input placeholder="Preencha este campo" name="data_evento" id="data_evento"
                                       class="form-control" autofocus required
                                       maxlength="250" type="date" value="{{ $evento->data_evento->format('Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="descricao">Descrição:</label>
                                <textarea name="descricao" id="descricao" autofocus
                                          cols="30" rows="10" class="form-control"
                                >{{ $evento->descricao }}</textarea>
                            </div>
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
                                <a href="{{ route('eventos.index') }}" class="btn btn-danger" data-dismiss="modal">
                                    <i class="fa fa-window-close m-r-5"></i>
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
@endsection

