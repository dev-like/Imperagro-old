@extends('admin.main')

@section('page-title')
    Editar depoimento {{ $depoimento->id }}
@endsection

@section('page-caminho')
    Depoimento
@endsection

@section('styles')
    <!-- Sweet Alert css -->
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="col-12">
        <div class="card-box">
            <form enctype="multipart/form-data"
                  action="{{ route('depoimentos.update', ['depoimento' => $depoimento->id])}}"
                  class="form"
                  method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <img width="400px" src="{{ asset('uploads/depoimentos/'.$depoimento->foto) }}">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="file" name="foto" id="foto" class="filestyle"
                                   data-buttonText="Carregar"
                                   data-btnClass="btn-light"
                                   data-placeholder="{!! $depoimento->foto !!}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nome">Nome:</label>
                            <input placeholder="Preencha este campo" name="nome" id="nome"
                                   class="form-control" autofocus required
                                   maxlength="250" type="text" value="{{ $depoimento->nome }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="profissao">Profissão:</label>
                            <input placeholder="Preencha este campo" name="profissao" id="profissao"
                                   class="form-control" autofocus required
                                   maxlength="250" type="text" value="{{ $depoimento->profissao }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="texto">Texto:</label>
                            <textarea name="texto" id="texto" autofocus required
                                      cols="30" rows="10" class="form-control"
                            >{{ $depoimento->texto }}</textarea>
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
                                <a href="{{ route('depoimentos.index') }}" class="btn btn-danger" data-dismiss="modal">
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
@endsection
