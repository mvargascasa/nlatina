<!-- Column 1 -->
<div class="row">
    <div class="col-md-6">



        <div class="form-group">
        {!! Form::label('name', 'Nombre de Categoria') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('detail', 'Detalle') !!}
        {!! Form::textarea('detail', isset($category->detail) && $category->detail!=null ? $category->detail : '', ['class' => 'form-control','rows' => '2']) !!}
        </div>

        <div class="form-row pt-4">
            <div class="form-group col-md-6">
                {!! Form::label('imgcatup', 'Imagen') !!}
                {!! Form::file('imgcatup',['class' => 'form-control']) !!}
            </div>
            @isset($category->imgdir)
                <div class="form-group col-md-6">**
                    <img src="{{url('uploads/i300_'.$category->imgdir)}}" alt="" width="150">
                </div>
            @endisset
        </div>
        <div class="form-group">
            {!! Form::submit('Guardar Categoria',  ['class' => 'btn btn-primary']) !!}
        </div>

    </div>


    </div>
