<?php include 'proteger.php'; ?>
<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Editar admin</h1>
<?php
    $sql = "SELECT * FROM eventos WHERE id_evento=".$_REQUEST['id_evento'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar_evento" method="POST">
    <input type="hidden" name="acao" value="validaevento">
    <input type="hidden" name="id_evento" value="<?php print $row->id_evento; ?>">

    <div class='card' style="width: 18rem;">
        <img src='./img/logoeventos.png' class='card-img-top' alt='...' >
        <div class='card-body'>
                <h5 class='card-title'><?php print $row->nome_evento; ?></h5>
                 <div class="form-floating mb-3">
                    <input name="loguin_evento_sugerido" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Usuário</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="senha_evento_sugerido" type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Senha</label>
                </div>
                <button class='btn btn-success' onclick="submit">Editar</button>
        </div>
    </div>

</form>