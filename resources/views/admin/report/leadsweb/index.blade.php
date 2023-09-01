@extends('layouts.app')

@section('scripts')
    <livewire:styles />
@endsection

@section('content')
    <div>
        <h1>Leads Website</h1>
        <livewire:leads-website :take="10" />
    </div>
@endsection

@section('end-scripts')
    <livewire:scripts />
@endsection