<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nome       = $_POST['nome_admin'];
            $cpf        = $_POST['cpf_admin'];
            $senha      = $_POST['senha_admin'];
            $email      = $_POST['email_admin'];
            $telefone      = $_POST['telefone_admin'];

            //serve para criptografar a senha
            $hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO administrador (nome_admin, cpf_admin, senha_admin, email_admin, telefone_admin)
                    VALUE('{$nome}', '{$cpf}', '{$hash}', '{$email}', '{$telefone}' )";

            $res = $conn->query($sql);
            if($res==true){
                print"<script>alert('Cadastrou com sucesso');</script>";
                print"<script>location.href='?page=listar_admin';</script>";
            }else{
                print"<script>alert('Não cadastrou');</script>";
                print"<script>location.href='?page=listar_admin';</script>";
            }
            break;

        case 'validar':
            session_start();
                include 'conexao.php';

                $email  = $_POST['email_sugerido'];
                $senha  = $_POST['senha_sugerido'];

                // Buscar admin pelo email
                $sql = $conn->prepare("SELECT * FROM administrador WHERE email_admin = ?");
                $sql->bind_param("s", $email);
                $sql->execute();
                $res = $sql->get_result();

                if ($res->num_rows == 1) {
                    
                    $admin = $res->fetch_assoc();
                    
                    // Verifica senha criptografada
                    if (password_verify($senha, $admin['senha_admin'])) {

                        // Criar a sessão
                        $_SESSION['admin_id']   = $admin['id_admin'];
                        $_SESSION['admin_nome'] = $admin['nome_admin'];
                        $_SESSION['logado']     = true;

                        print "<script>alert('Login realizado com sucesso!');</script>";
                        print "<script>location.href='admin.php';</script>";

                    } else {
                        print "<script>alert('Senha incorreta!');</script>";
                        print "<script>location.href='?page=entrar_admin';</script>";
                    }

                } else {
                    print "<script>alert('E-mail não encontrado!');</script>";
                    print "<script>location.href='?page=entrar_admin';</script>";
                }

            break;

        case 'logout':


                session_start();

                // Apaga todas as variáveis da sessão
                session_unset();

                // Destroi a sessão
                session_destroy();

                // Redireciona para a página de login
                header('Location: index.php?page=entrar_admin');

            
            break;
        
        case 'editar':

            $nome       = $_POST['nome_admin'];
            $cpf        = $_POST['cpf_admin'];
            $senha      = $_POST['senha_admin'];
            $email      = $_POST['email_admin'];
            $telefone   = $_POST['telefone_admin'];

            $hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "UPDATE administrador SET 
            nome_admin='{$nome}'
            ,cpf_admin='{$cpf}'
            ,senha_admin='{$hash}'
            ,email_admin='{$email}'
            ,telefone_admin='{$telefone}' WHERE id_admin=".$_REQUEST['id_admin'];;

            $res = $conn->query($sql);

            if($res==true){
                print"<script>alert('Editou com sucesso');</script>";
                print"<script>location.href='?page=listar_admin';</script>";
            }else{
                print"<script>alert('Não Editou');</script>";
                print"<script>location.href='?page=listar_admin';</script>";
            }
            break;

        case 'excluir':
            $sql = "DELETE FROM administrador WHERE id_admin=".$_REQUEST['id_admin'];

              $res = $conn->query($sql);

              if($res==true){
                print"<script>alert('Excluiu com sucesso');</script>";
                print"<script>location.href='?page=listar_admin';</script>";
            }else{
                print"<script>alert('Não Excluiu');</script>";
                print"<script>location.href='?page=listar_admin';</script>";
            }
             
            break;
        
    }