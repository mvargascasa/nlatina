<nav id="sidebarMenu" class="col-md-2 p-0 d-md-block bg-dark sidebar collapse" style="min-height: 100vh;">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item @if(Request::is('home')) bg-secondary @endif">
                <a class="nav-link text-light" href="{{ url('home') }}">Dashboard</a>
            </li>
            @if(Auth::user()->id == 1 || Auth::user()->id == 3)
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
        </ul>
    </div>
</nav>
