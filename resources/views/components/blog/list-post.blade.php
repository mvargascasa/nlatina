<section class="container my-5">
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <h2>Ultimas Noticias</h2>
    <div class="row mt-4">
        @foreach ($listpost as $post)
        <div class="col-sm-12">
            {{-- <div class="card w-100 h-100 rounded-0 shadow-sm">
                <img class="rounded-0" src="{{asset('uploads/'.$post->imgdir)}}" alt="{{ $post->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->name }}</h5>
                    <p class="card-text">{{ $post->metadescrip }}</p>
                </div>
                <div class="card-footer text-center bg-white">
                    <a href="{{ route('post.slug', $post->slug) }}" class="btn rounded-0" style="color: #ffffff; background-color: #002542">Leer artículo</a>
                </div>
            </div> --}}
            <a href="{{ route('post.slug', $post->slug) }}" style="text-decoration: none">
                <article class="card-post my-1 text-dark">
                    <div class="w-25 px-2">
                        <img class="img-fluid" src="{{asset('uploads/'.$post->imgdir)}}" alt="{{ $post->name }}">
                    </div>
                    <div class="w-75 content-post">
                        <div class="p-3">
                            <div class="d-flex mb-3">
                                <div class="mr-2">
                                    <img width="40px" height="40px" src="{{ asset('img/user1.png')}}" alt="">
                                </div>
                                <div class="ml-2" style="font-size: 13px">
                                    <span class="text-muted">Administrador</span><br>
                                    <span class="text-muted">{{ $post->created_at->format('M d Y') }} @if($post->reading_time > 0) · {{ $post->reading_time }} min @endif</span>
                                </div>
                            </div>
                            <h5 class="card-title">{{ $post->name }}</h5>
                            <p class="card-text">{{ $post->metadescrip }}</p>
                        </div>
                    </div>
                </article>
            </a>
        </div>
        @endforeach
    </div>
</section>