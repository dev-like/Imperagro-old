@extends('admin.main')

@section('page-title')
    Editar usuário {{ $user->id }}
@endsection

@section('page-caminho')
    Usuário
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
                </i> Alterar senha
            </a>
            <form enctype="multipart/form-data"
                  action="{{ route('users.update', ['user' => $user->id])}}"
                  class="form"
                  method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Nome:</label>
                            <input placeholder="Preencha este campo" name="name" id="name"
                                   class="form-control" autofocus required
                                   maxlength="250" type="text" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">E-mail:</label>
                            <input placeholder="Preencha este campo" name="email" id="email"
                                   class="form-control" autofocus required
                                   maxlength="250" type="email" value="{{ $user->email }}">
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
                                <a href="{{ route('users.index') }}" class="btn btn-danger" data-dismiss="modal">
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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Alterar senha do Usuário</h4>
                </div>
                <form enctype="multipart/form-data"
                      action="{{ route('users.updatePassword', ['user' => $user->id]) }}"
                      class="form"
                      method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password:</label>
                                <input placeholder="Preencha este campo" name="password" id="password"
                                       class="form-control" autofocus required
                                       maxlength="250" type="password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Confirme Password:</label>
                                <input placeholder="Preencha este campo" name="password_confirmation"
                                       id="password_confirmation"
                                       class="form-control" autofocus required
                                       maxlength="250" type="password">
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
@endsection
