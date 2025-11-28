<?php include 'proteger.php'; ?>
<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">listar staff</h1>
<?php
    $sql = "SELECT * FROM staff";
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
        print"<td>".$row->id_staff."</td>";
        print"<td>".$row->nome_staff."</td>";
        print"<td>".$row->cpf_staff."</td>";
        print"<td>".$row->email_staff."</td>";
        print"<td>".$row->telefone_staff."</td>";
        print"<td>
                <button class='btn btn-success' onclick=\"location.href='?page=editar_staff&id_staff={$row->id_staff}';\">Editar</button>
                <button class='btn btn-danger' onclick=\"if(confirm('tem certeza que deseja excluir?')){location.href='?page=salvar_staff&acao=excluir&id_staff={$row->id_staff}';}else{false;}\">Excluir</button>
            </td>";
        print"</tr>";
        }
        print"</table>";
    }else{
        print "<p>Não enacontro resultado</p>";
    }
?>