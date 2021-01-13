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
										<input type="file" class="form-control py-1" name="image[]" id="image" accept="image/*" multiple>
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
										<input class="form-control py-1" type="file" multiple accept="image/*" id="image" placeholder="Insira Fotos do seu Produto" name="image[]">
									</div>
									<div class="form-group">
										<label for="description">Breve descrição ou observação</label>
										<input class="form-control" type="text" name="description" id="description">
									</div>
	
									<button type="submit" class="btn btn-success">Salvar</button>
								</form>
							</div>

							<div class="subitem">
								@if ($item->marcas)
									@foreach ($item->marcas as $marca)
										<div class="container-item-{{$marca['id']}} submarca card">
											<div class="item card-header title">
												<span style="margin-right: 5px">Nome da Marca: </span><p>{{$marca->name}}</p>
												<form class="editName" action="{{ url('/admin/catalogo/' . $item['id'] . '/' . $marca->id . '/edit') }}"
													method="POST">
													@csrf
													<input class="hide-self target" type="text" name="name" value="{{$marca->name}}">
													<button class="edit"><i class="fas fa-edit"></i></button>
													<button class="hide-self" type="submit"><i class="fas fa-check"></i></button>
												</form>
												<form class="deleteMarca" action="/admin/catalogo/{{$item->id}}/{{$marca->id}}/delete" method="POST">
													@csrf
													<button type="submit"><i class="fas fa-trash-alt"></i></button>
												</form>
												<script>
													const loop_{{$loop->index}}_id_{{$marca->id}}_title_btnStartEditMarca = document.querySelector('.marcas-item .container-item-{{$marca["id"]}} .title .editName button.edit');
													const loop_{{$loop->index}}_id_{{$marca->id}}_title_inputNameMarca = document.querySelector('.marcas-item .container-item-{{$marca["id"]}} .title .editName input.target');
													const loop_{{$loop->index}}_id_{{$marca->id}}_title_nameTextMarca = document.querySelector('.marcas-item .container-item-{{$marca["id"]}} .title > p');
													const loop_{{$loop->index}}_id_{{$marca->id}}_title_btnSubmitMarca = document.querySelector('.marcas-item .container-item-{{$marca["id"]}} .title .editName button[type="submit"]');
				
													loop_{{$loop->index}}_id_{{$marca->id}}_title_btnStartEditMarca.addEventListener('click', function(event) {
														event.preventDefault();
														loop_{{$loop->index}}_id_{{$marca->id}}_title_inputNameMarca.classList.remove('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_title_btnStartEditMarca.classList.add('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_title_nameTextMarca.classList.add('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_title_btnSubmitMarca.classList.remove('hide-self');
													})
												</script>
											</div>
											<div class="item item-{{$marca->id}} card-header code ">
												<span style="margin-right: 5px">Código: </span><p>{{ $marca->code }}</p>
												<form class="editName" action="{{ url('/admin/catalogo/' . $item['id'] . '/' . $marca->id . '/edit') }}"
													method="POST">
													@csrf
													<input class="hide-self target" type="text" name="code" value="{{$marca->code}}">
													<button class="edit"><i class="fas fa-edit"></i></button>
													<button class="hide-self" type="submit"><i class="fas fa-check"></i></button>
												</form>
												<script>
													const loop_{{$loop->index}}_id_{{$marca->id}}_code_btnStartEditMarca = document.querySelector('.item.item-{{$marca->id}}.code .editName button.edit');
													const loop_{{$loop->index}}_id_{{$marca->id}}_code_inputNameMarca = document.querySelector('.item.item-{{$marca->id}}.code .editName input.target');
													const loop_{{$loop->index}}_id_{{$marca->id}}_code_nameTextMarca = document.querySelector('.item.item-{{$marca->id}}.code > p');
													const loop_{{$loop->index}}_id_{{$marca->id}}_code_btnSubmitMarca = document.querySelector('.item.item-{{$marca->id}}.code .editName button[type="submit"]');
				
													loop_{{$loop->index}}_id_{{$marca->id}}_code_btnStartEditMarca.addEventListener('click', function(event) {
														event.preventDefault();
														loop_{{$loop->index}}_id_{{$marca->id}}_code_inputNameMarca.classList.remove('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_code_btnStartEditMarca.classList.add('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_code_nameTextMarca.classList.add('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_code_btnSubmitMarca.classList.remove('hide-self');
													})
												</script>
											</div>

											
											<div class="item item-{{$marca->id}} card-header " data-toggle="collapse" href="#collapseExample{{$marca->id}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$marca->id}}">Adicionar Fotos <i style="color: green; margin-left: 5px" class="fas fa-plus"></i></div>
											
											<div class="collapse" id="collapseExample{{$marca->id}}" style="width: 100%">
												<div class="card m-3">
													<form action="{{ url('/admin/catalogo/'. $item->id . '/' . $marca->id . '/foto/add') }}" method="POST" enctype="multipart/form-data">
														@csrf
														<div class="form-group">
															<label for="image" class="card-header" style="width: 100%">Selecione uma imagem</label>
															<input type="file" class="form-control p-1" name="image[]" id="image" accept="image/*" multiple>
														</div>
														<button type="submit" class="btn btn-success ml-2 mb-2">Enviar</button>
													</form>
												</div>
											  </div>

											<div class="item item-{{$marca->id}} card-header description ">
												<span style="margin-right: 5px">Descrição: </span><p> {{ $marca->description }}</p>
												<form class="editName" action="{{ url('/admin/catalogo/' . $item['id'] . '/' . $marca->id . '/edit') }}"
													method="POST">
													@csrf
													<input class="hide-self target" type="text" name="description" value="{{$marca->description}}">
													<button class="edit"><i class="fas fa-edit"></i></button>
													<button class="hide-self" type="submit"><i class="fas fa-check"></i></button>
												</form>
												<script>
													const loop_{{$loop->index}}_id_{{$marca->id}}_description_btnStartEditMarca = document.querySelector('.item.item-{{$marca->id}}.description .editName button.edit');
													const loop_{{$loop->index}}_id_{{$marca->id}}_description_inputNameMarca = document.querySelector('.item.item-{{$marca->id}}.description .editName input.target');
													const loop_{{$loop->index}}_id_{{$marca->id}}_description_nameTextMarca = document.querySelector('.item.item-{{$marca->id}}.description > p');
													const loop_{{$loop->index}}_id_{{$marca->id}}_description_btnSubmitMarca = document.querySelector('.item.item-{{$marca->id}}.description .editName button[type="submit"]');
				
													loop_{{$loop->index}}_id_{{$marca->id}}_description_btnStartEditMarca.addEventListener('click', function(event) {
														event.preventDefault();
														loop_{{$loop->index}}_id_{{$marca->id}}_description_inputNameMarca.classList.remove('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_description_btnStartEditMarca.classList.add('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_description_nameTextMarca.classList.add('hide-self');
														loop_{{$loop->index}}_id_{{$marca->id}}_description_btnSubmitMarca.classList.remove('hide-self');
													})
												</script>
											</div>
											<div class="item fotos item-{{$marca->id}}-fotos card-body">
												@foreach ($marca->photos as $photo)
													<div class="foto" style='background-image: url("{{$photo->url}}")'>
														<form method="POST" action="{{ url('/admin/catalogo/' . $item['id'] . '/' . $marca->id . '/marca_photo/' . $photo->id ) }}">
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
