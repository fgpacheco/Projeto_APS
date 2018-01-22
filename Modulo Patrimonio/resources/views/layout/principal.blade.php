<!DOCTYPE html>
<html lang="pt">
    <head>

        <style>
        </style>


        <title>{{ config('principal.title', 'Módulo Patrimônio') }}</title>



        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="/ProjetoPW/public/css/prim.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/ProjetoPW/public/css/pad.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/prim.css') }}" rel="stylesheet">

    </head>
    <body>

        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach</ul>

        </div>
        @endif
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"  href="/index">
                            <img width="30" height="30" class="img-responsive2" src="http://ww3.uag.ufrpe.br/sites/ww3.uag.ufrpe.br/files/logo_uag_0.png">
                        </a>
                        <a class="navbar-brand" href="/index">{{ config('principal.name', 'Patrimonio') }}</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">

                            @if (!Auth::guest())
                            <li class="dropdown1 row-sm-3">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pessoas </a>
                                <ul class="dropdown-menu">
                                    @can('acessoRestrito-global')
                                    <li><a href="{{action('UsuarioController@lista')}}">Usuarios</a></li>
                                    <li role="separator" class="divider"></li>
                                    @endcan
                                    <li><a href="{{action('ServidorController@listar')}}">Servidor</a></li>
                                </ul>
                            </li>
                            <li class="dropdown1 row-sm-3">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Locais</a>
                                <ul class="dropdown-menu ">

                                    <li><a href="{{action('SetorController@listar')}}" >Setor</a></li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="{{action('DepartamentoController@lista')}}" >Departamento</a></li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="{{action('SalaController@listar')}}">Sala</a></li>
                                    <li role="separator" class="divider"></li>

                                    <li><a href="{{action('PredioController@listar')}}" >Prédio</a> </li>
                                </ul>
                            </li>
                            <li class="dropdown1 row-sm-3">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bem Permanente</a>
                                <ul class="dropdown-menu ">
                                    <li ><a tabindex="-1" href="{{action('SolicitacaoController@listar')}}" >Solicitação</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a class="test" tabindex="-1" href="#">Listar<span class="caret"></span></a>
                                        <ul class="dropdown-menu ">
                                            <li><a href="{{action('PatrimonioController@listar')}}" >Todos</a></li>
                                            <li><a href="{{action('PatrimonioController@relatorioSetor')}}">Por Setor</a></li>
                                            <li><a href="{{action('PatrimonioController@relatorioSala')}}">Por Sala</a></li>
                                            <li><a href="{{action('PatrimonioController@relatorioNotaFiscal')}}">Por Nota Fiscal</a></li>
                                            <li><a href="{{action('PatrimonioController@relatorioEmpenho')}}">Por Empenho</a></li>							
                                            <li><a href="{{action('PatrimonioController@listarDescartados')}}">Descartados</a></li>
                                        </ul>
                                    </li>
                                </ul>  
                            </li>
                            <li class="dropdown1 row-sm-3">
                                <a href="{{action('PDFController@selecao')}}">Relatórios</a>
                            </li>

                            @endif
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @can('acessoRestrito-global')
                                    <li><a href="#" >Configuraçao</a></li>
                                    @endcan
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            @yield('conteudo')


            <footer class="footer" role="separator" class="divider">

                <p>© Programação web
                </p>
            </footer>
        </div>



        <script src="{{ asset('/js/app.js') }}"></script>


    </body>

    <script type="text/javascript">$(document).ready(function () {
    $(".dropdown1").hover(
            function () {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
                $(this).toggleClass('open');
            }
    );
});
$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});

    </script>


    <style type="text/css">
        body,html {
            font-family: 'Open Sans', 'sans-serif';
            height: 100%;
            background-repeat: repeat-y;
            background-image: linear-gradient(rgb(217, 227, 231), rgb(217, 227, 231));
        }
        .mega-dropdown {
            position: static !important;
        }
        .mega-dropdown-menu {
            padding: 20px 0px;
            width: 100%;
            box-shadow: none;
            -webkit-box-shadow: none;
        }
        .mega-dropdown-menu > li > ul {
            padding: 0;
            margin: 1px;
        }
        .mega-dropdown-menu > li > ul > li {
            list-style: none;
        }
        .mega-dropdown-menu > li > ul > li > a {
            display: block;
            color: #222;
            padding: 3px 5px;
        }
        .mega-dropdown-menu > li ul > li > a:hover,
        .mega-dropdown-menu > li ul > li > a:focus {
            text-decoration: none;
        }
        .mega-dropdown-menu .dropdown-header {
            font-size: 18px;
            color: #ff3546;
            padding: 5px 60px 5px 5px;
            line-height: 30px;
        }
        .carousel-control {
            width: 30px;
            height: 30px;
            top: -35px;
        }
        .left.carousel-control {
            right: 30px;
            left: inherit;
        }
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
        .thead-inverse{
            color: #fff;
            background-color: #373a3c;
        }
        .carousel-control .glyphicon-chevron-left,
        .carousel-control .glyphicon-chevron-right {
            font-size: 12px;
            background-color: #fff;
            line-height: 30px;
            text-shadow: none;
            color: #333;
            border: 1px solid #ddd;
        }
        .nav .open > a, .nav .open > a:focus, .nav  .open  > a:hover {
            background-color: #fff;
            border-color: #337ab7;
        }
        /*Login Screen Style*/
        .card-container.card {
            max-width: 350px;
            padding: 40px 40px;
        }
        .btn {
            font-weight: 700;
            height: 36px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
        }
        /*
         * Card component
         */
        .card {
            background-color: #F7F7F7;
            /* just in case there no content*/
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 50px;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .profile-img-card {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        /*
         * Form styles
         */
        .profile-name-card {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 0;
            min-height: 1em;
        }
        .reauth-email {
            display: block;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin #inputEmail,
        .form-signin #inputPassword {
            direction: ltr;
            height: 44px;
            font-size: 16px;
        }
        .form-signin input[type=email],
        .form-signin input[type=password],
        .form-signin input[type=text],
        .form-signin button {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus {
            border-color: rgb(104, 145, 162);
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px ;
            /* box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px ;*/
        }
        .btn.btn-signin {
            /*background-color: #4d90fe; */
            /* background-color: rgb(104, 145, 162);*/
            /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
            padding: 0px;
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
        }
        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: rgb(97, 133, 150);
        }
        .forgot-password {
            color: rgb(104, 145, 162);
        }
        .forgot-password:hover,
        .forgot-password:active,
        .forgot-password:focus{
            color: rgb(12, 97, 33);
        }
        footer.footer {
            background-color: #000000;
            border-color: #2e6da4;
            margin-top: 55px;
            color: white;
            border-radius: 5px;
        }
        footer.footer p {
            padding: 10px;
        }
        /*Login screen End*/</style>

</html>
