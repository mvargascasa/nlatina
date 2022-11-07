@php
    $count_notifications = DB::table('updated_partner')->where('viewed', 0)->count();
@endphp
<nav id="sidebarMenu" class="col-md-2 p-0 d-md-block bg-dark sidebar collapse" style="min-height: 100vh;">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item @if(Request::is('home')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home') }}">Dashboard</a>
            </li>
            @if(Auth::user()->id == 1 || Auth::user()->id == 2 || Auth::user()->id == 4)
            <li class="nav-item @if(Request::is('home/post*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/posts') }}">Publicaciones</a>
            </li>
            <li class="nav-item @if(Request::is('home/categor*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/categories') }}">Categorias</a>
            </li>
            @endif
            <li class="nav-item @if(Request::is('home/partners*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/partners') }}">Partners</a>
            </li>
            <li class="nav-item @if(Request::is('home/user*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/user') }}">Usuario</a>
            </li>
            <li class="nav-item @if(Request::is('home/emails*')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home/emails') }}">Correos Enviados</a>
            </li>
            <li class="nav-item @if(Request::is('home/notications*')) bg-secondary @endif">
                <a class="nav-link text-light d-flex" href="{{ route('partner.index.notifications') }}">Notificaciones <div class="bg-danger float-right mx-3 px-2 rounded">@if($count_notifications > 0) {{$count_notifications}} @else 0 @endif</div></a>
            </li>
        </ul>
    </div>
</nav>
