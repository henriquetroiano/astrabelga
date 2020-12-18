@extends('layouts.site')

@section('titlepage', 'Catálogos')

@section('content')


    <div class="container catalogue pt-3">

        @component('components.ads.horizontal')@endcomponent

        <h4>Catálogo de Peças Compatíveis / Intercambiáveis</h4>
        <span>Não recomendamos peças paralelas (sem marca). <strong>Evite</strong> o uso de tais peças.</span>

        <form action="{{ url('/filter-catalogue') }}" method="POST" id="form-catalogo">
            <div class="form-row align-items-center">
              <div class="col-auto my-1">
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected disabled>Selecione o motor</option>
                    <option value="2.0">Motor 2.0</option>
                    <option value="1.8">Motor 1.8</option>
                </select>
              </div>
              <div class="col-auto my-1">
                <div class="custom-checkbox mr-sm-2">
                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected disabled>Selecione uma categoria</option>
                        <option value="eletrica">Elétrica</option>
                        <option value="mecanica">Mecânica</option>
                        <option value="acabamento">Acabamento Interno ou Externo</option>
                        <option value="lataria">Lataria</option>
                    </select>
                </div>
              </div>
              <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Filtrar</button>
              </div>
            </div>
          </form>

        
        <div class="content">
            
            

        </div>
        
    </div>
@endsection