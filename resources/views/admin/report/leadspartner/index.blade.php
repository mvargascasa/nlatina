@extends('layouts.app')

@section('scripts')
    
@endsection

@section('content')
    <div class="container col-md-10 mt-3">
        <div>
            <h1>Leads asignados a los Partners</h1>
            <div>
                <div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <caption></caption>
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">País de residencia</th>
                            <th scope="col">Leads</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($partners as $partner)
                            {{-- @if(count($partner->customers) > 0) --}}
                              <tr>
                                <th scope="row">{{$partner->id}}</th>
                                <td>
                                  <a href="{{route('partner.show.id', $partner->id)}}">{{$partner->name . " " . $partner->lastname}}</a>
                                </td>
                                <td>{{$partner->email}}</td>
                                <td>{{$partner->country_residence}}</td>
                                <td>
                                  <a href="{{route('home.report.show.leads.partner', $partner->id)}}">
                                    {{count($partner->customers)}}
                                  </a>
                                </td>
                              </tr>
                            {{-- @endif --}}
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('end-scripts')
    
@endsection