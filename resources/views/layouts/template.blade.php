<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title',"{{ config('app.name') }}")</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- =======================================================
  * Template Name: Bootslander - v4.9.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        .droptext {
            margin-top: 1em;


        }

        .dropsituacao {
            text-align: center;
            font-size: 1.3rem;
            text-decoration: none;
        }
    </style>
</head>


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center" style="color: black;">
        <div class=" container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href=" {{route('index')}}"><span>{{config('app.name')}}
                        </span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>


                    <li class="dropdown"><a href="#"><span>Usuario</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>


                            <li><a href="{{route('usuario.create')}}">Cadastrar</a></li>
                            <li><a href="{{route('usuario.index')}}">Exibir</a></li>


                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Exames</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>


                            <li><a href="{{route('requisicao.create')}}">Cadastrar</a></li>
                            <li><a href="{{route('requisicao.index')}}">Exibir</a></li>


                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><span>Atendimento</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>


                            <li><a href="{{route('atendimento.create')}}">Cadastrar</a></li>
                            <li><a href="{{route('atendimento.index')}}">Exibir</a></li>


                        </ul>
                    </li>


                    <li class="dropdown"><a href="#"><span>Agendamento</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>


                            <li><a href="{{route('agendamento.create')}}">Cadastrar</a></li>
                            <li><a href="{{route('agendamento.index')}}">Exibir</a></li>


                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Alistamento</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>


                            <li><a href="{{route('alistamento.create')}}">Cadastrar</a></li>
                            <li><a href="{{route('alistamento.index')}}">Exibir</a></li>


                        </ul>
                    </li>

                    @if(Auth::check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>

                                <li><a href="{{ route('profile.show') }}">Perfil</a></li>
                                <li class="dropdown"><a href="#"><span>Administrador</span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="{{route('register')}}">Cadastrar novo Administrador</a></li>
                                        <li><a href="#footer">Contato</a></li>
                                    </ul>
                                </li>
                                <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">Sair</a>
                                </li>


                            </ul>
                        </li>



                        </a>

                    </form>

                    @endif


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            @if (session('mensagem'))
            <div class="alert alert-success alert-dismissible fade show" style="text-align: center;" role="alert">
                <strong>Atenção!</strong>

                {{ session('mensagem') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @endif
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" style="text-align: center;" role="alert">
                <strong>Atenção!</strong>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" style="text-align: center;" role="alert">
                <strong>Atenção!</strong>
                {{ session('danger') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" style="text-align: center;" role="alert">
                <strong>Atenção!</strong>
                {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>@yield('pagina','Inicio')</h2>
                    <ol>
                        <li><a href="/">Inicio</a></li>
                        <li>@yield('pagina2','Inicio')</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <p>

                    @yield('content')
                </p>
            </div>
        </section>

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-6">
                        <div class="footer-info">
                            <h3>Adriano Barbosa</h3>
                            <p class="pb-3"><em>Desenvolvedor</em></p>
                            <p>
                                Santo Amaro - Bahia <br>
                                CEP 44200000, BRASIL<br><br>

                                <strong>Email: </strong>adrianobarbosa95@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->
    <style>
        .required:after {
            content: " *";
            color: red;
        }
    </style>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>