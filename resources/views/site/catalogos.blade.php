@extends('layouts.site')

@section('titlepage', 'Catálogos')

@section('content')


    <div class="container catalogue pt-3">

        @component('components.ads.horizontal')@endcomponent
		<div class="header-title">
			<h4>Catálogo de Peças Compatíveis / Intercambiáveis</h4>
			<span>Não recomendamos peças paralelas (sem marca). <strong>Evite</strong> o uso de tais peças.</span>
		</div>
        
		
		<div class="content">

			<div class="filter">
		
				<form action="{{ url('/filter-catalogue') }}" method="POST" id="form-catalogo">
					<div class="container-items">
					  <div class="my-1">
						<label class="sr-only" for="motor">Preferência</label>
						<select class="custom-select" id="motor" name="motor">
							<option selected disabled>Selecione o motor</option>
							<option value="2.0">Motor 2.0</option>
							<option value="1.8">Motor 1.8</option>
						</select>
					  </div>
	
					  <div class="my-1">
						<div class="custom-checkbox">
							<label class=" sr-only" for="categoria">Preferência</label>
							<select class="custom-select " id="categoria" name="categoria">
								<option selected disabled>Selecione uma categoria</option>
								<option value="eletrica">Elétrica</option>
								<option value="mecanica">Mecânica</option>
								<option value="acabamento">Acabamento Interno ou Externo</option>
								<option value="lataria">Lataria</option>
							</select>
						</div>
					  </div>
	
					  
						<button type="submit" class="btn btn-primary my-1">Filtrar</button>
					</div>
				  </form>
			</div>
			
			<div class="result">
				{{--  <h3>Resultados:</h3>  --}}
				<table class="table table-bordered table-hover">
					<thead class="thead-dark">
					  <tr>
						<th style="width: 13%" scope="col">ID</th>
						<th scope="col-11">Nome da Peça</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($catalogos as $peca)
							<tr>
								<th scope="row">{{$peca->id}}</th>
								<td><a href="{{ url('/catalogo' . '/'. $peca->id) }}">{{$peca->name}}</a></td>
							</tr>
						@endforeach
					  
					</tbody>
				  </table>
	
			</div>
		</div>
        
    </div>
@endsection