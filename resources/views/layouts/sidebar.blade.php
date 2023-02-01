@php
    $count_notifications = DB::table('updated_partner')->where('viewed', 0)->count();
@endphp
<nav id="sidebarMenu" class="col-md-2 p-0 d-md-block bg-dark sidebar collapse" style="min-height: 100vh; background-color: #002542 !important; color: #ffffff">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item @if(Request::is('home')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
            </li>
            {{-- @if(Auth::user()->id == 1 || Auth::user()->id == 2 || Auth::user()->id == 4) --}}
            <li class="nav-item @if(Request::is('home/post*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/posts') }}"><i class="fa-regular fa-newspaper"></i> Publicaciones</a>
            </li>
            <li class="nav-item @if(Request::is('home/categor*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/categories') }}"><i class="fa-solid fa-bars"></i> Categorias</a>
            </li>
            {{-- @endif --}}
            <li class="nav-item @if(Request::is('home/partners*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/partners') }}"><i class="fa-solid fa-handshake"></i> Partners</a>
            </li>
            <li class="nav-item @if(Request::is('home/user*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/user') }}"> <i class="fa-solid fa-user"></i> Usuario</a>
            </li>
            <li class="nav-item @if(Request::is('home/emails*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/emails') }}"><i class="fa-solid fa-envelope"></i> Correos Enviados</a>
            </li>
            <li class="nav-item @if(Request::is('home/notications*')) bg-secondary @endif">
                <a class="nav-link text-light d-flex" href="{{ route('partner.index.notifications') }}"><i class="fa-solid fa-bell mr-1"></i> Notificaciones <div class="bg-danger float-right mx-3 px-2 rounded">@if($count_notifications > 0) {{$count_notifications}} @else 0 @endif</div></a>
            </li>
            <li class="nav-item @if(Request::is('home/reports*')) bg-secondary @endif">
                <a class="nav-link text-light d-flex" href="{{route('home.partner.report.index')}}"><i class="fa-solid fa-file mr-1"></i> Reportes</a>
            </li>
            <li class="nav-item @if(Request::is('home/videos*')) bg-secondary @endif">
                <a class="nav-link text-light d-flex" href="{{route('home.videos.index')}}"><i class="fas fa-video mr-1"></i> Videos</a>
            </li>
        </ul>
    </div>
</nav>
