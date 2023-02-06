@extends('layouts.app')

@section('scripts')
  
@endsection

@section('content')
    <div class="container col-md-10 mt-3">
        <div>
            <h1>Leads asignados a los Partners</h1>
            {{-- chartjs --}}
            <div>
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card_header">
                      Dashboard
                    </div>
                    <div class="card-body">
                      <h1>{{$chart->options['chart_title']}}</h1>
                      {!! $chart->renderHtml()  !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- end chartjs --}}
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
  {!! $chart->renderChartJsLibrary() !!}
  {!! $chart->renderJs() !!}
@endsection