<?php

include "db.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing AJAX for the first time!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>

</head>

<body>
    <h2>Página de Agendamento para campo de futebol</h2>
    <a href="create_representante.php">Criar novo representante</a>
    <a href="reservar_campo.php">Agendar novo horário</a>
    <a href="agenda.php">Ver agenda</a>

    <div id="agenda-front"></div>
    <div id="atualizaReserva"></div>
    <div id="defineStatus"></div>


    <script>
        $(document).ready(function() {
            carregarAgenda();
        });

        function carregarAgenda() {
            $.ajax({
                url: "agenda.php",
                method: "GET",
                success: function(dados) {
                    $("#agenda-front").html(dados)
                }
            })
        };

        function editarReserva(botao) {
            let id = $(botao).data('id');
            $.ajax({
                url: "editarReserva.php",
                type: "GET",
                data: {
                    id: id
                },
                success: function(resposta) {
                    $("#atualizaReserva").html(resposta)
                }
            })
        }

        $(document).on('submit', '#formEditar', function(e) {
            e.preventDefault();

            $.ajax({
                url: "backend/atualizaReserva.php",
                type: "POST",
                data: {
                    id: $("input[name='id']").val(),
                    data_agendada: $("#data_agendada").val(),
                    horario: $("#horario").val()
                },
                success: function(resposta) {
                    alert(resposta);
                    carregarAgenda();
                    $("#atualizaReserva").html("");
                },
            });
        });

        function definirStatus(botao) {
            let id = $(botao).data('id');
            $.ajax({
                url: "definir_status.php",
                type: "GET",
                data: {
                    id: id
                },
                success: function(resposta) {
                    $("#defineStatus").html(resposta)
                }
            })
        };

        $(document).on('submit', '#formDefineStatus', function(e) {
            e.preventDefault();

            $.ajax({
                url: "backend/define_status.php",
                type: "POST",
                data: {
                    id: $("input[name='id']").val(),
                    status: $("#status").val()
                },
                success: function(resposta) {
                    alert(resposta);
                    carregarAgenda();
                    $("#atualizaReserva").html("");
                },
            });
        });

        $(document).on('click', '.excluir', function() {
            let id = $(this).data('id');

            if (confirm("Deseja realmente excluir essa reserva?")) {
                $.ajax({
                    url: "backend/excluir_reserva.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(resposta) {
                        alert(resposta);
                        carregarAgenda();
                    }
                })
            }
        });
    </script>

</body>

</html>