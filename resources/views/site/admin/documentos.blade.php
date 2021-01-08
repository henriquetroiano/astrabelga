@extends('layouts.site')

@section('titlepage', 'Documentos - Admin')

@section('content')


      <div class="container admin pt-3">

            @component('components.admin.left_nav')@endcomponent
            <div class="content documentos card">
                  <h2 class="card-header">Documentos - Admin <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Novo Documento +
                      </button></h2>
                  <div class="uploader card collapse" id="collapseExample">
                      {{-- <h1 class="card-title">Upload de Documentos</h1> --}}
                      <div class="card-body">
                              <form action="{{ route('admin_documentos_uploader') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                          <label class="mb-0" for="title">Nome</label>
                                          <input type="text" name="title" id="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                          <label class="mb-0" for="description">Descrição</label>
                                          <input type="text" name="description" id="description" class="form-control">
                                    </div>
                                    <div class="form-group">
                                          <label class="mb-0" for="file">Arquivo</label>
                                          <input type="file" name="file" id="file" class="form-control-file py-1">
                                    </div>
                                    <div class="form-group">
                                          <button type="submit" class="btn btn-success">Salvar</button>
                                          <button type="reset" class="btn btn-warning">Limpar campos</button>
                                          <a class="btn btn-danger">Cancelar</a>
                                    </div>
                              </form>
                      </div>
                  </div>
            </div>


        
    </div>
@endsection