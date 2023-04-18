@extends('layouts.app')

@section('scripts')

@endsection

@section('content')
    <div class="col-9 mt-4 mx-3">
        <h4 class="text-center mt-4">Listado de Clientes de los Partners</h4>
        <div class="row mt-4">
            <h5 style="font-weight: 600">Total: {{$totalCustomers}}</h5>
            <div class="col-sm-12">
                @if (count($customers) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">País</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Mensaje</th>
                            <th scope="col">Partner</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <th>
                                        {{ $customer->nombre }} <br>
                                        @foreach ($customer->partners as $c)
                                            <b class="text-muted" style="font-size: 12px">{{ Str::limit($c->pivot->created_at, 10, '') }}</b>
                                        @endforeach
                                    </th>
                                    <td>{{ $customer->pais }}</td>
                                    <td>{{ $customer->telefono }}</td>
                                    <td>{{ $customer->mensaje }}</td>
                                    <td>
                                        @if($customer->proviene != null)
                                            <a href="{{route('partner.form.assign.lead', $customer->id)}}" class="btn btn-info btn-sm">Asignar Lead</a>
                                        @else
                                            @foreach ($customer->partners as $c)
                                                <a href="{{route('partner.show.id', $c->pivot->partner_id)}}">
                                                    <b>{{$c->name }} {{ $c->lastname}}</b><br>
                                                </a>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
                @else
                    <h1>No se encontraron registros</h1>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('end-scripts')

@endsection