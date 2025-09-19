<?php

    include "../db.php";

    $id = $_POST['id'];
    $data_agendada = $_POST['data_agendada'];
    $horario = $_POST['horario'];

    if(!empty($id) && !empty($data_agendada) && !empty($horario)) {
        $sqlExiste = "SELECT * FROM reservas WHERE data_agendada = '$data_agendada'  AND
        horario = '$horario'";
        $result = $conn->query($sqlExiste);

        if($result->num_rows > 0) {
            echo "Horário reservado. Escolha outro.";
        }
    }

?>