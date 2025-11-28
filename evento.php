<form class="d-flex" role="search" id="meuFormulario">
    <input class="form-control me-2" type="text" placeholder="dados" name="dados"/>
    <button class="btn btn-outline-success" type="button" onclick="pesquisaDados()">pesquisar</button>
</form>

<script>
function pesquisaDados() {
    let valor = document.querySelector("input[name='dados']").value;
    let id_evento = "<?= $_REQUEST['id_evento'] ?>";

    window.location.href = "?page=evento&id_evento=" + id_evento + "&dados=" + encodeURIComponent(valor);
}
</script>
<?php
    $id_evento = (int) $_REQUEST['id_evento'];
$valorInput = isset($_GET['dados']) ? $_GET['dados'] : '';

$sql = "SELECT * FROM atletas WHERE eventos_id_evento = $id_evento";

if (!empty($valorInput)) {
    $sql .= " AND nome_atleta LIKE '%$valorInput%'";
}

$res = $conn->query($sql);
$qtd = $res->num_rows;
    

        print"<p>Encotrou <b>$qtd</b> resultado(s) </p>";
        print"<table class='table table-bordered table-striped table-hover'>";
        print"<tr>";
        print"<th>#</th>";
        print"<th>Nome</th>";
        print"<th>CPF</th>";
        print"<th>modalidade</th>";
        print"<th>camiseta</th>";
        print"<th>Ações</th>";
        print"</tr>";
        while($row = $res->fetch_object() ){
        print"<tr>";
        print"<td>".$row->numero_atleta."</td>";
        print"<td>".$row->nome_atleta."</td>";
        print"<td>".$row->cpf_atleta."</td>";
        print"<td>".$row->modalidade_atleta."</td>";
        print"<td>".$row->camiseta_atleta."</td>";
        print'<td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                baixa
                </button>                
            </td>';
        print"</tr>";
        }
        print"</table>";

?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">baixa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="?page=baixa" method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="form-floating mb-3">
            
            <input name="quempegou_baixa" type="text" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Retirado por:</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fechar</button>
        <button class='btn btn-success' onclick="location.href='?page=baixa&id_staff=<?php echo $_SESSION['staff_id']; ?>';">Editar</button>
      </div>
    </form>
    </div>
  </div>
</div>