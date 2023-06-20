<section class="container my-5">
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <h2>Ultimas Noticias</h2>
    <div class="row mt-4">
        @foreach ($listpost as $post)
        @php
            $dirimgwebp = "uploads/webp/i600_".str_replace('.jpg', '.webp', $post->imgdir);
            if(!file_exists(public_path($dirimgwebp))) $dirimgwebp = "uploads/i600_".str_replace('.webp', '.jpg', $post->imgdir);
        @endphp
        <div class="col-sm-12">
            <a href="{{ route('post.slug', $post->slug) }}" style="text-decoration: none">
                <article class="card-post border shadow-sm my-2 text-dark">
                    <div class="w-25">
                        <img class="img-fluid" src="{{ asset($dirimgwebp)}}" alt="{{ $post->name }}">
                    </div>
                    <div class="w-75 content-post">
                        <div class="p-3">
                            <div class="d-flex mb-2">
                                <div class="mr-2">
                                    <img width="40px" height="40px" src="{{ asset('img/user1.png')}}" alt="">
                                </div>
                                <div class="ml-2" style="font-size: 13px">
                                    <span class="text-muted">Administrador</span><br>
                                    <span class="text-muted">{{ $post->created_at->format('M d Y') }} @if($post->reading_time > 0) · {{ $post->reading_time }} min @endif</span>
                                </div>
                            </div>
                            <h5 class="card-title" style="font-size: 15px">{{ $post->name }}</h5>
                            <p class="card-text" style="font-size: 13px">{{ $post->metadescrip }}</p>
                        </div>
                    </div>
                </article>
            </a>
        </div>
        @endforeach
    </div>
</section>