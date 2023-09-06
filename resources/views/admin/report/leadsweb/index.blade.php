@extends('layouts.app')

@section('scripts')
    <livewire:styles />
@endsection

@section('content')
    <section class="my-4 px-3">
        <h1>Leads provenientes del Sitio Web</h1>
        <livewire:leads-website :take="10" />
    </section>
@endsection

@section('end-scripts')
    <livewire:scripts />
@endsection