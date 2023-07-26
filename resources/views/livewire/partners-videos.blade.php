<div>
    <h2 class="text-center py-2">Conozca a nuestros Abogados</h2>
    <p class="text-muted text-center py-3">Nuestro portal de abogados cuenta con profesionales capacitados para brindar servicios en Latinoamerica</p>
    <section class="row">
        {{-- @php
            dd($partners_videos);
        @endphp --}}
        @foreach ($partners_videos as $pv)
            <article class="col-sm-4 mb-3">
                <div class="card">
                    <a href="{{ route('web.showpartner', $pv->slug) }}">
                        <div class="card-header bg-white d-flex border-0">
                            <img src="{{asset('storage/' . $pv->img_profile )}}" width="30px" height="30px" class="rounded-pill" alt="">
                            <p class="text-muted ml-3">{{ $pv->name }} {{ $pv->lastname}}</p>
                        </div>
                    </a>
                    <div class="card-body">
                        <video width="300px" src="{{asset('storage/'.$pv->url_video)}}" muted loop controls></video>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
    <div class="d-flex justify-content-center py-5">
        <button wire:click="getmore" class="btn rounded-0" style="background-color: #122944; color: #ffffff">Cargar más videos</button>
    </div>
</div>
