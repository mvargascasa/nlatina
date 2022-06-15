@extends('layouts.app')

@section('scripts')
@endsection
@section('content')
<div class="col-9 mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
            <div class="card-header font-weight-bold"> PUBLICACIÓN <span class="text-muted">Creado: @isset($post){{$post->created_at->format('d M y')}}@endisset</span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <!-- Form Property -->
                                @if(isset($post))
                                {!! Form::model($post, ['route' => ['post.update',$post->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                @else
                                {!! Form::open(['route' => 'post.store','enctype' => 'multipart/form-data']) !!}
                                @endif
                                    @include('admin.post.form')
                                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('end-scripts')

{{-- <script src="https://cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script> --}}
{{-- <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script> --}}
{{-- <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        CKEDITOR.replace('body');
    });
</script>
@endsection
