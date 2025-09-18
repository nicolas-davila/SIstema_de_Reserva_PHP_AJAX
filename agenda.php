<?php

    include "db.php";

    $sql = "SELECT * FROM reservas";

    $result = $conn->query($sql);

    // if($result->num_rows>0) {
        echo "<table border='1' cellpadding='5'>";

        echo "<tr>";
        echo "<th>Segunda</th>";
        echo "<th>Terça</th>";
        echo "<th>Quarta</th>";
        echo "<th>Quinta</th>";
        echo "<th>Sexta</th>";
        echo "<th>Sábado</th>";
        echo "<th>Domingo</th>";
        echo "</tr>";

        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td> 
                    <button class='excluirUsuario' onclick='' data-id='" . $row['id'] . "'>Excluir</button>
                 </td>";
            echo "</tr>";
        }
        echo "</table>";
    // } else {
    //     echo "Nenhum horário marcado.";
    // }

?>