@extends('layouts.site')

@section('titlepage', 'Catálogos - Administrador')

@section('content')


      <div class="container admin pt-3">

            @component('components.admin.left_nav')@endcomponent
            <div class="content">
                  <div class="catalogos">
                        <div class="title">
                              <h4>Peças Cadastradas</h4>
                              <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#exampleModal">
                                    Cadastrar nova peça +
                                  </button>
                        </div>
                        <table class="table table-bordered table-hover">
                              <thead class="thead-dark">
                                <tr>
                                    <th style="width: 13%; text-align: center" scope="col">ID</th>
                                    <th scope="col-11">Nome da Peça</th>
                                    <th scope="col-11" style="text-align: center">Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                                    @if (count($produtos) == 0)
                                          @foreach ($produtos as $p)
                                                <tr>
                                                      <th scope="row" class="id">{{ $p->id }}</th>
                                                      <td>
                                                            <a href="{{ url('/catalogo') . '/' . $p->id }}">{{ $p->name }}</a>
                                                      </td>
                                                      <td class="actions">
                                                            <a href="{{ url('/admin/catalogo/edit') . '/' . $p->id }}"><i class="fas fa-edit"></i></a>

                                                            <a href="{{ url('/admin/catalogo/delete') . '/' . $p->id }}"><i class="fas fa-trash-alt"></i></a>
                                                      </td>
                                                </tr>
                                          @endforeach
                                    @else
                                          <tr>
                                                <td>N/A</td>
                                                <td>Nenhum Item Cadastrado</td>
                                                <td>N/A</td>
                                          </tr>
                                    @endif
                                
                                    
                                    
                                    
                              </tbody>
                          </table>
                  </div>
            </div>


        
    </div>



<!-- Modal cadastrar peça -->
<div class="modal fade cadstro-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <form action="{{ url('/admin/catalogos/new') }}" method="POST" id="form-catalogo">
                  @csrf
                  <div class="container-items">
                        <div class="form-group">
                              <label for="name">Nome da Peça</label>
                              <input type="text" class="form-control" id="name" placeholder="Insira um nome para a peça" name="name">
                        </div>
                        <div class="form-group">
                              <label for="code">Código</label>
                              <input type="text" class="form-control" id="code" placeholder="Código" name="code">
                        </div>
                        <div class="form-group">
                              <label for="image">Fotos</label>
                              <input type="text" class="form-control" id="image" placeholder="Insira Fotos do seu Produto" name="image">
                        </div>

                        
                    
                        <div class="footer-form">
                              <button type="submit" class="btn btn-primary my-1">Criar Produto</button>
                              <button type="reset" class="btn btn-warning">Limpar campos</button>
                              <button class="btn btn-danger" type="dismiss" data-dismiss="modal">Cancelar</button>
                        </div>
                  </div>
              </form>
      </div>
      
    </div>
  </div>
</div>
@endsection