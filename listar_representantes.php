<?php

include "db.php";

$sql = "SELECT * FROM representantes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border='1' cellpadding='5'>";

    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Nome</th>";
    echo "<th>CPF</th>";
    echo "<th>Ações</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['cpf'] . "</td>";
        echo "<td> 
                    <button type='submit' class='excluirRepresentante' onclick='' data-id='" . $row['id'] . "'>Excluir</button>
                 </td>";
        echo "</tr>";
    }
    echo "</table>";
}
