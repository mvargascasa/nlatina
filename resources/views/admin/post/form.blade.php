<!-- Column 1 -->
<div class="row">
    <div class="col-md-6">
        <div class="form-row">

            <div class="form-group col-md-5">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id',$categories,    null,    ['class' => 'form-control custom-select']) !!}
            </div>
            
            
            <div class="form-group col-md-5">
                {!! Form::label('consulate_id', 'Consulado') !!}
                {!! Form::select('consulate_id',[0=>'']+$consulates,    null,    ['class' => 'form-control custom-select']) !!}
            </div>

            <div class="form-group col-md-5">
                {!! Form::label('status', 'Status') !!}
                {!! Form::select('status',['BORRADOR' => 'BORRADOR','PUBLICADO' => 'PUBLICADO'],    null,    ['class' => 'form-control custom-select']) !!}
            </div>

            <div class="form-group col-md-5">
                {!! Form::label('reading_time', 'Tiempo de Lectura') !!}
                {!! Form::number('reading_time', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
        {!! Form::label('name', 'Titulo de Publicación') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('metadescrip', 'Meta Description') !!}
            {!! Form::text('metadescrip', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('keywords', 'Keywords') !!}
            {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
        </div>

    </div>


    <div class="col-md-6">

        <div class="form-row pt-4">
            <div class="form-group col-md-6">
                {!! Form::label('imgpostup', 'Imagen de Cabecera') !!}
                {!! Form::file('imgpostup',['class' => 'form-control']) !!}
            </div>
            @isset($post->imgdir)
                <div class="form-group col-md-6">**
                    <img src="{{url('uploads/i300_'.$post->imgdir)}}" alt="" width="150">
                </div>
            @endisset
        </div>

        <div class="form-row pt-4">
            <div class="form-group col-md-6">
                {!! Form::label('imgsmallup', 'Imagen en Texto') !!}
                {!! Form::file('imgsmallup',['class' => 'form-control']) !!}
            </div>
            @isset($post->imgsmall)
                <div class="form-group col-md-6">**
                    <img src="{{url('uploads/i300_'.$post->imgsmall)}}" alt="" width="150">
                </div>
            @endisset
        </div>

        <div class="form-row pt-4">
            <div class="form-group col-md-6">
                {!! Form::label('srcvideo', 'URL de Video') !!}
                {!! Form::text('srcvideo', null, ['class' => 'form-control']) !!}
            </div>
            @isset($post->srcvideo)
                <div class="form-group col-md-6">
                    <iframe class="ml-3" width="200" height="150" src="{{$post->srcvideo}}" frameborder="0"></iframe>
                </div>
            @endisset
        </div>

    </div>
    @if(isset($post))
    <div class="alert alert-secondary">       
        <span style="color:darkgray">Vista Previa en Buscador Google</span>
        <div style="width:600px;">
            <span id="goo_title" style="color:darkblue;font-size: 18px;text-transform: uppercase;">
                @isset($post->name){{$post->name}}@endisset</span><br>            
        <span id="goo_descript">@isset($post->metadescrip){{$post->metadescrip}}@endisset</span>
        </div>
  </div>
    @endif
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::submit('Guardar Publicación',  ['class' => 'btn btn-primary']) !!}
        </div>
            <div class="form-group">
                    {!! Form::label('body', 'Contenido') !!}
                    {!! Form::textarea('body', isset($post->body) && $post->body!=null ? $post->body : '',
                    ['class' => 'form-control','rows' => '10']) !!}
            </div>
    </div>
