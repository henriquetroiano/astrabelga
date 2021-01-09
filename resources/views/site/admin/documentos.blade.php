@extends('layouts.site')

@section('titlepage', 'Documentos - Admin')

@section('content')


    <div class="container admin pt-3">

        @component('components.admin.left_nav')@endcomponent
        <div class="content documentos card">
            <h2 class="card-header">Documentos - Admin <button class="btn btn-primary" type="button" data-toggle="collapse"
                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Novo Documento +
                </button></h2>
            <div class="uploader card collapse" id="collapseExample">
                {{-- <h1 class="card-title">Upload de Documentos</h1>
                --}}
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
			<div class="card">
				{{-- <h3 class="card-header">Documentos no ar</h3> --}}
				<div class="card-body">
					@if (count($documentos) > 0)
						@foreach ($documentos as $doc)
							<div class="card my-2 item-card doc_id_{{$doc->id}}">
								<div class="card-header">
									<div class="title">
										<h4>{{ $doc->title }}</h4>
										<button class="edit"><i class="fas fa-edit"></i></button>
										<form class="hide-self" action="{{ route('admin_documentos_edit') }}" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{$doc->id}}">
											<input type="text" name="title" value="{{ $doc->title }}">
											<button type="submit"><i class="fas fa-check"></i></button>
										</form>
									</div>
									<script>
										const from_doc_id_{{$doc->id}}_title = document.querySelector('.item-card.doc_id_{{$doc->id}} .title h4');
										const from_doc_id_{{$doc->id}}_edit = document.querySelector('.item-card.doc_id_{{$doc->id}} .title button.edit');
										const from_doc_id_{{$doc->id}}_form = document.querySelector('.item-card.doc_id_{{$doc->id}} .title form');

										from_doc_id_{{$doc->id}}_edit.addEventListener('click', function(e) {
											from_doc_id_{{$doc->id}}_title.classList.add('hide-self');
											from_doc_id_{{$doc->id}}_edit.classList.add('hide-self');
											from_doc_id_{{$doc->id}}_form.classList.remove('hide-self');
										})
									</script>
									<form class="delete" action="{{ route('admin_documentos_delete') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{ $doc->id }}">
										<button type="submit"><i class="fas fa-trash"></i></button>
									</form>
							
								</div>
								<div class="card-body">
									<div class="description">
										<p>{{$doc->description}}</p>
										<button class="edit"><i class="fas fa-edit"></i></button>

										<form class="hide-self" action="{{ route('admin_documentos_edit') }}" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{$doc->id}}">
											<input type="text" name="description" value="{{ $doc->description }}">
											<button type="submit"><i class="fas fa-check"></i></button>
										</form>

										<script>
											const from_doc_id_{{$doc->id}}_description_title = document.querySelector('.item-card.doc_id_{{$doc->id}} .description p');
											const from_doc_id_{{$doc->id}}_description_edit = document.querySelector('.item-card.doc_id_{{$doc->id}} .description button.edit');
											const from_doc_id_{{$doc->id}}_description_form = document.querySelector('.item-card.doc_id_{{$doc->id}} .description form');
	
											from_doc_id_{{$doc->id}}_description_edit.addEventListener('click', function(e) {
												from_doc_id_{{$doc->id}}_description_title.classList.add('hide-self');
												from_doc_id_{{$doc->id}}_description_edit.classList.add('hide-self');
												from_doc_id_{{$doc->id}}_description_form.classList.remove('hide-self');
											})
										</script>

									</div>
									<div class="file">
										{{-- <a class="btn btn-success" href="{{ asset($doc->file) }}" download>Arquivo enviado</a> --}}
										<a class="btn btn-success" href="{{ asset($doc->file) }}" download>Visualizar Arquivo</a>
										<button class="edit"><i class="fas fa-edit"></i></button>
										<form class="hide-self" action="{{ route('admin_documentos_edit') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<input type="hidden" name="id" value="{{$doc->id}}">
											<input type="file" name="file">
											<button type="submit"><i class="fas fa-check"></i></button>
										</form>

										<script>
											const from_doc_id_{{$doc->id}}_file_title = document.querySelector('.item-card.doc_id_{{$doc->id}} .file a');
											const from_doc_id_{{$doc->id}}_file_edit = document.querySelector('.item-card.doc_id_{{$doc->id}} .file button.edit');
											const from_doc_id_{{$doc->id}}_file_form = document.querySelector('.item-card.doc_id_{{$doc->id}} .file form');
	
											from_doc_id_{{$doc->id}}_file_edit.addEventListener('click', function(e) {
												from_doc_id_{{$doc->id}}_file_title.classList.add('hide-self');
												from_doc_id_{{$doc->id}}_file_edit.classList.add('hide-self');
												from_doc_id_{{$doc->id}}_file_form.classList.remove('hide-self');
											})
										</script>

									</div>
								</div>
								
							</div>
						@endforeach
					@else
						<h5>Não há documentos cadastrados.</h5>
					@endif
				</div>
			</div>
        </div>
        <br>
        <br>



    </div>
@endsection
