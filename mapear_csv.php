<?php

if (!isset($_FILES['csv'])) {
    die("Nenhum arquivo enviado!");
}

$arquivo_temporario = $_FILES['csv']['tmp_name'];
$nome_final = 'uploads/' . uniqid() . '.csv';

move_uploaded_file($arquivo_temporario, $nome_final);

$cabecalhos = $linhas[0];

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
    "terceiros_atleta",
    "eventos_id_evento"
];
?>

<h1 style="color:#483D8B; font-family:Impact;">Mapear Colunas do CSV</h1>

<form action="?page=salvar_evento" method="POST">

    <input type="hidden" name="acao" value="importar">
    <input type="hidden" name="id_evento" value="<?=$_POST['id_evento']?>">
    <input type="hidden" name="arquivo" value="<?=$arquivo?>">

    <table class="table table-bordered">
        <tr>
            <th>Coluna do CSV</th>
            <th>Campo no Banco</th>
        </tr>

        <?php foreach ($cabecalhos as $coluna): ?>
        <tr>
            <td><strong><?=htmlspecialchars($coluna)?></strong></td>
            <td>
                <select name="mapa[<?=htmlspecialchars($coluna)?>]" class="form-select" required>
                    <option value="">-- Selecione --</option>
                    <?php foreach ($campos_banco as $campo): ?>
                        <option value="<?=$campo?>"><?=$campo?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>

    <button type="submit" class="btn btn-success">Importar Agora</button>

</form>
