<?php

    include "db.php";

    $sql = "SELECT * FROM reservas";

    $result = $conn->query($sql);


    $diaSemana = [ // Aqui atribui o valor que se encontra quando traz o n° da semana e converte em string
        1 => "Segunda-Feira",
        2 => "Terça-Feira",
        3 => "Quarta-Feira",
        4 => "Quinta-Feira",
        5 => "Sexta-Feira",
        6 => "Sábado",
        7 => "Domingo"
    ];

    $listaSemana = [
        1 => [],
        2 => [],
        3 => [],
        4 => [],
        5 => [],
        6 => [],
        7 => []
    ];


    while ($row = $result->fetch_assoc()) {
        $diaNumero = date("N", strtotime($row['data_agendada']));
        $listaSemana[$diaNumero][] = "id: " . $row['id'] . " | " . $row['data_agendada'] . 
        " | " . $row['representante'] . " <br><br> " . 
        "<button class='editarReserva' onclick='editarReserva(this)' data-id='" . $row['id'] . "'>
            Editar Reserva
        </button>" . 
        " <button class='excluir' onclick='' data-id='" . $row['id'] . "'>
            Excluir Reserva
        </button>";
    }

    echo "<table border='1' cellpadding='5'>";
    echo "<tr>";
    foreach ($diaSemana as $diaNome) {
        echo "<th>$diaNome</th>";
    }
    echo "</tr>";

    echo "<tr>";
    foreach ($listaSemana as $agendamentos) {
        echo "<td>";
        if (!empty($agendamentos)) {
            foreach ($agendamentos as $agendamento) {
                echo $agendamento . "<br><br>";
            }
        } else {
            echo "Sem agendamentos";
        }
        echo "</td>";
    }
    echo "</tr>";
    echo "</table>";
?>