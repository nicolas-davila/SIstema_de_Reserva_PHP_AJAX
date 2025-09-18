<?php

    include "../db.php";

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    if(!empty($nome) && !empty($cpf)) {
        $nome = $conn->real_escape_string($nome);
        $cpf = $conn->real_escape_string($cpf);

        $sql = "INSERT INTO representantes (nome, cpf) VALUES ('$nome', $cpf)";

        if($conn->query($sql) === TRUE) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro! " . $conn->error;
        }
    }

    $conn->close();
?>