<?php
switch ($_REQUEST['acao']) {

    // 1. CADASTRAR EVENTO
    case 'cadastrar':
        $nome   = $_POST['nome_evento'];
        $loguin = $_POST['loguin_evento'];
        $data   = $_POST['data_evento'];
        $senha  = $_POST['senha_evento'];

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO eventos (nome_evento, loguin_evento, data_evento, senha_evento)
                VALUES ('{$nome}', '{$loguin}', '{$data}', '{$hash}')";

        $res = $conn->query($sql);

        if ($res == true) {

            $id_evento = $conn->insert_id; // ← PEGA ID DO EVENTO CRIADO

            print "<script>alert('Cadastrado com sucesso');</script>";
            print "<script>location.href='?page=listar_evento';</script>";

        } else {
            print "<script>alert('Erro ao cadastrar evento');</script>";
            print "<script>location.href='?page=listar_evento';</script>";
        }
        break;

    case 'importar':

        $arquivo = $_POST['arquivo']; // <-- MOVE ESSA LINHA PARA CIMA
        $mapa = $_POST['mapa'];
        $id_evento = $_POST['id_evento'];
        
        // Verifica se a variável $arquivo tem um valor para evitar o erro fatal
        if (empty($arquivo)) {
            die("Erro: Caminho do arquivo não fornecido.");
        }
        
        $linhas = array_map(function($linha){
            return str_getcsv($linha, ';');
        }, file($arquivo)); // <-- AGORA $arquivo ESTÁ DEFINIDA

        $cabecalhos = $linhas[0];

        unset($linhas[0]);

        include "../config.php";

        foreach ($linhas as $linha) {

            $dados = [];

            foreach ($cabecalhos as $index => $coluna_csv) {
                if (!empty($mapa[$coluna_csv])) {
                    $campo_banco = $mapa[$coluna_csv];
                    $valor = isset($linha[$index]) ? $linha[$index] : "";
                    $dados[$campo_banco] = $conn->real_escape_string($valor);
                }
            }

            // Adiciona chave estrangeira
            $dados["eventos_id_evento"] = $id_evento;

            // Monta SQL
            $colunas_sql = implode(",", array_keys($dados));
            $valores_sql = "'" . implode("','", array_values($dados)) . "'";

            $sql = "INSERT INTO atletas ($colunas_sql) VALUES ($valores_sql)";
            $conn->query($sql);
        }

        echo "<script>alert('Importação concluída com sucesso!');</script>";
        echo "<script>location.href='?page=listar_atletas&id_evento={$id_evento}';</script>";

        break;

        case 'mapear_csv':

            if (!isset($_FILES['csv'])) {
                die("Nenhum arquivo enviado!");
            }

            // garante pasta
            if (!is_dir("uploads")) {
                mkdir("uploads", 0777, true);
            }

            // salva o arquivo
            $arquivo_temporario = $_FILES['csv']['tmp_name'];
            $nome_final = 'uploads/' . uniqid() . '.csv';

            if (!move_uploaded_file($arquivo_temporario, $nome_final)) {
                die("Erro ao mover arquivo para pasta uploads!");
            }


            $conteudo = file_get_contents($nome_final);
            $conteudo = mb_convert_encoding($conteudo, 'UTF-8', 'ISO-8859-1');
            file_put_contents($nome_final, $conteudo);

            // agora sim carrega o CSV
            $linhas = array_map(function($linha){
                return str_getcsv($linha, ';');
            }, file($nome_final));


            if (!$linhas || count($linhas) == 0) {
                die("Arquivo CSV vazio ou inválido!");
            }

            $cabecalhos = $linhas[0]; // primeira linha

            // campos do banco
            $campos_banco = [
                "numero_atleta",
                "inscricao_atleta",
                "nome_atleta",
                "cpf_atleta",
                "kit_atleta",
                "modalidade_atleta",
                "categoria_atleta",
                "nascimento_atleta",
                "sexo_atleta",
                "equipe_atleta",
                "cidade_atleta",
                "camiseta_atleta",
                "celular_atleta",
                "email_atleta",
                "terceiros_atleta"
            ];
            // FORMULÁRIO DE MAPEAMENTO
            echo '<h1 style="color:#483D8B; font-family:Impact;">Mapear Colunas do CSV</h1>
            <form action="?page=salvar_evento" method="POST">
                <input type="hidden" name="acao" value="importar">
                <input type="hidden" name="id_evento" value="' . $_POST["id_evento"] . '">
                <input type="hidden" name="arquivo" value="' . $nome_final . '">
                <table class="table table-bordered">
                    <tr>
                        <th>Coluna do CSV</th>
                        <th>Campo no Banco</th>
                    </tr>';

            foreach ($cabecalhos as $coluna) {
                echo '
                <tr>
                    <td><strong>' . htmlspecialchars($coluna) . '</strong></td>
                    <td>
                        <select name="mapa[' . htmlspecialchars($coluna) . ']" class="form-select" required>
                            <option value="">-- Selecione --</option>';
                foreach ($campos_banco as $campo) {
                    echo '<option value="' . $campo . '">' . $campo . '</option>';
                }
                echo '
                        </select>
                    </td>
                </tr>';
            }
            echo '
                </table>
                <button type="submit" class="btn btn-success">Importar Agora</button>
            </form>';

            break;

        case 'editar':

            $nome   = $_POST['nome_evento'];
            $loguin = $_POST['loguin_evento'];
            $data   = $_POST['data_evento'];
            $senha  = $_POST['senha_evento'];

            $hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "UPDATE eventos SET 
            nome_evento='{$nome}'
            ,loguin_evento='{$loguin}'
            ,data_evento='{$data}'
            ,senha_evento='{$hash}' WHERE id_evento=".$_REQUEST['id_evento'];;

            $res = $conn->query($sql);

            if($res==true){
                print"<script>alert('Editou com sucesso');</script>";
                print"<script>location.href='?page=listar_evento';</script>";
            }else{
                print"<script>alert('Não Editou');</script>";
                print"<script>location.href='?page=listar_evento';</script>";
            }
            break;

            case 'excluir':
                $sql = "DELETE FROM eventos WHERE id_evento=".$_REQUEST['id_evento'];

                $res = $conn->query($sql);

                if($res==true){
                    print"<script>alert('Excluiu com sucesso');</script>";
                    print"<script>location.href='?page=listar_evento';</script>";
                }else{
                    print"<script>alert('Não Excluiu');</script>";
                    print"<script>location.href='?page=listar_evento';</script>";
                }
                
                break;

                case 'excluiratleta':
                $id_evento_limpo = (int) $_REQUEST['id_evento'];
                $sql = "DELETE FROM atletas WHERE eventos_id_evento=". $id_evento_limpo;

                $res = $conn->query($sql);

                if($res==true){
                    print"<script>alert('Excluiu com sucesso');</script>";
                    print"<script>location.href='?page=listar_evento';</script>";
                }else{
                    print"<script>alert('Não Excluiu');</script>";
                    print"<script>location.href='?page=listar_evento';</script>";
                }
                
                break;

                case 'validaevento':
                    // 1. Recebe os dados do POST
                    $id_evento = (int) $_POST['id_evento'];
                    $login_sugerido = $_POST['loguin_evento_sugerido'];
                    $senha_sugerida = $_POST['senha_evento_sugerido'];

                    // 2. Busca o evento no banco de dados
                    $sql = "SELECT loguin_evento, senha_evento FROM eventos WHERE id_evento = {$id_evento}";
                    $res = $conn->query($sql);
                    $row = $res->fetch_object();

                    if ($row) {
                        
                        $login_correto = ($row->loguin_evento === $login_sugerido);
                        $senha_correta = password_verify($senha_sugerida, $row->senha_evento);

                        if ($login_correto && $senha_correta) {

                            print "<script>alert('Acesso liberado!');</script>";
                            print "<script>location.href='?page=evento&id_evento={$id_evento}';</script>";
                            
                        } else {
                            print "<script>alert('Login ou Senha incorretos!');</script>";
                            print "<script>location.href='?page=evento&id_evento={$id_evento}';</script>";
                        }
                        
                    } else {
                        print "<script>alert('Erro: Evento não encontrado.');</script>";
                        print "<script>location.href='?page=listar_evento';</script>";
                    }
                    
                    break;

}
