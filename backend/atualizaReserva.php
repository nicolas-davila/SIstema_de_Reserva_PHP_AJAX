<?php

    include "../db.php";

    $id = $_POST['id'];
    $data_agendada = $_POST['data_agendada'];
    $horario = $_POST['horario'];
    $status = $_POST['status'];

    // var_dump($_POST);

    if (!empty($id) && !empty($data_agendada) && !empty($horario)) {

        $id = $conn->real_escape_string($_POST['id']);
        $data_agendada = $conn->real_escape_string($_POST['data_agendada']);
        $horario = $conn->real_escape_string($_POST['horario']);
        $status = $conn->real_escape_string($_POST['status']);



        $sqlExiste = "SELECT * FROM reservas WHERE data_agendada = '$data_agendada'  AND
            horario = '$horario' AND id != '$id'";
        $result = $conn->query($sqlExiste);

        if ($result->num_rows > 0) {
            echo "Horário reservado. Escolha outro.";
        } else {
            $sql = "UPDATE reservas SET data_agendada='$data_agendada', horario='$horario', status='$status' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Reserva atualizada com sucesso!";
            } else {
                echo "Erro. " . $conn->error;
            }
        }
    } else {
        // var_dump($id);
        // var_dump($data_agendada);
        // var_dump($horario);
        echo "Dados inválidos ou vazios";
    }
?>