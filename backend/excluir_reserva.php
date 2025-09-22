<?php

    include '../db.php';

    $id = $_POST['id'];

    if(!empty($id)) {
        $sql = "DELETE FROM reservas WHERE id=$id";
        if($conn->query($sql) === TRUE){
            echo "Reserva excluida com sucesso!";
        } else {
            echo "Erro. " . $conn->error;
        }
    } else {
        var_dump($id);
        echo "Id inválido ou vazio!";
    }

?>