<?php include 'proteger.php'; ?>
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
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/logobrasilcorrida.jpg "width="150px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
                </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar_admin">Cadastrar</a></li>
                    <li><a class="dropdown-item" href="?page=listar_admin">Listar</a></li>
             </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Eventos
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=cadastrar_evento">Cadastrar</a></li>
                    <li><a class="dropdown-item" href="?page=listar_evento">Listar</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Staff
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?page=listar_staff"">listar</a><li>
                </ul>
            </ul>
            <div class="p-1 bg-primary text-white">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Logado como: <?php echo $_SESSION['admin_nome']; ?>
                </a>
                <ul class="dropdown-menu">
                    <button class="dropdown-item" onclick="location.href='?page=editar_admin&id_admin=<?php echo $_SESSION['admin_id']; ?>';">Editar</button>
                    <li><button class="dropdown-item" onclick="if(confirm('tem certeza que deseja excluir?')){location.href='?page=salvar_admin&acao=logout';}else{false;}">Sair</button><li>
                </ul>
            </li>
            </div>
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
                        case 'cadastrar_admin':
                            include("admin/cadastrar_admin.php");
                            break;
                        case 'salvar_admin':
                            include("admin/salvar_admin.php");
                            break;
                        case 'listar_admin':
                            include("admin/listar_admin.php");
                            break;
                        case 'editar_admin':
                            include("admin/editar_admin.php");
                            break;

                        case 'listar_staff':
                            include("staff/listar_staff.php");
                            break;
                        case 'editar_staff':
                            include("staff/editar_staff.php");
                            break;
                        case 'salvar_staff':
                            include("staff/salvar_staff.php");
                            break;
                        case 'cadastrar_evento':
                            include("entregas/cadastrar_evento.php");
                            break;
                        case 'cadastrar_atleta':
                            include("entregas/cadastrar_atleta.php");
                            break;
                        case 'salvar_evento':
                            include("entregas/salvar_evento.php");
                            break;
                        case 'listar_evento':
                            include("entregas/listar_eventos.php");
                            break;
                        case 'editar_evento':
                            include("entregas/editar_evento.php");
                            break;

                        case 'mapear_csv':
                            include("entregas/mapear_csv.php");
                            break;
                        
                        default:
                            echo '<div id="texto"></div>';
                            echo '
                            <script>
                                const frase = "Olá!\nBem vindo ao sistema de entrega de kit\nBrasil Corrida\nVoce esta logado como administrador";
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