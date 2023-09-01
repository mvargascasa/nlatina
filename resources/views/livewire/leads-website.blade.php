<div>
    <div>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="bg-white">
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
                            <td>
                                <span>
                                    {{ $lead->country}}@if($lead->state != null), {{ $lead->state }} @endif        
                                </span>
                            </td>
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
            @if($pagination == 10)
                <div>
                    {{ $leads->links() }}
                </div>
            @endif
          </div>
    </div>
</div>
