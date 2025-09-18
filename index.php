<?php

    include "db.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing AJAX for the first time!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <h2>Página de Agendamento para campo de futebol</h2>
    <a href="create_representante.php">Criar novo representante</a>
    <a href="reservar_campo.php">Agendar novo horário</a>
    <a href="agenda.php">Ver agenda</a>

    <div id="agenda-front"></div>


    <script>
        $(document).ready(function () {
            carregarAgenda();
        });

        function carregarAgenda() {
            $.ajax({
                url: "agenda.php",
                method: "GET",
                success: function (dados) {
                    $("#agenda-front").html(dados)
                }
            })
        };
    </script>

</body>

</html>