<div>
    {{-- Stop trying to control. --}}
    @foreach ($posts as $post)
        <article class="d-flex justify-content-center my-4">
            <div class="card-post border w-100 shadow-lg">
                <a class="text-muted text-decoration-none" href="{{ route('post.slug', $post->slug) }}">
                    <img class="img-fluid" src="{{ asset('uploads/i900_'.$post->imgdir) }}" alt="">
                    <div class="p-3">
                        <div class="d-flex">
                            <img width="40px" src="{{ asset('img/user1.png') }}" alt="">
                            <div class="text-muted ml-3" style="font-size: 13px">
                                <span>Administrador</span><br>
                                <span>{{ $post->created_at->format('d M Y') }} @if($post->reading_time) · {{ $post->reading_time }} min @endif</span>
                            </div>
                        </div>
                        <p class="mt-3 font-weight-bold">{{ $post->name}}</p>
                        <p class="w-auto" style="font-size: 13px">{{ $post->metadescrip }}</p>
                    </div>
                </a>
            </div>
        </article>
    @endforeach

    <div class="w-75">
        <p><span class="font-weight-bold">{{$limitposts}}</span> artículos cargados de <span class="font-weight-bold">{{ $totalposts }}</span></p>
    </div>

    @if($limitposts < $totalposts)
        <div class="d-flex justify-content-center mb-5 mt-4">
            <button class="btn text-white rounded-0" style="background-color: #122944" wire:click="loadMore">Cargar más artículos</button>
        </div>
    @endif

</div>
