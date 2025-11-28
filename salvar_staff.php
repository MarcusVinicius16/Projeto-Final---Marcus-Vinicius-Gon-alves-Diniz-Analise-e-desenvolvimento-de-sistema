<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nome       = $_POST['nome_staff'];
            $cpf        = $_POST['cpf_staff'];
            $senha      = $_POST['senha_staff'];
            $email      = $_POST['email_staff'];
            $telefone   = $_POST['telefone_staff'];

            //serve para criptografar a senha
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO staff (nome_staff, cpf_staff, senha_staff, email_staff, telefone_staff)
                    VALUE('{$nome}', '{$cpf}', '{$hash}', '{$email}', '{$telefone}' )";
            $res = $conn->query($sql);
            if($res==true){
                print"<script>alert('Cadastrou com sucesso');</script>";
                print"<script>location.href='staff.php';</script>";
            }else{
                print"<script>alert('Não cadastrou');</script>";
                print"<script>location.href='?page=staff';</script>";
            }
            break;

        case 'validar':
             session_start();
                include 'config.php';

                $email  = $_POST['email_sugerido_staff'];
                $senha  = $_POST['senha_sugerido_staff'];

                // Buscar staff pelo email
                $sql = $conn->prepare("SELECT * FROM staff WHERE email_staff = ?");
                $sql->bind_param("s", $email);
                $sql->execute();
                $res = $sql->get_result();

                if ($res->num_rows == 1) {
                    
                    $staff = $res->fetch_assoc();
                    
                    // Verifica senha criptografada
                    if (password_verify($senha, $staff['senha_staff'])) {

                        // Criar a sessão
                        $_SESSION['staff_id']   = $staff['id_staff'];
                        $_SESSION['staff_nome'] = $staff['nome_staff'];
                        $_SESSION['logado']     = true;

                        print "<script>alert('Login realizado com sucesso!');</script>";
                        print "<script>location.href='staff.php';</script>";

                    } else {
                        print "<script>alert('Senha incorreta!');</script>";
                        print "<script>location.href='?page=entrar_staff';</script>";
                    }

                } else {
                    print "<script>alert('E-mail não encontrado!');</script>";
                    print "<script>location.href='?page=entrar_staff';</script>";
                }

            break;

        case 'logout':
             session_start();

                // Apaga todas as variáveis da sessão
                session_unset();

                // Destroi a sessão
                session_destroy();

                // Redireciona para a página de login
                header('Location: index.php?page=entrar_staff');
            break;
        
        case 'editar':
            $nome       = $_POST['nome_staff'];
            $cpf        = $_POST['cpf_staff'];
            $senha      = $_POST['senha_staff'];
            $email      = $_POST['email_staff'];
            $telefone   = $_POST['telefone_staff'];

            $hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "UPDATE staff SET 
            nome_staff='{$nome}'
            ,cpf_staff='{$cpf}'
            ,senha_staff='{$hash}'
            ,email_staff='{$email}'
            ,telefone_staff='{$telefone}' WHERE id_staff=".$_REQUEST['id_staff'];;

            $res = $conn->query($sql);

            if($res==true){
                print"<script>alert('Editou com sucesso');</script>";
                print"<script>location.href='?page=listar_staff';</script>";
            }else{
                print"<script>alert('Não Editou');</script>";
                print"<script>location.href='?page=listar_staff';</script>";
            }
            break;
        
    }