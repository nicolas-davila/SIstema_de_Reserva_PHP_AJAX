<?php

    include "db.php";

    $result = mysqli_query($conn, "SELECT * FROM representantes") 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Cadastrar representante</h2>
    <form id="cadastraRepresentante" name="cadastraRepresentante">
        <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
        <input type="text" id="cpf" name="cpf"  placeholder="Seu cpf" required>
        <button type="submit">Cadastrar</button>
    </form>

    <div id="resultado"></div>
    <br>
    <div id="listaDeRepresentantes"></div>
</body>

<script>
    $(document).ready(function() {
        carregarRepresentantes();

        $("#cadastraRepresentante").on("submit", function(e) {
            e.preventDefault();

            $.ajax ({
                url: "./backend/gerar_representante.php",
                type: "POST",
                data: {
                    nome: $("#nome").val(),
                    cpf: $("#cpf").val(),
                },
                success: function(resposta) {
                    alert(resposta);
                    window.location.href="index.php"
                }
            })
        })
    })

    function carregarRepresentantes() {
        $.ajax({
            url: "listar_representantes.php",
            type: "GET",
            success: function(dados) {
                $("#listaDeRepresentantes").html(dados)
            }
        })
    }

    $(document).on('click', '.excluirRepresentante', function() {
        let id = $(this).data('id');

        if(confirm("Deseja realmente excluir esse representante?")) {
            $.ajax({
                url: "backend/excluir_representante.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(resposta) {
                    alert(resposta);
                    carregarRepresentantes();
                }
            })
        }
    });
</script>


</html>