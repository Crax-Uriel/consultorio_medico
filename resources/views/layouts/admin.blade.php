<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') </title>
    {{-- Icono de pestaña  --}}
    <link rel="icon" href="{{ asset('img/papeleria.png') }}" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/dash.css')}}">
    <!-- datatables  -->
    <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fullcalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src='{{url('fullcalendar/es.global.js')}}'></script>
    
    <!-- jQuery -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    {{-- CK5 EDITOR --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.3.0/ckeditor5.css" />

    </head>
    <body>
        <!-- MENU -->
        <section id="sidebar">
            <a href="{{url('/admin')}}" class="brand">
                <img src="{{url('img/logo_consu.png')}}" style="height: 60px; margin-right: 4px; float: left;">
                SISVITALIA</a>
            <ul class="side-menu">
                {{-- <li><a href="{{url('/admin')}}" class="active"><i class='bx bxs-dashboard icon'></i>Principal</a></li> --}}
                {{-- <li class="divider" data-text="main">Main</li> --}}

                {{-- seccion de configuracion  --}}
                {{-- <li>
                    <a href="#"><i class='bx bxs-cog icon' ></i>Configuración <i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/empresas/create')}}">Editar Configuracion</a></li>
                        
                    </ul>
                </li> --}}
                <li><a href="{{url('admin/perfil')}}"><i class='bx bx-cog icon' ></i>Perfil</a></li>

                @can('admin.configuraciones.index')
                <li><a href="{{url('admin/configuraciones')}}"><i class='bx bx-cog icon' ></i>Configuraciones</a></li>
                @endcan
                
                @can('admin.usuarios.index')
                <li>
                    <a href="#"><i class='bx bxs-group icon' ></i>Usuarios<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/usuarios')}}">Listado de usuarios</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Registrar usuario</a></li> 
                        
                    </ul>
                </li>
                @endcan

                @can('admin.secretarias.index')
                <li>
                    <a href="#"><i class='bx bxs-user icon' ></i>Secretarias<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/secretarias')}}">Listado de Secretarias</a></li>
                        <li><a href="{{url('admin/secretarias/create')}}">Registrar Secretaria</a></li> 
                        
                    </ul>
                </li>
                @endcan

                @can('admin.pacientes.index')
                <li>
                    <a href="#"><i class='bx bxs-user-rectangle icon' ></i>Pacientes<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/pacientes')}}">Listado de Pacientes</a></li>
                        <li><a href="{{url('admin/pacientes/create')}}">Registrar Pacientes</a></li> 
                        
                    </ul>
                </li>
                @endcan


                @can('admin.consultorios.index')
                <li>
                    <a href="#"><i class='bx bxs-buildings icon' ></i>Consultorios<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/consultorios')}}">Listado de Consultorios</a></li>
                        <li><a href="{{url('admin/consultorios/create')}}">Registrar Consultorio</a></li> 
                        
                    </ul>
                </li>
                @endcan

                @can('admin.doctores.index')
                <li>
                    <a href="#"><i class='bx bx-plus-medical icon' ></i>Doctores<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/doctores')}}">Listado de Doctores</a></li>
                        <li><a href="{{url('admin/doctores/create')}}">Registrar Doctor</a></li> 
                        
                    </ul>
                </li>
                @endcan

                @can('admin.horarios.index')
                <li>
                    <a href="#"><i class='bx bxs-timer icon' ></i>Horarios<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/horarios')}}">Listado de Horarios</a></li>
                        <li><a href="{{url('admin/horarios/create')}}">Registrar Doctor</a></li> 
                        
                    </ul>
                </li>
                @endcan

               


                @can('admin.historial.index')
                <li>
                    <a href="#"><i class='bx bxs-user-account icon' ></i>Historiales Clinicos<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/historial')}}">Listado de Historiales</a></li>
                        <li><a href="{{url('admin/historial/create')}}">Registrar hsitorial</a></li> 
                        <li><a href="{{url('admin/historial/buscar_paciente')}}">Buscar paciente</a></li> 
                        
                    </ul>
                </li>
                @endcan

                @can('admin.pagos.index')
                <li>
                    <a href="#"><i class='bx  bx-money icon' ></i>Pagos<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/pagos')}}">Listado de pagos</a></li>
                        <li><a href="{{url('admin/pagos/create')}}">Registrar pago</a></li> 
                        
                    </ul>
                </li>
                @endcan

                {{-- <li><a href="{{url('admin/roles')}}"><i class='bx bxs-user icon' ></i>Roles</a></li> --}}

                {{-- <li><a href="{{url('admin/usuarios')}}"><i class='bx bxs-group icon' ></i>Usuarios</a></li>

                <li><a href="{{url('admin/categorias')}}"><i class='bx bxs-category icon' ></i>Categorias</a></li>

                <li><a href="{{url('admin/productos')}}"><i class='bx bx-list-plus icon' ></i>Productos</a></li>

                <li><a href="{{url('admin/proveedores')}}"><i class='bx bx-group icon' ></i>Proveedores</a></li>


                <li><a href="{{url('admin/compras')}}"><i class='bx bx-cart-alt icon' ></i>Compras</a></li>
                 --}}
                {{-- Roles
                <li>
                    <a href="#"><i class='bx bxs-user icon' ></i>Roles <i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/roles')}}">Listado de roles</a></li>
                        li><a href="{{url('admin/roles/create')}}">Creacion de roles</a></li> 
                        
                    </ul>
                </li> --}}

                {{-- Usuarios
                <li>
                    <a href="#"><i class='bx bxs-group icon' ></i>Usuarios<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/usuarios')}}">Listado de usuarios</a></li>
                        {<li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li> 
                        
                    </ul>
                </li> --}}

                {{-- Categorias
                <li>
                    <a href="#"><i class='bx bxs-category icon' ></i>Categorias<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/categorias')}}">Listado de categorias</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li> 
                        
                    </ul>
                </li>
                --}}

                {{-- Productos
                <li>
                    <a href="#"><i class='bx bx-list-plus icon' ></i>Productos<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/productos')}}">Listado de Productos</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li> 
                        
                    </ul>
                </li>
                --}}

                {{-- proveedores
                <li>
                    <a href="#"><i class='bx bx-group icon' ></i>Proveedores<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/proveedores')}}">Listado de Proveedores</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li> 
                        
                    </ul>
                </li>
                --}}
                {{-- proveedores

                <li>
                    <a href="#"><i class='bx bx-cart-alt icon' ></i>Compras<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/compras')}}">Listado de Compras</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li>
                        
                    </ul>
                </li>
                --}}


                

                {{-- <li class="divider" data-text="seccion">opcion</li>
                <li><a href="#"><i class='bx bx-table icon' ></i> opcion</a></li>
                <li>
                    <a href="#"><i class='bx bxs-notepad icon' ></i> opcion <i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="#">opcion</a></li>
                        <li><a href="#">opcion</a></li>
                        <li><a href="#">opcion</a></li>
                        <li><a href="#">opcion</a></li>
                    </ul>
                </li> --}}


            </ul>
        </section>
        <!-- FIN MENU -->
    
        <!-- INICO NAVBAR PERFIL-->
        <section id="content">
            <!-- NAVBAR -->
            <nav>
                <i class='bx bx-menu toggle-sidebar' ></i>
                
                {{-- Salir de sesion  --}}
                <div class="profile">
                    {{ Auth::user()->name }} 
                    <img src="https://th.bing.com/th/id/OIP.f4wLVIL_SURqRFpL7fdr2QHaHa?rs=1&pid=ImgDetMain" alt="Perfil"> 
                
                    <ul class="profile-link">
                        <li ><a  href="{{ url('admin/perfil')}}" style="color: black"><i class='bx bxs-user' ></i> Perfil</a></li>

                        <li ><a  href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" ><i class='bx bxs-arrow-from-right' ></i> Salir</a></li>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </ul>

                    
                </div>
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                
                    
                    
                    
            </nav>
            <!-- FIN NAVBAR -->


            <!-- CUERPO PRINCIPAL DINAMICO -->
            <main>
                @yield('content') 
                
            </main>
            <!-- FIN CUERPO PRINCIPAL -->

        </section>
        <!-- FIN NAVBAR -->
        @if (($message = Session::get('mensaje')) && ($icono = Session::get('icono')) )
                        
            <script>
                Swal.fire({
                    position: "top-center",
                    icon: "{{$icono}}",
                    title: "{{$message}}",
                    showConfirmButton: false,
                    timer: 4600
                });
            </script>
        @endif
        
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{asset('js/script.js')}} "></script>



        <!-- Bootstrap 4 -->
        <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- DATATABLE 4 -->
        <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{url('dist/js/adminlte.min.js')}}"></script>
    </body>
    
</html>
