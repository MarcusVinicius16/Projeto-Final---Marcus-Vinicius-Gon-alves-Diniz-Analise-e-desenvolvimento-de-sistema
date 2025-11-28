<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Editar staff</h1>
<?php
    $sql = "SELECT * FROM staff WHERE id_staff=".$_REQUEST['id_staff'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar_staff" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_staff" value="<?php print $row->id_staff; ?>">
    <div class="form-floating mb-3">
        <input name="nome_staff" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php print $row->nome_staff; ?>">
        <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating mb-3">
        <input name="cpf_staff" type="number" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php print $row->cpf_staff; ?>">
        <label for="floatingInput">CPF</label>
    </div>
    <div class="form-floating mb-3">
        <input name="email_staff" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php print $row->email_staff; ?>">
        <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating mb-3">
        <input name="telefone_staff" type="number" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php print $row->telefone_staff; ?>">
        <label for="floatingInput">Telefone</label>
    </div>

    <div class="form-floating mb-3">
        <input name="senha_staff" type="password" class="form-control" id="floatingInput" placeholder="name@example.com" ">
        <label for="floatingInput">Senha</label>
    </div>
    <div class="mb-3">
            <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>