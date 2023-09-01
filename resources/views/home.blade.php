@extends('layouts.app')

@section('scripts')
<livewire:styles />
@endsection

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    Dashboard
                    <span class="float-right font-weight-bold" style="cursor: pointer" onclick="this.parentElement.parentElement.classList.add('d-none')">
                        X
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="mt-4">
                <p class="font-weight-bold">Ultimos 5 leads a la página</p>
                <livewire:leads-website :take="5" />
                <div class="d-flex justify-content-end">
                    <a class="btn btn-info rounded-0" href="{{ route('home.report.index.leads.web') }}">Ver todo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('end-scripts')
<livewire:scripts />
@endsection
