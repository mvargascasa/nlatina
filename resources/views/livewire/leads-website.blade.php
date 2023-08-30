<div>
    <div>
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Ubicacion</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">Email</th>
                      <th scope="col">Interes</th>
                      <th scope="col">Mensaje</th>
                      <th scope="col">Proviene</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($leads as $lead)
                        <tr>
                            <th scope="row">{{ $lead->name }} {{ $lead->lastname}}</th>
                            <td>{{ $lead->country}} @if($lead->state != null) , {{ $lead->state }} @endif</td>
                            <td>{{ $lead->phone }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->interest }}</td>
                            <td>{{ $lead->message }}</td>
                            <td>
                                <a href="{{$lead->page}}" target="_blank">
                                    {{ $lead->page }}
                                </a>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
            </table>
          </div>
    </div>
</div>
