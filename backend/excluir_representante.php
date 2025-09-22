<?php

    include "../db.php";

    $id = $_POST['id'];

    if(!empty($id)) {
        $sql = "DELETE FROM representantes WHERE id=$id";

        if($conn->query($sql) === TRUE) {
            echo "Representante exlcuido com sucesso!";
        } else {
            echo "Erro. " . $conn->error;
        }
    } else {
        echo "Id inválido ou vazio!";
        var_dump($id);
    }

?>