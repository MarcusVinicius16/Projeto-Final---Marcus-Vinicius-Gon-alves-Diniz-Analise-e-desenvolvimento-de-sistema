<?php include 'proteger.php'; ?>

<h1 class="mb-3" style="color:#483D8B; font-family:Impact;">Cadastrar atleta</h1>
<?php
$sql = "SELECT * FROM eventos WHERE id_evento=".$_REQUEST['id_evento'];
$res = $conn->query($sql);
$row = $res->fetch_object();
?>

<form action="?page=salvar_evento" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_evento" value="<?php print $row->id_evento; ?>">
    <input type="hidden" name="acao" value="mapear_csv">
    <div class="mb-3">
        <label class="form-label">Selecione o arquivo CSV:</label>
        <input type="file" name="csv" accept=".csv" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <button class='btn btn-danger' onclick="if(confirm('tem certeza que deseja excluir?')){location.href='?page=salvar_evento&acao=excluiratleta&id_evento={$row->id_evento}';}else{false;}">Excluir atletas</button>
</form>
