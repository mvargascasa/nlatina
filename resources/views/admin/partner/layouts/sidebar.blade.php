<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>

@yield('scripts')

</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <div class="d-flex justify-content-center mb-4">
    @if (Auth::guard('partner')->user()->img_profile != null)
    <img class="img-fluid rounded-circle" width="150" height="75" src="{{ asset('storage/'.Auth::guard('partner')->user()->img_profile) }}" alt="Imagen de usuario">
    @else
    <img class="img-fluid rounded-circle" width="150" height="75" src="{{ asset('img/user1.png') }}" alt="Imagen de usuario">
    @endif
  </div>
  <a href="{{ route('socios.index') }}">Inicio</a>
  <a href="{{ route('socios.edit', Auth::guard('partner')->user()) }}">Perfil</a>
  <div>
    <a href="{{ route('socios.logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Cerrar Sesión') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Menú</button>  
  {{-- <h2>Collapsed Sidebar</h2>
  <p>Click on the hamburger menu/bar icon to open the sidebar, and push this content to the right.</p> --}}
    @yield('content')

</div>

@yield('end-scripts')

<script>

  window.onload = function(){
    openNav();
  }
  
  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }

</script>
   
</body>
</html> 