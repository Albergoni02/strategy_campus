<?php
    include("header.php");
    include("conexaoBD.php");

    // Captura o valor do filtro de dificuldade, se não existir, define como 'todos'
    $filtroPartida = isset($_GET['filtroPartida']) ? $_GET['filtroPartida'] : 'todos';

    // Verifica se um jogo foi selecionado
    $jogoSelecionado = isset($_GET['jogo']) ? $_GET['jogo'] : null;

    // Monta a consulta SQL inicial para pegar as partidas
    $sql = "
    SELECT p.*, 
        u1.nome AS jogador1, 
        u1.foto AS foto1,
        u2.nome AS jogador2, 
        u2.foto AS foto2
    FROM Partida p
    JOIN Usuario u1 ON p.jogador1 = u1.idUsuario
    JOIN Usuario u2 ON p.jogador2 = u2.idUsuario
    WHERE p.nomeJogo = '$jogoSelecionado'
    ";


    // Se o filtro não for 'todos', adiciona a condição de filtro para a dificuldade
    if ($filtroPartida != 'todos') {
        $sql .= " AND p.dificuldade = '$filtroPartida'";
    }

    if($filtroPartida == 'iniciante'){
        $sql = $sql . " AND p.dificuldade = '$filtroPartida'";
    }

    // Executa a consulta no banco de dados
    $result = $conn->query($sql);
    $partidas = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $partidas[] = $row;
        }
    }
    $conn->close();
?>

<style>
    body {
        background-color: black; /* Fundo preto */
        color: white; /* Texto branco */
    }

    .comunicado {
        background-color: #2c3e50; /* Cor de fundo para o comunicado */
        padding: 20px;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
    }

    .card-img-top {
        max-height: 200px;
        object-fit: cover;
    }

    .detalhes {
        font-size: 1.2em;
        color: #ecf0f1;
        margin-top: 15px;
    }

    .detalhes strong {
        color: #ecf0f1;
    }

    .info-partida {
        text-align: center;
        color: #bdc3c7;
        font-size: 1.2em;
        margin-top: 10px;
    }

    .info-partida p {
        margin: 5px 0;
    }
</style>

<!-- Formulário de Filtro -->
<div class="container mb-5">
    <form name="formFiltro" action="partidas.php" method="GET" style="width:50%; margin:auto;">
        <select class="form-select" name="filtroPartida" required>
            <option value="todos" <?php echo $filtroPartida == 'todos' ? 'selected' : ''; ?>>Visualizar partidas de todas as dificuldades</option>
            <option value="iniciante" <?php echo $filtroPartida == 'iniciante' ? 'selected' : ''; ?>>Visualizar apenas partidas de nível iniciante</option>
            <option value="intermediario" <?php echo $filtroPartida == 'intermediario' ? 'selected' : ''; ?>>Visualizar apenas partidas de nível intermediário</option>
            <option value="avancado" <?php echo $filtroPartida == 'avancado' ? 'selected' : ''; ?>>Visualizar apenas partidas de nível avançado</option>
        </select><br>
        <button type="submit" class="btn btn-primary" style="float:right">
            Filtrar Partidas
        </button>
    </form>
</div>

<!-- Exibição das Partidas -->
<div style="overflow: hidden;">
    <h2 style="color:#3b7086;" class="text-center">Partidas de <?php echo htmlspecialchars($jogoSelecionado); ?></h2>
    <div class="container">
        <?php
        if (!empty($partidas)) {
            foreach ($partidas as $partida) {
                echo "<div class='row' style='margin-bottom: 30px;'>";

                // Coluna para o jogador 1
                echo "<div class='col-sm-4'>
                        <div class='card' style='width:100%; height:100%;'>
                            <div class='card-body' style='height:100%'>
                                <img class='card-img-top' src='{$partida['foto1']}' alt='Foto de {$partida['jogador1']}'>
                            </div>
                            <div class='card-body text-center' style='height:100%;'>
                                <div class='d-grid' style='border-size:border-box'>
                                    <h4 class='card-title'>{$partida['jogador1']}</h4>
                                </div>
                            </div>
                        </div>
                    </div>";

                // Informações de partida entre as imagens
                echo "<div class='col-sm-4 info-partida'>";
                echo "<h3>Comunicado de Início de Partida</h3>";
                echo "<p><strong>Data:</strong> " . htmlspecialchars($partida['data']) . "</p>";
                echo "<p><strong>Horário:</strong> " . htmlspecialchars($partida['horario']) . "</p>";
                echo "<p><strong>Local:</strong> " . htmlspecialchars($partida['local']) . "</p>";
                echo "<p><strong>Dificuldade:</strong> " . htmlspecialchars($partida['dificuldade']) . "</p>";
                echo "</div>";

                // Coluna para o jogador 2
                echo "<div class='col-sm-4'>
                        <div class='card' style='width:100%; height:100%;'>
                            <div class='card-body' style='height:100%'>
                                <img class='card-img-top' src='{$partida['foto2']}' alt='Foto de {$partida['jogador2']}'>
                            </div>
                            <div class='card-body text-center' style='height:100%'>
                                <div class='d-grid' style='border-size:border-box'>
                                    <h4 class='card-title'>{$partida['jogador2']}</h4>
                                </div>
                            </div>
                        </div>
                    </div>";

                echo '</div>'; // Fecha a linha .row
            }
        } else {
            echo '<div class="alert alert-warning text-center">Nenhuma partida encontrada.</div>';
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>
