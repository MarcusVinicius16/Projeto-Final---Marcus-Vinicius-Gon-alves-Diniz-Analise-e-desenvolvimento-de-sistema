
</html>

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
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style=" font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
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
            <li class="nav-item">
                <a class="nav-link" href="?page=listar_evento">eventos</a>
            </li>
        </div>
        <div class="p-1 bg-primary text-white">
                <li class="nav-item dropdown" style="list-style: none;">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Logado como: <?php echo $_SESSION['staff_nome']; ?>
                </a>
                <ul class="dropdown-menu">
                    <button class="dropdown-item" onclick="location.href='?page=editar_staff&id_staff=<?php echo $_SESSION['staff_id']; ?>';">Editar</button>
                    <li><button class="dropdown-item" onclick="if(confirm('tem certeza que deseja sair?')){location.href='?page=salvar_staff&acao=logout';}else{false;}">Sair</button><li>
                </ul>
                </li>
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

                        case 'entrar_staff':
                            include("staff/entrar_staff.php");
                            break;
                        case 'salvar_staff':
                            include("staff/salvar_staff.php");
                            break;
                        case 'editar_staff':
                            include("staff/editar_staff.php");
                            break;
                        case 'listar_evento':
                            include("entregas/listar_evento_staff.php");
                            break;
                        case 'loguin_evento':
                            include("entregas/loguin_entrega.php");
                            break;
                        case 'salvar_evento':
                            include("entregas/salvar_evento.php");
                            break;
                        case 'evento':
                            include("entregas/evento.php");
                            break;
                        case 'baixa':
                            include("entregas/baixa.php");
                            break;
                        default:
                            echo '<div id="texto"></div>';
                            echo '
                            <script>
                                const frase = "Olá!\nBem vindo ao sistema de entrega de kit\nBrasil Corrida\nVoce esta logado como staff";
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