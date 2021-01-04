@extends('layouts.site')

@section('titlepage', 'Editar Item - Administrador')

@section('content')

{{-- {{dd($item->marcas)}} --}}


    <div class="container admin pt-3 mb-5 pb-5">

        @component('components.admin.left_nav')@endcomponent

        <div class="content">
            <div class="catalogos catalogos-edit">

                <div class="title">
                    <h4>Editar Item do catálogo</h4>
				</div>
				
                <div class="content">
                    <div class="items">
                        <div class="item name-item card bg-light">
                            <h4 class="card-header">Nome</h4>
                            <div class="subitem card-body">
                                <h2>{{ $item['name'] }}</h2>
                                <form class="editName" action="{{ url('/admin/catalogo/' . $item['id'] . '/name/edit') }}"
									method="POST">
									@csrf
                                    <input class="hide-self nameinput" type="text" name="name" value="{{$item['name']}}">
                                    <button class="edit"><h3><i class="fas fa-edit"></i><h3></button>
                                    <button class="hide-self" type="submit"><h3><i class="fas fa-check"></i><h3></button>
                                </form>
                                <script>
									const btnStartEdit = document.querySelector('.name-item .editName button.edit');
									const inputName = document.querySelector('.name-item .editName input.nameinput');
									const nameText = document.querySelector('.name-item .subitem h2');
									const btnSubmit = document.querySelector('.name-item .editName button[type="submit"]');

									btnStartEdit.addEventListener('click', function(event) {
										event.preventDefault();
										inputName.classList.remove('hide-self');
										btnStartEdit.classList.add('hide-self');
										nameText.classList.add('hide-self');
										btnSubmit.classList.remove('hide-self');
									})
                                </script>
                            </div>
                        </div>
                        <div class="item fotos-item card bg-light">
							<div class="title card-header">
								<h4>Fotos</h4>
								@if ($item->photos->count() <= 8)
									<button class="btn btn-primary ml-3" type="button" data-toggle="collapse" data-target="#collapseFoto" aria-expanded="false" aria-controls="collapseExample">
										Adicionar Foto +
									</button>
								@else
									<button class="btn btn-primary ml-3" disabled type="button" data-toggle="collapse" data-target="#collapseFoto" aria-expanded="false" aria-controls="collapseExample">
										Máximo de 8 fotos!
									</button>
								@endif

							</div>
							<div class="collapse card-body" id="collapseFoto">
								<form  class="card bg-light sendfile" action="{{ url('/admin/catalogo/'. $item["id"] .'/image/new') }}" method="POST" id="form-catalogo" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<label for="image" class="card-header" style="width: 100%">Selecione uma imagem</label>
										<input type="file" class="form-control" name="image[]" id="image" accept="image/*" multiple>
									</div>
									<button type="submit" class="btn btn-success">Enviar</button>
								</form>
								<hr>
							</div>
							<div class="subitem card-body">
								@if ($item->photos)
									@foreach ($item->photos as $photo)
										
										@if ($photo->type == 1)
											<div class="foto" style='background-image: url("{{ $photo->url }}")'>
												
												<form action="{{ url('/admin/catalogo/' . $item['id'] . '/' . $photo->id . '/image/delete') }}"
													method="POST">
													@csrf
													<input type="hidden" name="catid" value="{{$item['id']}}">
													<button type="submit"><i class="fas fa-trash-alt"></i></button>
												</form>
											</div>
										@endif
									@endforeach
								@endif
							</div>



							
						</div>

						<div class="item marcas-item card bg-light">
							<div class="title card-header">
								<h4>Marcas</h4>
								<button class="btn btn-primary ml-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
									Nova marca +
								  </button>
							</div>
							<div class="collapse" id="collapseExample">
								<form class="card bg-light p-5" action="{{ url('/admin/catalogo/'. $item["id"] .'/marca/new') }}" enctype='multipart/form-data' method="POST">
									@csrf
									<div class="form-group">
										<label for="nomemarca">Insira a marca do produto</label>
										<input class="form-control" type="text" name="name" id="nomemarca">
									</div>
									<div class="form-group">
										<label for="codigomarca">Insira o código do produto</label>
										<input class="form-control" type="text" name="code" id="codigomarca">
									</div>
									<div class="form-group">
										<label for="imagemmarca">Selecione as imagens do produto</label>
										<input class="form-control" type="file" multiple accept="image/*" id="image" placeholder="Insira Fotos do seu Produto" name="image[]">
									</div>
									<div class="form-group">
										<label for="description">Breve descrição ou observação</label>
										<input class="form-control" type="text" name="description" id="description">
									</div>
	
									<button type="submit">Salvar</button>
								</form>
							</div>

							<div class="subitem">
								@if ($item->marcas)
									@foreach ($item->marcas as $marca)
										<div class="container-item-{{$item['id']}}">
											<div class="item">
												<p>{{$marca->name}}</p>
												<form class="editName" action="{{ url('/admin/catalogo/' . $item['id'] . '/' . $marca->id . '/edit') }}"
													method="POST">
													@csrf
													<input class="hide-self target" type="text" name="name" value="{{$marca->name}}">
													<button class="edit"><i class="fas fa-edit"></i></button>
													<button class="hide-self" type="submit"><i class="fas fa-check"></i></button>
												</form>
												<form action="/birita">
													@csrf
													<button type="submit"><i class="fas fa-trash-alt"></i></button>
												</form>
												<script>
													const btnStartEditMarca = document.querySelector('.marcas-item .container-item-{{$item["id"]}} .editName button.edit');
													const inputNameMarca = document.querySelector('.marcas-item .container-item-{{$item["id"]}} .editName input.target');
													const nameTextMarca = document.querySelector('.marcas-item .container-item-{{$item["id"]}} .item > p');
													const btnSubmitMarca = document.querySelector('.marcas-item .container-item-{{$item["id"]}} .editName button[type="submit"]');
				
													btnStartEditMarca.addEventListener('click', function(event) {
														event.preventDefault();
														inputNameMarca.classList.remove('hide-self');
														btnStartEditMarca.classList.add('hide-self');
														nameTextMarca.classList.add('hide-self');
														btnSubmitMarca.classList.remove('hide-self');
													})
												</script>
											</div>
											<div class="item item-{{$item->id}}">
												<p>{{ $marca->code }}</p>
												<form class="editName" action="{{ url('/admin/catalogo/' . $item['id'] . '/' . $marca->id . '/edit') }}"
													method="POST">
													@csrf
													<input class="hide-self target" type="text" name="code" value="{{$marca->code}}">
													<button class="edit"><i class="fas fa-edit"></i></button>
													<button class="hide-self" type="submit"><i class="fas fa-check"></i></button>
												</form>
												<script>
													const btnStartEditMarca{{$marca->id}} = document.querySelector('.item.item-{{$item->id}} .editName button.edit');
													const inputNameMarca{{$marca->id}} = document.querySelector('.item.item-{{$item->id}} .editName input.target');
													const nameTextMarca{{$marca->id}} = document.querySelector('.item.item-{{$item->id}} > p');
													const btnSubmitMarca{{$marca->id}} = document.querySelector('.item.item-{{$item->id}} .editName button[type="submit"]');
				
													btnStartEditMarca{{$marca->id}}.addEventListener('click', function(event) {
														event.preventDefault();
														inputNameMarca{{$marca->id}}.classList.remove('hide-self');
														btnStartEditMarca{{$marca->id}}.classList.add('hide-self');
														nameTextMarca{{$marca->id}}.classList.add('hide-self');
														btnSubmitMarca{{$marca->id}}.classList.remove('hide-self');
													})
												</script>
											</div>
											<div class="item fotos item-{{$item->id}}-fotos">
												@foreach ($item->photos as $photo)
													<div class="foto" style='background-image: url("{{$photo->url}}")'>
														<form action="{{ url('/admin/catalogo/' . $item['id'] . '/' . $marca->id . '/marca_photo/' . $photo->id ) }}">
															@csrf
															<button type="submit"><i class="fas fa-trash-alt"></i></button>
														</form>
													</div>
													
												@endforeach
											</div>
										</div>

									@endforeach								
								@else
										<h4>Ainda não há nenhuma marca cadastrada</h4>
								@endif
							</div>
							
						</div>

					</div>
					
                </div>

            </div>
        </div>



    </div>



@endsection
