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
                    <div class="card_header"></div>
                    <div class="card-body p-6 m-20 bg-white rounded shadow">
                      <canvas id="myChart" height="100px"></canvas>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript">

  let labels = {!! $labels !!};
  let data = {{  $data }};

  let barChartData = {
        labels: labels,
        datasets: [{
            label: 'Customer',
            backgroundColor: "#002542",
            data: data
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("myChart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Leads para Abogados'
                }
            }
        });
    };

</script>
@endsection