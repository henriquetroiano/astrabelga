@extends('layouts.site')

@section('titlepage', 'Videos - Admin')

@section('content')


    <div class="container admin pt-3">

        @component('components.admin.left_nav')@endcomponent
        <div class="content videos card">
            <h2 class="card-header">Videos - Admin <button class="btn btn-primary" type="button" data-toggle="collapse"
                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Novo Vídeo +
                </button></h2>
            <div class="uploader card collapse" id="collapseExample">
                <div class="card-body">
                    <form action="{{ route('admin_videos_uploader') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="mb-0" for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="url">Url</label>
                            <input type="text" name="url" id="url" class="form-control">
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
					@if (count($videos) > 0)
						@foreach ($videos as $video)
							<div class="card my-2 item-card video_id_{{$video->id}}">
								<div class="card-header">
									<div class="title">
										<h4>{{ $video->title }}</h4>
										<button class="edit"><i class="fas fa-edit"></i></button>
										<form class="hide-self" action="{{ route('admin_videos_edit') }}" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{$video->id}}">
											<input type="text" name="title" value="{{ $video->title }}">
											<button type="submit"><i class="fas fa-check"></i></button>
										</form>
									</div>
									<script>
										const from_video_id_{{$video->id}}_title = document.querySelector('.item-card.video_id_{{$video->id}} .title h4');
										const from_video_id_{{$video->id}}_edit = document.querySelector('.item-card.video_id_{{$video->id}} .title button.edit');
										const from_video_id_{{$video->id}}_form = document.querySelector('.item-card.video_id_{{$video->id}} .title form');

										from_video_id_{{$video->id}}_edit.addEventListener('click', function(e) {
											from_video_id_{{$video->id}}_title.classList.add('hide-self');
											from_video_id_{{$video->id}}_edit.classList.add('hide-self');
											from_video_id_{{$video->id}}_form.classList.remove('hide-self');
										})
									</script>
									<form class="delete" action="{{ route('admin_videos_delete') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{ $video->id }}">
										<button type="submit"><i class="fas fa-trash"></i></button>
									</form>
							
								</div>
								<div class="card-body">
									<div class="url">
										<p>{{$video->url}}</p>
										<button class="edit"><i class="fas fa-edit"></i></button>

										<form class="hide-self" action="{{ route('admin_videos_edit') }}" method="POST">
											@csrf
											<input type="hidden" name="id" value="{{$video->id}}">
											<input type="text" name="url" value="{{ $video->url }}">
											<button type="submit"><i class="fas fa-check"></i></button>
										</form>

										<script>
											const from_video_id_{{$video->id}}_url_title = document.querySelector('.item-card.video_id_{{$video->id}} .url p');
											const from_video_id_{{$video->id}}_url_edit = document.querySelector('.item-card.video_id_{{$video->id}} .url button.edit');
											const from_video_id_{{$video->id}}_url_form = document.querySelector('.item-card.video_id_{{$video->id}} .url form');
	
											from_video_id_{{$video->id}}_url_edit.addEventListener('click', function(e) {
												from_video_id_{{$video->id}}_url_title.classList.add('hide-self');
												from_video_id_{{$video->id}}_url_edit.classList.add('hide-self');
												from_video_id_{{$video->id}}_url_form.classList.remove('hide-self');
											})
										</script>

									</div>
								</div>
								
							</div>
						@endforeach
					@else
						<h5>Não há vídeos cadastrados.</h5>
					@endif
				</div>
			</div>
        </div>
        <br>
        <br>



    </div>
@endsection
