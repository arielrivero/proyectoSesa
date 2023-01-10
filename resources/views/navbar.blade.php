<!DOCTYPE html>
<html lang="en">

    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    @yield('title')
    </head>
    <body>
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                
                <img src="{{asset('img/logoSesa.png')}}" width="200" height="28">
                

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu ">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{url('/inicio')}}">
                        Inicio
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                        Analizar producto
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{url('cargar')}}">
                            Cargar archivo
                            </a>

                            <a class="navbar-item" href="{{url('empleados')}}">
                            Tabla de empleados
                            </a>

                            <a class="navbar-item" href="{{url('contabilidad')}}">
                            Contabilidad
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                        Control de glosas
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{url('glosas')}}">
                            Captura
                            </a>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                        Usuarios
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{url('/usuarios')}}">
                                Usuarios
                            </a>
                        </div>
                    </div>
                    
                </div>
            

                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            
                            {{ Auth::user()->name }}
                            
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{url('/profile')}}">
                                Perfil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="navbar-item" href="{{url('/logout')}}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                Cerrar sesión
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
                @yield('content')
            
        
    </body>

</html>