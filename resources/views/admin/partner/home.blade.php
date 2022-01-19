@extends('admin.partner.layouts.sidebar')

@section('title-socios', 'Inicio Socios - Notaria Latina')

@section('scripts')

@endsection

@section('content')
    <div class="mt-4">
        <h1>Bienvenido {{ Auth::guard('partner')->user()->name }} {{ Auth::guard('partner')->user()->lastname }}</h1>
    </div>
@endsection

@section('end-scripts')
    
@endsection