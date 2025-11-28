
<h1 class="mb-3" style="color: #483D8B; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">listar eventos</h1>
<?php
    $sql = "SELECT * FROM eventos";
    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if($qtd > 0 ){
        echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    echo "<div class='container'>";
    echo "<div class='row g-3'>";
    while($row = $res->fetch_object()){
        echo "
        <div class='col-md-4'>
            <div class='card h-100'>
                <img src='./img/logoeventos.png' class='card-img-top' alt='...' >
                <div class='card-body'>
                    <h5 class='card-title'>{$row->nome_evento}</h5>
                    <p class='card-text'>data:{$row->data_evento}</p>
                    <a class='btn btn-success' href='?page=entrar_staff'>staff</a>
                </div>
            </div>
        </div>";
    }
    echo "</div>";
    echo "</div>";
    }else{
        echo "<p>Não encontrou resultado</p>";
    }
            
?>