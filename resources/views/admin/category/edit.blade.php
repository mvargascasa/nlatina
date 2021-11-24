@extends('layouts.app')

@section('scripts')

@endsection
@section('content')
<div class="col-9 mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header font-weight-bold">CATEGORIA

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <!-- Form Property -->
                                @if(isset($category))
                                {!! Form::model($category, ['route' => ['category.update',$category->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                @else
                                {!! Form::open(['route' => 'category.store','enctype' => 'multipart/form-data']) !!}
                                @endif
                                    @include('admin.category.form')
                                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('end-scripts')
<script>
    const delrowprice = (row) =>{
        row.parentElement.parentElement.parentElement.parentElement.remove();
    }
    const addrowprice = () => {
        rowTemplate =`<div class="row"> <div class="form-group col-6"> <input class="form-control" name="priced[]" type="text" value=""><br></div>
                        <div class="form-group col-6"> <div class="input-group">
                                <input class="form-control" name="pricev[]" type="text" value="">
                                <div class="input-group-append"> <button type="button" class="btn btn-danger" onclick="delrowprice(this)"> - </button> </div>
                        </div> </div> </div>`;
        document.getElementById('rowsprices').insertAdjacentHTML('beforeend',rowTemplate);
    }
</script>
@endsection
