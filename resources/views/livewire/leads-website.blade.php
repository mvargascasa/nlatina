<div>
    @if($pagination == 10)
    <div class="border shadow-sm px-3 pt-4 mt-4 pb-1 my-3 position-relative bg-white">
        <div class="mb-3">
            <div class="d-flex">
                <input type="text" wire:model="names" class="form-control w-auto mr-1 rounded-0" placeholder="Nombre o Apellido">
                <input type="text" wire:model="location" class="form-control w-auto mx-1 rounded-0" placeholder="Pais o Estado">
                <select class="form-control w-auto mx-1 rounded-0" wire:model="office">
                    <option value="">Oficina</option>
                    <option value="New York">New York</option>
                    <option value="New Jersey">New Jersey</option>
                    <option value="Florida">Florida</option>
                </select>
                <input type="date" class="form-control w-auto mx-1 rounded-0" wire:model="from_date">
                <input type="date" class="form-control w-auto mx-1 rounded-0" wire:model="to_date">
                <button class="btn btn-danger rounded-0 shadow-sm ml-1 rounded-0" wire:click="clean">Limpiar</button>

                <div class="d-flex justify-content-end w-100">
                    <button class="btn btn-success rounded-0 text-right" type="button" data-toggle="modal" data-target="#exampleModal">Crear Lead</button>
                </div>
            </div>
        </div>
        <div class="position-absolute bg-white px-3 rounded-pill border" style="top: -13px; left: 15px">
            <strong>Buscar por:</strong>
        </div>
    </div>
    <div class="mb-2">
        <strong>Hemos encontrado {{ $total_leads }} clientes</strong>
    </div>
    @endif
    <div>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-hover" style="table-layout: fixed !important">
                <thead>
                    <tr class="bg-white">
                      <th scope="col">Nombre</th>
                      <th scope="col">Ubicacion</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">Email</th>
                      <th scope="col">Interes</th>
                      <th scope="col">Mensaje</th>
                      <th scope="col">Proviene</th>
                      <th scope="col">Fecha</th>
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
                                    <p>@if(str_contains($lead->page, 'landing')) Landing  @else General @endif</p>
                                </a>
                            </td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lead->created_at)->subHour(5) }}</td>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Lead</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <livewire:create-lead />
                </div>
          </div>
        </div>
      </div>
</div>
