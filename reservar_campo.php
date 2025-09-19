<?php

include "db.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar horário</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Rservar horário</h2>
    <form id="reserva-campo">
        <label for="data">Data: </label>
        <input type="date" name="data_agendada" id="data_agendada" required><br><br>
        <label for="horario">Horário: </label>
        <input type="time" name="horario" id="horario" required><br><br>
        <label for="representante">Nome do Representante: </label>
        <input type="text" name="representante" id="representante" required>
        <button type="submit">Reservar</button>
    </form>

    <script>
        $(document).ready(function() {
            $(document).on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    url: "./backend/gerar_reserva.php",
                    type: "POST",
                    data: {
                        data_agendada: $("#data_agendada").val(),
                        horario: $("#horario").val(),
                        representante: $("#representante").val()
                    },
                    success: function(resposta){
                        alert(resposta);
                    }
                })
            })
        });
    </script>
</body>

</html>