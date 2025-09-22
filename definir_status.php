<?php

    include "db.php";

    $id = $_GET['id'];

    if(!empty($id)) {
        $sql = "SELECT r.nome, res.data_agendada, res.horario, res.status, res.id AS reserva_id
        FROM reservas AS res LEFT JOIN representantes AS r ON r.id = res.representante WHERE res.id = '$id'";

        $result = $conn->query($sql);
        $reserva = mysqli_fetch_assoc($result);

    }

?>

<h3 style="text-align: center;">Editar Reserva</h3><br><br> 

<form id="formDefineStatus">


    <div class="container text-center">
        <div class="row">
            <div class="col">
                <input type="hidden" name="id" value="<?= $reserva['reserva_id'] ?>">
                <h4>Reservado para o dia</h4>
                <p><?= $reserva['data_agendada'] ?></p>
                <h4>No Horário</h4>
                <p><?= $reserva['horario'] ?></p>
                <h4>Nome do representante</h4>
                <p><?= $reserva['nome'] ?></p>
            </div>
            <div class="col">
                <h4>Selecione o status da reserva</h4>
                <select name="status" id="status" required>
                    <option>Pendente</option>
                    <option>Concluido</option>
                    <option>Cancelado</option>
                </select><br><br>
                <button type="submit" id="defineStatus">Definir Status</button>
            </div>
        </div>
    </div>
</form>