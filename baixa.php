
<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $quem        = $_POST['quempegou_baixa'];
            $staffid       = $_POST['staff_id_staff'];
            $staffcpf       = $_POST['staff_cpf_staff '];
            $atleta       = $_POST['atletas_id_atletas '];
            $evento       = $_POST['eventos_id_evento '];
            $adminid       = $_POST['admin_id_staff  '];
            $admincpf       = $_POST['admin_cpf_staff  '];


            $sql = "INSERT INTO baixa (quempegou_baixa, staff_id_staff, staff_cpf_staff, atletas_id_atletas, eventos_id_evento, admin_id_staff, admin_cpf_staff)
                    VALUE('{$data}', '{$staffid}', '{$staffcpf}', '{$atleta}', '{$evento}', '{$adminid}', '{$admincpf}')";

            $res = $conn->query($sql);
            if($res==true){
                print"<script>alert('Cadastrou com sucesso');</script>";
                print"<script>location.href='?page=listar-venda';</script>";
            }else{
                print"<script>alert('Não cadastrou');</script>";
                print"<script>location.href='?page=listar-venda';</script>";
            }
            break;

        }