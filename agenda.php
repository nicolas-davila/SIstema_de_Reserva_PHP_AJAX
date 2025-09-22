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

    // $sql = "SELECT * FROM reservas WHERE data_agendada >= '{$data['inicio']}' AND data_agendada <= '{$data['fim']}'";

    // $result = $conn->query($sql);   


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

    $sqlRepresentante = "SELECT r.nome, res.data_agendada, res.horario, res.status, res.id AS reserva_id
    FROM representantes AS r LEFT JOIN reservas AS res ON r.id = res.representante";

    $resultRepresentante = $conn->query($sqlRepresentante);

    while ($row = $resultRepresentante->fetch_assoc()) {
        if ($row['data_agendada']) { // só adiciona se tiver reserva
            $diaNumero = date("N", strtotime($row['data_agendada']));
            $listaSemana[$diaNumero][] =
                "Representante: " . $row['nome'] .
                " | Data: " . $row['data_agendada'] . "<br>" .
                "Horário: " . $row['horario'] .
                " | Status: " . $row['status'] . "<br><br>" .
                "<button class='editarReserva' onclick='editarReserva(this)' data-id='" . $row['reserva_id'] . "'>Editar Reserva</button>" .
                "<button class='excluir' data-id='" . $row['reserva_id'] . "'>Excluir Reserva</button>" .
                "<button class='definirStatus' data-id='" . $row['reserva_id'] . "'>Definir Status</button>";
        }
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