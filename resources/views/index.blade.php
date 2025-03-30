<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Vitalia</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>

   <!-- Theme style -->
   <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
</head>
    <body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contacto@gmail.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+52 729 308 0344</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
        </div><!-- End Top Bar -->

        <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Vitalia</h1>
            </a>

            <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Inicio<br></a></li>
                <li><a href="#about">Acerca de Nosotros</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="#departments">Departamentos</a></li>
                <li><a href="#doctors">Doctores</a></li>
                {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="#">Dropdown 1</a></li>
                    <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Deep Dropdown 1</a></li>
                        <li><a href="#">Deep Dropdown 2</a></li>
                        <li><a href="#">Deep Dropdown 3</a></li>
                        <li><a href="#">Deep Dropdown 4</a></li>
                        <li><a href="#">Deep Dropdown 5</a></li>
                    </ul>
                    </li>
                    <li><a href="#">Dropdown 2</a></li>
                    <li><a href="#">Dropdown 3</a></li>
                    <li><a href="#">Dropdown 4</a></li>
                </ul>
                </li> --}}
                <li><a href="#contact">Contacto</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="cta-btn d-none d-sm-block" href="{{url('login')}}">Ingresar</a>

        </div>

        </div>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

        <div class="container position-relative">

            <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
            <h2>BIENVENIDO A VITALIA</h2>
            <p>Siempre a tu lado, siempre saludables.
            </p>
            </div><!-- End Welcome -->

            <div class="content row gy-4">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                <h3>¿Por qué elegir Vitalia?</h3>
                <p>En Vitalia nos comprometemos a ofrecer un servicio excepcional y personalizado para cada uno de nuestros pacientes. Aquí te damos algunas razones por las que somos la mejor opción para tu salud:</p>

                
                </div>
            </div><!-- End Why Box -->

            {{-- <div class="col-lg-8 d-flex align-items-stretch">
                <div class="d-flex flex-column justify-content-center">
                <div class="row gy-4">

                    <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                        <i class="bi bi-clipboard-data"></i>
                        <h4>Corporis voluptates officia eiusmod</h4>
                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                    </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                        <i class="bi bi-gem"></i>
                        <h4>Ullamco laboris ladore pan</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                    </div>
                    </div><!-- End Icon Box -->

                    <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                        <i class="bi bi-inboxes"></i>
                        <h4>Labore consequatur incidid dolore</h4>
                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                    </div>
                    </div><!-- End Icon Box -->

                </div>
                </div>
            </div>
            </div><!-- End  Content--> --}}

        </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4 gx-5">

            <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                <img src="assets/img/about.jpg" class="img-fluid" alt="">
                <a href="https://youtu.be/yrjI2tsfnWA?si=B9toYzxBaU0NVQf4" class="glightbox pulsating-play-btn"></a>
            </div>

            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <h3>Acerca de Nosotros</h3>
                <p>
                    En nuestro consultorio médico, nos dedicamos a proporcionar atención de calidad con un enfoque integral, humano y profesional. Nos preocupamos por la salud y bienestar de cada paciente, ofreciendo un servicio basado en la confianza, el respeto y la excelencia médica.


                </p>
                <ul>
                <li>
                    <i class="fa-solid fa-vial-circle-check"></i>
                    <div>
                    <h5>Atención Médica Confiable y Precisa</h5>
                    <p>Realizamos evaluaciones médicas detalladas con tecnología avanzada para garantizar diagnósticos certeros y tratamientos adecuados.</p>
                    </div>
                </li>
                <li>
                    <i class="fa-solid fa-pump-medical"></i>
                    <div>
                    <h5>Equipamiento y Procedimientos Innovadores</h5>
                    <p>Contamos con equipos de última generación y procedimientos especializados para ofrecer soluciones médicas seguras y eficientes.</p>
                    </div>
                </li>
                <li>
                    <i class="bi-solid bi bi-heart-pulse"></i>
                    <div>
                    <h5>Cuidado perzonlizado y Cercano</h5>
                    <p>Nos enfocamos en brindar un trato cálido y empático, asegurando que cada paciente se sienta escuchado y atendido con respeto y profesionalismo.</p>
                    </div>
                </li>
                </ul>
            </div>

            </div>

        </div>

        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="fa-solid fa-user-doctor"></i>
                <div class="stats-item">
                <span data-purecounter-start="0" data-purecounter-end="{{$total_doctores}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Doctores</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="fa-regular fa-hospital"></i>
                <div class="stats-item">
                <span data-purecounter-start="0" data-purecounter-end="{{$total_consultorios}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Departamentos</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="fas fa-flask"></i>
                <div class="stats-item">
                <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="1" class="purecounter"></span>
                <p>Servicios</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="fas fa-award"></i>
                <div class="stats-item">
                <span data-purecounter-start="0" data-purecounter-end=" {{$total_pacientes}} " data-purecounter-duration="1" class="purecounter"></span>
                <p>Pacientes</p>
                </div>
            </div><!-- End Stats Item -->

            </div>

        </div>

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Servicios</h2>
            <p>Ofrecemos una amplia gama de servicios médicos diseñados para cuidar tu salud y bienestar. Contamos con tecnología avanzada y un equipo de especialistas comprometidos con brindar atención de calidad en cada consulta y tratamiento.

            </p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item  position-relative">
                <div class="icon">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <a href="#" class="stretched-link">
                    <h3>Chequeo Médico General 🩺
                    </h3>
                </a>
                <p>Exámenes completos para evaluar tu estado de salud y prevenir posibles enfermedades.

                </p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                <div class="icon">
                    <i class="fas fa-pills"></i>
                </div>
                <a href="#" class="stretched-link">
                    <h3>Dispensación de Medicamentos 💊
                    </h3>
                </a>
                <p>Orientación y suministro de medicamentos bajo prescripción médica para tu tratamiento.

                </p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                <div class="icon">
                    <i class="fas fa-hospital-user"></i>
                </div>
                <a href="#" class="stretched-link">
                    <h3>Atención Especializada 🏥
                    </h3>
                </a>
                <p>Consultas con especialistas en diferentes áreas de la salud para un diagnóstico preciso.

                </p>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item position-relative">
                <div class="icon">
                    <i class="fas fa-dna"></i>
                </div>
                <a href="#" class="stretched-link">
                    <h3>Pruebas de Laboratorio y Diagnóstico 🧬
                    </h3>
                </a>
                <p>Análisis clínicos y estudios médicos para un mejor control y tratamiento de enfermedades.

                </p>
                <a href="#" class="stretched-link"></a>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-item position-relative">
                <div class="icon">
                    <i class="fas fa-wheelchair"></i>
                </div>
                <a href="#" class="stretched-link">
                    <h3>Fisioterapia y Rehabilitación ♿
                    </h3>
                </a>
                <p>Terapias especializadas para mejorar la movilidad y recuperación de lesiones.

                </p>
                <a href="#" class="stretched-link"></a>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <div class="service-item position-relative">
                <div class="icon">
                    <i class="fas fa-notes-medical"></i>
                </div>
                <a href="#" class="stretched-link">
                    <h3>Historial y Control Médico 📋
                    </h3>
                </a>
                <p>Registro detallado de consultas, tratamientos y evolución de tu salud.

                </p>
                <a href="#" class="stretched-link"></a>
                </div>
            </div><!-- End Service Item -->

            </div>

        </div>

        </section><!-- /Services Section -->



         <!-- Appointment Section -->
         <section id="appointment" class="appointment section">
            <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Concurridos de personas</h2>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Días más concurridos</h3>
            </div>
            <div class="card-body">
                <canvas id="chartDias"></canvas>
            </div>
                <!-- /.card-body -->
        </div>

    </div><!-- End Section Title -->

        

    </section><!-- /Appointment Section -->


        <!-- Appointment Section -->
        <section id="appointment" class="appointment section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Calendario de atencion de doctores</h2>

            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header ">
                        <div class="col-md-12" style="text-align: center">
                            <h3 class="card-title">Horarios de atencion</h3>
                        </div>
                        
                        <div class="form-group">
                            <label><b>Consultorios:</b></label>
                            <select name="consultorio_id" id="consultorio_select" class="form-control">
                                <option value="" disabled selected>Seleccione un consultorio..</option>
                                @foreach ($consultorios as $consultorio)
                                    <option value="{{$consultorio->id}}">{{$consultorio->nombre_consultorio." - ".$consultorio->ubicacion}}</option>
                                @endforeach
                            </select>
                            @error('consultorio_id')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="card-body" >
                        
                        <script>
                            $('#consultorio_select').on('change',function(){
                                var consultorio_id = $('#consultorio_select').val();
                                //alert(consultorio_id);
                                if (consultorio_id) {
                                    $.ajax({
                                        url:'/consultorios/'+consultorio_id,
                                        type:'GET',
                                        success: function(data){
                                            //console.log(data);  // Verifica qué datos estás recibiendo
                                            $('#consultorio_info').html(data);
                                        },
                                        error: function(){
                                            alert('Error al obtener los datos del consultorio')
                                        }
                                    });
                                }else{
                                    $('#consultorio_info').html('');
                                }
                            });
                        </script>
                        <div id="consultorio_info">
        
                        </div>
                        <hr>
                        
                    </div>
                </div>
            </div>

        </div><!-- End Section Title -->

        

        </section><!-- /Appointment Section -->

        <!-- Departments Section -->
        <section id="departments" class="departments section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Departamentos</h2>
            <p>En nuestra institución, contamos con diversas especialidades médicas para atender las necesidades de nuestros pacientes. A continuación, presentamos los departamentos disponibles:

            </p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" href="#departments-tab-1">Cardiología</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-2">Neurología</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-3">Hepatología</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-4">Pediatría</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#departments-tab-5">Cuidado Ocular
                    </a>
                </li>
                </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                <div class="tab-pane active show" id="departments-tab-1">
                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <h3>Cardiología</h3>
                        <p class="fst-italic">Nos especializamos en el estudio y tratamiento de enfermedades del corazón y del sistema circulatorio. Nuestro equipo de expertos ofrece diagnósticos y tratamientos avanzados para garantizar la salud cardiovascular de nuestros pacientes.

                        </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                    </div>
                    </div>
                </div>
                <div class="tab-pane" id="departments-tab-2">
                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <h3>Neurología</h3>
                        <p class="fst-italic">Brindamos atención integral para trastornos del sistema nervioso, incluyendo enfermedades cerebrales, de la médula espinal y los nervios periféricos. Nuestro enfoque se basa en tecnología avanzada y un equipo altamente capacitado.

                        </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <img src="assets/img/departments-2.jpg" alt="" class="img-fluid">
                    </div>
                    </div>
                </div>
                <div class="tab-pane" id="departments-tab-3">
                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <h3>Hepatología</h3>
                        <p class="fst-italic">Nos enfocamos en el diagnóstico y tratamiento de enfermedades hepáticas, como la cirrosis, hepatitis y trastornos metabólicos. Proporcionamos evaluaciones especializadas y tratamientos innovadores para la salud del hígado.

                        </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <img src="assets/img/departments-3.jpg" alt="" class="img-fluid">
                    </div>
                    </div>
                </div>
                <div class="tab-pane" id="departments-tab-4">
                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <h3>Pediatría</h3>
                        <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                        <p>Atendemos a niños desde recién nacidos hasta la adolescencia, brindando cuidados médicos preventivos, diagnósticos y tratamientos para garantizar su bienestar y desarrollo saludable.

                        </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <img src="assets/img/departments-4.jpg" alt="" class="img-fluid">
                    </div>
                    </div>
                </div>
                <div class="tab-pane" id="departments-tab-5">
                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <h3>Cuidado Ocular</h3>
                        <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                        <p>Ofrecemos atención especializada para la salud visual, desde exámenes de rutina hasta tratamientos avanzados para enfermedades oculares. Nuestro equipo está comprometido con la protección y mejora de la visión de nuestros pacientes.

                        </p>
                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <img src="assets/img/departments-5.jpg" alt="" class="img-fluid">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>
        {{-- //ia agregada  --}}
        </section><!-- /Departments Section -->

        <!-- Doctors Section -->
        <section id="doctors" class="doctors section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Doctores</h2>
            <p>Contamos con un equipo de profesionales altamente capacitados y comprometidos con la salud y el bienestar de nuestros pacientes.

            </p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                    <h4>Dr. Walter White
                    </h4>
                    <span>Director Médico</span>
                    <p>Especialista con amplia experiencia en el sector, dedicado a ofrecer atención de calidad y liderar el equipo médico con excelencia.</p>
                    <div class="social">
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""> <i class="bi bi-linkedin"></i> </a>
                    </div>
                </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                    <h4>Dr. Walter White
                    </h4>
                    <span>Director Médico</span>
                    <p>Especialista con amplia experiencia en el sector, dedicado a ofrecer atención de calidad y liderar el equipo médico con excelencia.</p>
                    <div class="social">
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""> <i class="bi bi-linkedin"></i> </a>
                    </div>
                </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                    <h4>Dr. Walter White
                    </h4>
                    <span>Director Médico</span>
                    <p>Especialista con amplia experiencia en el sector, dedicado a ofrecer atención de calidad y liderar el equipo médico con excelencia.</p>
                    <div class="social">
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""> <i class="bi bi-linkedin"></i> </a>
                    </div>
                </div>
                </div>
            </div><!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/doctors/doctors-4.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                    <h4>Dr. Walter White
                    </h4>
                    <span>Director Médico</span>
                    <p>Especialista con amplia experiencia en el sector, dedicado a ofrecer atención de calidad y liderar el equipo médico con excelencia.</p>
                    <div class="social">
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""> <i class="bi bi-linkedin"></i> </a>
                    </div>
                </div>
                </div>
            </div><!-- End Team Member -->

            </div>

        </div>

        </section><!-- /Doctors Section -->

        <!-- Faq Section -->
        <section id="faq" class="faq section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Preguntas Frecuentes
            </h2>
            <p>A continuación, respondemos algunas de las preguntas más comunes sobre nuestros servicios:

            </p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

            <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                <div class="faq-container">

                <div class="faq-item faq-active">
                    <h3>1. ¿Cómo puedo agendar una cita?
                    </h3>
                    <div class="faq-content">
                    <p>Puedes agendar una cita a través de nuestra página web, llamando a nuestro número de atención o visitando nuestras instalaciones.

                    </p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->

                <div class="faq-item">
                    <h3>2. ¿Cuáles son los métodos de pago aceptados?
                    </h3>
                    <div class="faq-content">
                    <p>Aceptamos pagos en efectivo, tarjeta de crédito/débito y transferencias bancarias.

                    </p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->

                <div class="faq-item">
                    <h3>6. ¿Cuentan con garantía en sus servicios?
                    </h3>
                    <div class="faq-content">
                    <p>Sí, ofrecemos garantía en nuestros servicios. Para más detalles, consulta nuestras políticas.

                    </p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->

                

                {{-- <div class="faq-item">
                    <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                    <div class="faq-content">
                    <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item--> --}}

                {{-- <div class="faq-item">
                    <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                    <div class="faq-content">
                    <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed in suscipit sequi. Distinctio ipsam dolore et.</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item--> --}}

                </div>

            </div><!-- End Faq Column-->

            </div>

        </div>

        </section><!-- /Faq Section -->

       

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Galería</h2>
            <p>Explora nuestra colección de imágenes que capturan los mejores momentos y experiencias.</p>
        </div><!-- End Section Title -->

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-1.jpg" class="glightbox" data-gallery="images-gallery">
                    <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-2.jpg" class="glightbox" data-gallery="images-gallery">
                    <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-3.jpg" class="glightbox" data-gallery="images-gallery">
                    <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-4.jpg" class="glightbox" data-gallery="images-gallery">
                    <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-5.jpg" class="glightbox" data-gallery="images-gallery">
                    <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-6.jpg" class="glightbox" data-gallery="images-gallery">
                    <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-7.jpg" class="glightbox" data-gallery="images-gallery">
                    <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div><!-- End Gallery Item -->

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-8.jpg" class="glightbox" data-gallery="images-gallery">
                    <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div><!-- End Gallery Item -->

            </div>

        </div>

        </section><!-- /Gallery Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contacto</h2>
            <p>Si tienes alguna pregunta o deseas obtener más información, no dudes en ponerte en contacto con nosotros. Estamos aquí para ayudarte.</p>
        </div><!-- End Section Title -->

        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            {{-- <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202521.67122149369!2d-99.38702981972975!3d19.4068609777053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f90d1716053b%3A0xaa08f1947f67f3b2!2sPunto%20Clinico%20Especialistas%20-%20Marina%20Nacional!5e0!3m2!1ses!2smx!4v1741629831266!5m2!1ses!2smx" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

            <div class="col-lg-4">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                    <h3>Direccion:</h3>
                    <p>Av. Marina Nacional 123, Anáhuac I Secc, Miguel Hidalgo, 11320 Ciudad de México, CDMX
                    </p>
                </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                    <h3>Telefono</h3>
                    <p>+52 7293080344
                    </p>
                </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                    <h3>Correo Electronico</h3>
                    <p>hola@gmail.com</p>
                </div>
                </div><!-- End Info Item -->

            </div>

            {{-- <div class="col-lg-8">
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4">

                    <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                    </div>

                    <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                    </div>

                    <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                    </div>

                    <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit">Send Message</button>
                    </div>

                </div>
                </form>
            </div><!-- End Contact Form --> --}}

            </div>

        </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.html" class="logo d-flex align-items-center">
                <span class="sitename">VITALIA</span>
            </a>
            <div class="footer-contact pt-3">
                <p>Av. Marina Nacional 123, Anáhuac I Secc, Miguel Hidalgo, 11320 
                    </p>
                <p>Ciudad de México, CDMX</p>
                <p class="mt-3"><strong>Phone:</strong> <span>+52 89448</span></p>
                <p><strong>Correo electronico:</strong> <span>hola@gmail.com</span></p>
            </div>
            <div class="social-links d-flex mt-4">
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
            </div>
            </div>

            {{-- <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Terms of service</a></li>
                <li><a href="#">Privacy policy</a></li>
            </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
                <li><a href="#">Web Design</a></li>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">Product Management</a></li>
                <li><a href="#">Marketing</a></li>
                <li><a href="#">Graphic Design</a></li>
            </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
            <h4>Hic solutasetp</h4>
            <ul>
                <li><a href="#">Molestiae accusamus iure</a></li>
                <li><a href="#">Excepturi dignissimos</a></li>
                <li><a href="#">Suscipit distinctio</a></li>
                <li><a href="#">Dilecta</a></li>
                <li><a href="#">Sit quas consectetur</a></li>
            </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nobis illum</h4>
            <ul>
                <li><a href="#">Ipsam</a></li>
                <li><a href="#">Laudantium dolorum</a></li>
                <li><a href="#">Dinera</a></li>
                <li><a href="#">Trodelas</a></li>
                <li><a href="#">Flexo</a></li>
            </ul>
            </div> --}}

        </div>
        </div>

        <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">VITALIA</strong> <span>Todos los derechos reservados</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
        </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('dist/js/adminlte.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{asset('js/script.js')}} "></script>

    <script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Datos de concurrencia simulados (reemplázalos con datos reales)
                let dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
                let concurrenciaDias = [0, 0, 0, 0, 0, 0, 0]; // Número de personas por día
            
                // Gráfico de concurrencia por días
                var ctxDias = document.getElementById("chartDias").getContext("2d");
                new Chart(ctxDias, {
                    type: "bar",
                    data: {
                        labels: dias,
                        datasets: [{
                            label: "Personas",
                            data: concurrenciaDias,
                            backgroundColor: "rgba(60,141,188,0.7)",
                            borderColor: "rgba(60,141,188,1)",
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            });
            </script>


    <script>
        window.addEventListener('mouseover', initLandbot, { once: true });
        window.addEventListener('touchstart', initLandbot, { once: true });
        var myLandbot;
        function initLandbot() {
        if (!myLandbot) {
            var s = document.createElement('script');
            s.type = "module"
            s.async = true;
            s.addEventListener('load', function() {
            var myLandbot = new Landbot.Livechat({
                configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-2845549-KJOEGQJLIBJDDXTA/index.json',
            });
            });
            s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.mjs';
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        }
        }
    </script>

    </body>

</html>