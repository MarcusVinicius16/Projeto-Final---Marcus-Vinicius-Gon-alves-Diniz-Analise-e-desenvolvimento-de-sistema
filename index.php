<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brasil Corrida</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #ffffff;
            justify-content: center;
            align-items: center;
            text-align: center;
            
        }

        #texto {
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 40px;
            font-weight: bold;
            line-height: 1.5;
            white-space: pre-line;
            color: #483D8B;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style=" font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logobrasilcorrida.jpg "width="150px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="?page=entrar_admin">Admin</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="?page=listar_evento">eventos</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Staff
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar_staff">Cadastrar</a></li>
                    <li><a class="dropdown-item" href="?page=entrar_staff">Entrar</a></li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <?php 
                     //arquivo de conexao 
                     include('config.php');

                     switch(@$_REQUEST['page']) {

                        //admin
                        case 'entrar_admin':
                            include("admin/entrar_admin.php");
                            break;
                        case 'admin':
                            include("admin/admin.php");
                            break;
                        case 'salvar_admin':
                            include("admin/salvar_admin.php");
                            break;

                        //staff
                        case 'cadastrar_staff':
                            include("staff/cadastrar_staff.php");
                            break;
                        case 'salvar_staff':
                            include("staff/salvar_staff.php");
                            break;
                        case 'staff':
                            include("staff.php");
                            break;
                        case 'entrar_staff':
                            include("staff/entrar_staff.php");
                            break;

                        case 'listar_evento':
                            include("entregas/listar_eventos_geral.php");
                            break;
                        default:
                            echo '<div id="texto"></div>';
                            echo '
                            <script>
                                const frase = "Olá!\\nBem vindo ao sistema de entrega de kit\\nBrasil Corrida";
                                let i = 0;

                                function escrever() {
                                    if (i < frase.length) {
                                        document.getElementById("texto").innerHTML += frase.charAt(i);
                                        i++;
                                        setTimeout(escrever, 60);
                                    }
                                }

                                escrever();
                            </script>
                            ';
                            break;
                        
                     }
                     ?>
                </div>
            </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>