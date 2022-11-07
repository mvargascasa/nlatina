@extends('layouts.app')

@section('scripts')
<style>
    a{text-decoration: none !important;color: #000000}
</style>
@endsection

@section('content')
<div class="container col-md-10 mt-3">
    <div>
        @if(count($changes)>0)
        @foreach ($changes as $change)
        @php
            $partner = \App\Partner::find($change->partner_id);
        @endphp
            <form action="{{route('partner.set.viewed.notification', $change->id_updated_partner)}}" method="POST" onclick="this.submit()" style="cursor: pointer">
                @csrf
                <div class="card mb-2">
                    <div class="card-header d-flex">
                        Informacion Actualizada
                        @if($change->viewed)
                        <div class="bg-success text-white mx-2 px-2 rounded">visto</div>
                        @else
                        <div class="bg-danger text-white mx-2 px-2 rounded">new</div>
                        @endif
                    </div>
                    <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>El partner {{$partner->name . " " . $partner->lastname}} ha actualizado los siguientes campos <b class="font-weight-bolder">{{str_replace(",", ", ", $change->value_change)}}</b></p>
                        <footer class="blockquote-footer"><cite title="Source Title">{{$change->created_at}}</cite></footer>
                    </blockquote>
                    </div>
                </div>
            </form>
        @endforeach
        <div>
            {{$changes->links()}}
        </div>
        @else
            <div>
                No se encontraron notificaciones
            </div>
        @endif
    </div>
</div>
@endsection

@section('end-scripts')

@endsection