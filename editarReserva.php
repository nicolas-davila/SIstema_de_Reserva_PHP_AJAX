<?php

include "db.php";

$id = $_GET['id'];

if (!empty($id)) {
    $sql = "SELECT * FROM reservas WHERE id='$id'";
    $result = $conn->query($sql);
    $reserva = mysqli_fetch_assoc($result);
}

?>

<h3 style="text-align: center;">Editar Reserva</h3><br><br>

<form id="formEditar">


    <div class="container text-center">
        <div class="row">
            <div class="col">
                <input type="hidden" name="id" value="<?= $reserva['id'] ?>">
                <h4>Reservado para o dia</h4>
                <p><?= $reserva['data_agendada'] ?></p>
                <h4>No Horário</h4>
                <p><?= $reserva['horario'] ?></p>
            </div>
            <div class="col">
                <h4>Selecione a data para alterar</h4>
                <label for="data">Data: </label>
                <input type="date" name="data_agendada" id="data_agendada" required><br><br>
                <h4>Selecione o horário para alterar</h4>
                <label for="horario">Horário: </label>
                <select name="horario" id="horario">
                    <option>08:00</option>
                    <option>09:30</option>
                    <option>11:00</option>
                    <option>14:30</option>
                    <option>16:00</option>
                    <option>17:30</option>
                    <option>19:00</option>
                    <option>20:30</option>
                </select>
                <br><br>
                <button type="submit" id="atualizaReserva">Atualizar Reserva</button>
            </div>
        </div>
    </div>
</form>