<?php include 'proteger.php'; ?>
<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">cadastrar admin</h1>
<form action="?page=salvar_admin" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="form-floating mb-3">
        <input name="nome_admin" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating mb-3">
        <input name="cpf_admin" type="number" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">CPF</label>
    </div>
    <div class="form-floating mb-3">
        <input name="email_admin" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating mb-3">
        <input name="telefone_admin" type="number" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Telefone</label>
    </div>

    <div class="form-floating mb-3">
        <input name="senha_admin" type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Senha</label>
    </div>
    <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>