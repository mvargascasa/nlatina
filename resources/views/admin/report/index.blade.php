@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
    <div class="container col-md-10 mt-3">
        <div>
            <h1>Reportes</h1>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card rounded-0 shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold">Leads de Partners</h5>
                          <p class="card-text">Clientes que han consultado por los partners mediante el sitio web </p>
                          <a href="{{route('home.partner.report.index.leads')}}" class="btn btn-primary rounded-0">Ver reporte</a>
                        </div>
                      </div>
                </div>
                <div class="col-sm-4">
                    <div class="card rounded-0 shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold">Leads Website</h5>
                          <p class="card-text">Leads que han llegado por la página web </p>
                          <a href="{{route('home.report.index.leads.web')}}" class="btn btn-primary rounded-0">Ver reporte</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('end-scripts')
    
@endsection