<?php include 'proteger.php'; ?>
<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Editar admin</h1>
<?php
    $sql = "SELECT * FROM eventos WHERE id_evento=".$_REQUEST['id_evento'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar_evento" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_evento" value="<?php print $row->id_evento; ?>">
    <div class="form-floating mb-3">
        <input name="nome_evento" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php print $row->nome_evento; ?>">
        <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating mb-3">
        <input name="loguin_evento" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php print $row->loguin_evento; ?>">
        <label for="floatingInput">Usuário</label>
    </div>
    <div class="form-floating mb-3">
        <input name="data_evento" type="date" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php print $row->data_evento; ?>">
        <label for="floatingInput">Data do evento</label>
    </div>

    <div class="form-floating mb-3">
        <input name="senha_evento" type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Senha</label>
    </div>
    <div class="mb-3">
            <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>