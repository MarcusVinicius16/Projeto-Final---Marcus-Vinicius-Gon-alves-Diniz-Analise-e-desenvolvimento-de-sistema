<?php include 'proteger.php'; ?>
<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">listar admin</h1>
<?php
    $sql = "SELECT * FROM administrador";
    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0 ){
        print"<p>Encotrou <b>$qtd</b> resultado(s) </p>";
        print"<table class='table table-bordered table-striped table-hover'>";
        print"<tr>";
        print"<th>#</th>";
        print"<th>Nome</th>";
        print"<th>CPF</th>";
        print"<th>E-mail</th>";
        print"<th>Telefone</th>";
        print"<th>Ações</th>";
        print"</tr>";
        while($row = $res->fetch_object() ){
        print"<tr>";
        print"<td>".$row->id_admin."</td>";
        print"<td>".$row->nome_admin."</td>";
        print"<td>".$row->cpf_admin."</td>";
        print"<td>".$row->email_admin."</td>";
        print"<td>".$row->telefone_admin."</td>";
        print"<td>
                <button class='btn btn-success' onclick=\"location.href='?page=editar_admin&id_admin={$row->id_admin}';\">Editar</button>
                <button class='btn btn-danger' onclick=\"if(confirm('tem certeza que deseja excluir?')){location.href='?page=salvar_admin&acao=excluir&id_admin={$row->id_admin}';}else{false;}\">Excluir</button>
            </td>";
        print"</tr>";
        }
        print"</table>";
    }else{
        print "<p>Não enacontro resultado</p>";
    }
?>