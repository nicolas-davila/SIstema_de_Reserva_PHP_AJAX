<?php

    include "../db.php";

    $data_agendada = $_POST['data_agendada'];
    $horario = $_POST['horario'];
    $representante = $_POST['representante'];

    if(!empty($data_agendada) && !empty($horario) && !empty($representante)){
        $sql = "INSERT INTO reservas (data_agendada, horario, representante) 
        VALUES ('$data_agendada', '$horario', '$representante')";

        if($conn->query($sql) === TRUE) {
            echo "Reserva feita com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    }

    $conn->close();
?>