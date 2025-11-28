<?php include 'proteger.php'; ?>
<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">cadastrar evento</h1>
<form action="?page=salvar_evento" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="form-floating mb-3">
        <input name="nome_evento" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating mb-3">
        <input name="loguin_evento" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Usuário</label>
    </div>
    <div class="form-floating mb-3">
        <input name="data_evento" type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Data do evento</label>
    </div>

    <div class="form-floating mb-3">
        <input name="senha_evento" type="password" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Senha</label>
    </div>
    <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>