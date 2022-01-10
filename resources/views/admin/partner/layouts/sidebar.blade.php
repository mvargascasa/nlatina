<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<title>@yield('title-socios')</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
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

.btnLogout{
  position: absolute;
  bottom: 0px;
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
    <img style="border-radius: 10px" class="img-fluid" width="150" height="75" src="{{ asset('storage/'.Auth::guard('partner')->user()->img_profile) }}" alt="Imagen de usuario">
    @else
    <img class="img-fluid rounded-circle" width="150" height="75" src="{{ asset('img/user1.png') }}" alt="Imagen de usuario">
    @endif
  </div>
  <a href="{{ route('web.index') }}"><img width="30" height="30" src="{{ asset('img/partners/marca-notaria-latina.png') }}" alt=""> Notaria Latina</a>
  <a href="{{ route('socios.index') }}"><img width="25" height="25" src="{{ asset('img/partners/home_logo.png') }}" alt=""> Inicio</a>
  <a href="{{ route('socios.edit', Auth::guard('partner')->user()) }}"><img width="25" height="25" src="{{ asset('img/partners/user.png') }}" alt=""> Perfil</a>
  <div class="btnLogout">
    <a href="{{ route('socios.logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
    <img width="25" height="25" src="{{ asset('img/partners/logout.png') }}" alt="">
        {{ __('Cerrar Sesión') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</div>

<div id="main" style="background-color: rgb(244, 244, 252)">
  <button class="openbtn" onclick="openNav()">☰ Menú</button>  
    @yield('content')

</div>

<script defer src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script defer src="{{asset('js/popper.min.js')}}"></script>
<script defer src="{{asset('js/bootstrap.min.js')}}"></script>

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