<div class="container my-5">
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <h2>Ultimas Noticias</h2>
    <div class="row mt-4">
        @foreach ($listpost as $post)
        <div class="col-sm-4">
            <div class="card w-100 h-100 rounded-0 shadow-sm">
                <img class="rounded-0" src="{{asset('uploads/'.$post->imgdir)}}" alt="{{ $post->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->name }}</h5>
                    <p class="card-text">{{ $post->metadescrip }}</p>
                </div>
                <div class="card-footer text-center bg-white">
                    <a href="{{ route('post.slug', $post->slug) }}" class="btn rounded-0" style="color: #ffffff; background-color: #002542">Leer artículo</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>