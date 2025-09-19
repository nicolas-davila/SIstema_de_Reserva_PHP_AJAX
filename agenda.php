<?php

    include "db.php";

    function semanaAtual() {
        $hoje = date("Y-m-d");
        $diaSemana = date("w", strtotime($hoje)); // 0=domingo, 1=segunda, ..., 6=sábado

        $inicio = date("Y-m-d", strtotime("-" . ($diaSemana - 1) . " days", strtotime($hoje))); // segunda
        $fim    = date("Y-m-d", strtotime("+" . (7 - $diaSemana) . " days", strtotime($hoje))); // domingo

        return ['inicio' => $inicio, 'fim' => $fim];
    }

    $data = semanaAtual();

    $sql = "SELECT * FROM reservas WHERE data_agendada >= '{$data['inicio']}' AND data_agendada <= '{$data['fim']}'";

    $result = $conn->query($sql);   


    $diaSemana = [ // Aqui atribui o valor que se encontra quando traz o n° da semana e converte em string
        //Mas também serve para criar a tabela e não ficar muito grande
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
        " | " . $row['representante'] . " | " . $row['horario'] . " <br><br> " . 
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