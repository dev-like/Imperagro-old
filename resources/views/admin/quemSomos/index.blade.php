@extends('admin.main')

@section('page-title')
    Quem Somos
@endsection

@section('page-caminho')
    Quem Somos
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
            <form enctype="multipart/form-data"
                  action="{{ route('quemSomos.update', ['quemSomo' => $quemSomos->id])}}"
                  class="form"
                  method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nome_social">Razão Social:</label>
                            <input placeholder="Preencha este campo" name="nome_social" id="nome_social"
                                   class="form-control" autofocus
                                   maxlength="250" type="text" value="{{ $quemSomos->nome_social }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nome_fantasia">Nome Fantasia:</label>
                            <input placeholder="Preencha este campo" name="nome_fantasia" id="nome_fantasia"
                                   class="form-control" autofocus
                                   maxlength="250" type="text" value="{{ $quemSomos->nome_fantasia }}"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cnpj">CNPJ:</label>
                            <input placeholder="Preencha este campo" name="cnpj"
                                   class="form-control" autofocus
                                   maxlength="250" type="text" value="{{ $quemSomos->cnpj }}"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inscricao_estadual">Inscrição Estadual:</label>
                            <input placeholder="Preencha este campo" name="inscricao_estadual"
                                   class="form-control" autofocus
                                   maxlength="250" type="text" value="{{ $quemSomos->inscricao_estadual }}"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email">E-mail:</label>
                            <input placeholder="Preencha este campo" name="email"
                                   class="form-control" autofocus
                                   maxlength="250" type="text" value="{{ $quemSomos->email }}"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone">Telefone:</label>
                            <input placeholder="Preencha este campo" name="telefone"
                                   class="form-control" autofocus
                                   maxlength="250" type="text" value="{{ $quemSomos->telefone }}"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone2">Telefone 2:</label>
                            <input placeholder="Preencha este campo" name="telefone2"
                                   class="form-control" autofocus
                                   maxlength="250" type="text" value="{{ $quemSomos->telefone2 }}"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="facebook">Facebook:</label>
                            <input placeholder="Preencha este campo" name="facebook"
                                   class="form-control" autofocus
                                   maxlength="250" type="url" value="{{ $quemSomos->facebook }}"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="instagram">Instagram:</label>
                            <input placeholder="Preencha este campo" name="instagram"
                                   class="form-control" autofocus
                                   maxlength="250" type="url" value="{{ $quemSomos->instagram }}"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="linkedin">Linkedin:</label>
                            <input placeholder="Preencha este campo" name="linkedin"
                                   class="form-control" autofocus
                                   maxlength="250"
                                   type="url" value="{{ $quemSomos->linkedin }}"
                            />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="youtube">Youtube:</label>
                            <input placeholder="Preencha este campo" name="youtube" id="youtube"
                                   class="form-control" autofocus
                                   maxlength="250"
                                   type="url" value="{{ $quemSomos->youtube ?? '' }}"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="video_youtube">Youtube link Vídeo:</label>
                            <input placeholder="Preencha este campo" name="video_youtube" id="video_youtube"
                                   class="form-control" autofocus
                                   maxlength="250"
                                   type="url" value="{{ $quemSomos->video_youtube ?? '' }}"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="missao">Missão:</label>
                            <textarea name="missao" id="missao" autofocus cols="30" rows="10" class="form-control"
                            >{{ $quemSomos->missao }}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="visao">Visão:</label>
                            <textarea name="visao" id="visao" autofocus cols="30" rows="10" class="form-control"
                            >{{ $quemSomos->visao }}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="valores">Valores:</label>
                            <textarea name="valores" id="valores" autofocus cols="30" rows="10" class="form-control"
                            >{{ $quemSomos->valores }}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="endereco_matriz">Endereço matriz:</label>
                            <input placeholder="Preencha este campo" name="endereco_matriz" id="endereco_matriz"
                                   class="form-control" autofocus
                                   maxlength="250"
                                   type="text" value="{{ $quemSomos->endereco_matriz }}"
                            />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="endereco_matriz_link">Endereço matriz Link Maps:</label>
                            <input placeholder="Preencha este campo" name="endereco_matriz_link"
                                   id="endereco_matriz_link"
                                   class="form-control" autofocus
                                   maxlength="500"
                                   type="url" value="{{ $quemSomos->endereco_matriz_link }}"
                            />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="endereco_filial">Endereço filial:</label>
                            <input placeholder="Preencha este campo" name="endereco_filial" id="endereco_filial"
                                   class="form-control" autofocus
                                   maxlength="250"
                                   type="text" value="{{ $quemSomos->endereco_filial }}"
                            />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endereco_filial_link">Endereço filial Link Maps:</label>
                            <input placeholder="Preencha este campo" name="endereco_filial_link"
                                   id="endereco_filial_link"
                                   class="form-control" autofocus
                                   maxlength="500"
                                   type="url" value="{{ $quemSomos->endereco_filial_link }}"
                            />
                        </div>

                        <div class="form-group col-md-12">
                            <label for="quemsomos">Quem Somos:</label>
                            <textarea name="quemsomos" id="quemsomos" autofocus cols="30" rows="10" class="form-control"
                            >{{ $quemSomos->quemsomos }}</textarea>
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
    if($("#quemsomos").length > 0){
      tinymce.init({
        selector: "#quemsomos",
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
