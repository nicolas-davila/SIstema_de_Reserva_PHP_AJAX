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
</body>

<script>
    $(document).ready(function() {
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
</script>


</html>