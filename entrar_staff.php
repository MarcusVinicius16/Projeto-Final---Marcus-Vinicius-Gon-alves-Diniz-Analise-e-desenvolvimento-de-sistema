<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">entrar staff</h1>
<form action="?page=salvar_staff" method="POST"> 
    <input type="hidden" name="acao" value="validar">
    <div class="form-floating mb-3">
        <input name="email_sugerido_staff" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
    </div>
        <div class="form-floating mb-3">
            <input name="senha_sugerido_staff" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
        </div>

    <div class="mb-3">
            <button type="submit" class="btn btn-primary ">Enviar</button>
    </div>
</form>
