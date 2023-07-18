<div class="w-100">
    <section class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <p class="mx-2 bg-info rounded text-white px-2 shadow-sm">Registrados: <span class="font-weight-bold">{{ App\Partner::all()->count() }}</span></p>
                        <p class="mx-2 bg-info rounded text-white px-2 shadow-sm">Publicados: <span class="font-weight-bold">{{ App\Partner::where('status', 'PUBLICADO')->count()}}</span></p>
                        <p class="mx-2 bg-info rounded text-white px-2 shadow-sm">No Publicados: <span class="font-weight-bold">{{ App\Partner::where('status', 'NO PUBLICADO')->count() }}</span></p>
                        <p class="mx-2 bg-info rounded text-white px-2 shadow-sm">No Aplica: <span class="font-weight-bold">{{ App\Partner::where('status', 'NO APLICA')->count() }}</span></p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="mr-1">
                            <span style="font-size: 12px" class="text-muted">Nombre</span>
                            <input type="text" wire:model="name" class="form-control mr-1" placeholder="Nombre">
                        </div>
                        <div class="mr-1">
                            <span style="font-size: 12px" class="text-muted">Apellido</span>
                            <input type="text" class="form-control mr-1" placeholder="Apellido" wire:model="lastname"> 
                        </div>
                        <div class="mr-1">
                            <span style="font-size: 12px" class="text-muted">Registro</span>
                            <div class="d-flex">
                                <input type="date" class="form-control mr-1" wire:model="from_date_created">
                                <input type="date" class="form-control" wire:model="to_date_created">
                            </div>
                        </div>
                        <div class="mr-1">
                            <span style="font-size: 12px" class="text-muted">Publicado</span>
                            <div class="d-flex">
                                <input type="date" class="form-control mr-1" wire:model="from_date_publicated">
                                <input type="date" class="form-control" wire:model="to_date_publicated">
                            </div>
                        </div>
                        <button class="ml-1 btn btn-danger mt-4" wire:click="clean">Limpiar</button>
                    </div>
                    <div class="mt-4">
                        <p><span class="font-weight-bold">Se encontraron {{ $total_partners }} abogados</p>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example" class="table table-sm" style="width:100%">
                        <tr>
                            <th>IMG</th>
                            <th>NOMBRE</th>
                            <th>ESPECIALIDAD</th>
                            <th>TERMINOS Y CONDICIONES</th>
                            <th>PAIS DE RESIDENCIA</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>

                        @foreach ($partners as $partner)
                        <tr>
                            <td>
                                
                                @isset($partner->img_profile)
                                    <img src="{{ asset('storage/'.$partner->img_profile)}}" width="80px" height="80px">
                                @else
                                    <img src="{{ asset('img/user.webp') }}" width="80px" height="80px" alt="">
                                @endisset  
                            </td>
                            <td>
                                {{ $partner->name }} {{ $partner->lastname }}
                                <p class="text-muted" style="font-size: 13px">{{ $partner->created_at->format('d/m/Y')}}</p>
                            </td>
                            <td>
                                @isset($partner->specialty)
                                    {{Str::limit($partner->specialty, 100)}}
                                @else
                                    <b>Sin información</b> 
                                @endisset
                            </td>
                            <td>
                                @isset($partner->terminos_verified_at)
                                    Aceptó el <b>{{Str::limit($partner->terminos_verified_at, 10, '')}}</b> 
                                @else
                                    <b>Sin aceptar</b> 
                                @endisset
                            </td>
                            <td>
                                @isset($partner->country_residence)
                                    {{ $partner->country_residence}}
                                @else
                                    <b>Sin información</b> 
                                @endisset
                            </td>
                            <td class="text-center">
                                {{ $partner->status}}
                                <div style="padding: 2px; border-radius: 5px; font-weight: 600; background-color: @if($partner->status == 'PUBLICADO') #38E51C; @elseif($partner->status == 'NO PUBLICADO') #BEBEBE; @elseif($partner->status == 'NO APLICA') #E53D19; @endif">
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('partner.show', $partner ) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $partners->links() }}
            </div>
        </div>
    </section>
</div>
