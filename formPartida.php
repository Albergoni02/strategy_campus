<?php
include("header.php");
include("conexaoBD.php");

// Buscar jogadores da tabela Usuario
$sql = "SELECT idUsuario, nome FROM Usuario";
$result = $conn->query($sql);
$usuarios = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

$conn->close();
?>
<style>
    body {
        background-color: black; /* Fundo preto */
        /*color: white; /* Texto branco */
    }
</style>

<div class="container-fluid text-center mb-5">
    <h2 style="color:#3b7086;">Cadastro de Partidas:</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-sm-12">
                <form action="actionPartida.php" class="was-validated" method="POST" enctype="multipart/form-data">

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="jogador1" name="jogador1" required>
                            <option value="" disabled selected>Selecione Jogador 1</option>
                            <?php foreach ($usuarios as $usuario): ?>
                                <option value="<?= $usuario['idUsuario'] ?>"><?= $usuario['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="jogador1" class="form-label">*Jogador 1:</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="jogador2" name="jogador2" required>
                            <option value="" disabled selected>Selecione Jogador 2</option>
                            <?php foreach ($usuarios as $usuario): ?>
                                <option value="<?= $usuario['idUsuario'] ?>"><?= $usuario['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="jogador2" class="form-label">*Jogador 2:</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="nomeJogo" name="nomeJogo" required>
                            <option value="Xadrez">Xadrez</option>
                            <option value="Damas">Dama</option>
                            <option value="Batalha Naval">Batalha Naval</option>
                            <option value="Clash Royale">Clash Royale</option>
                        </select>
                        <label for="nomeJogo" class="form-label">Nome dos jogos:</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="modoJogo" name="modoJogo" required>
                            <option value="tabuleiro">Tabuleiro</option>
                            <option value="online">Online</option>
                        </select>
                        <label for="modoJogo" class="form-label">*Modo de Jogo:</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" placeholder="Informe a data inicio" name="dataPartida" required>
                        <label for="dataPartida" class="form-label">*Data:</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <input type="time" class="form-control" id="horarioJogo" placeholder="Informe o horário" name="horarioJogo" required>
                        <label for="horarioJogo" class="form-label">Horário da Partida:</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" id="localJogo" placeholder="Informe o local do jogo" name="localJogo" required></textarea>
                        <label for="localJogo" class="form-label">*Local do Campus:</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="dificuldadeJogo" name="dificuldadeJogo" required>
                            <option value="iniciante">Iniciante</option>
                            <option value="intermediario">Intermediário</option>
                            <option value="avancado">Avançado</option>
                        </select>
                        <label for="dificuldadeJogo" class="form-label">*Dificuldade:</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="totalJogo" name="totalJogo" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <label for="totalJogo" class="form-label">Total de Partidas:</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
