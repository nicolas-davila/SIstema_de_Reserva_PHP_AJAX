<?php

    include "../db.php";

    $id = $_POST['id'];
    $status = $_POST['status'];

    if (!empty($id) && !empty($status)) {

        $id = $conn->real_escape_string($_POST['id']);
        $status = $conn->real_escape_string($_POST['status']);

        $sql = "UPDATE reservas SET status='$status' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Status alterado com sucesso!";
            } else {
                echo "Erro. " . $conn->error;
            }
        } else {
        // var_dump($id);
        // var_dump($data_agendada);
        // var_dump($horario);
        echo "Dados inválidos ou vazios";
    };

?>