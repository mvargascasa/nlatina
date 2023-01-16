@extends('layouts.app')

@section('scripts')

@endsection

@section('content')
    <div class="container col-md-10-mt-3">
        <div>
          <div class="my-3">
            <h1>Leads del Partner {{$partner->name . " ". $partner->lastname}}</h1>
          </div>
          <div class="row">
            @foreach ($customers as $customer)
            <div class="col-sm-4">
              <div class="card rounded-0 w-auto h-100 shadow">
                <div class="card-header" style="background-color: #002542; color: #ffffff">    
                  <i class="fa-solid fa-user"></i> {{$customer->nombre}}
                </div>
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>{{$customer->mensaje}}</p>
                    <div style="font-size: 12px">
                      <footer class="text-muted"><cite title="Source Title"><i class="fa-solid fa-earth-americas"></i> {{$customer->pais}}</cite></footer>
                      <footer class="text-muted"><cite title="Source Title"><i class="fa-solid fa-phone"></i> {{$customer->telefono}}</cite></footer>
                      <footer class="text-muted"><cite title="Source Title"><i class="fa-solid fa-envelope"></i> {{$customer->email}}</cite></footer>
                    </div>
                  </blockquote>
                </div>
              </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection