<?php
include("header.php");
include("conexaoBD.php");

// Verifica se um jogo foi selecionado
$jogoSelecionado = isset($_GET['jogo']) ? $_GET['jogo'] : null;

// Buscar partidas da tabela para o jogo selecionado
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
        text-align: center; /* Centraliza o texto */
    }
    .partida {
        display: flex; /* Flexbox para alinhar os elementos */
        flex-direction: column; /* Coluna para cada partida */
        background-color: #222; /* Fundo do cartão */
        border: 1px solid #444; /* Borda do cartão */
        border-radius: 5px; /* Cantos arredondados */
        margin: 10px;
        padding: 15px;
    }
    .jogadores {
        display: flex; /* Flexbox para jogadores */
        justify-content: space-between; /* Espaço entre os jogadores */
        align-items: center; /* Centraliza verticalmente */
    }
    .jogador {
        display: flex;
        align-items: center; /* Centraliza verticalmente */
        flex: 1; /* Faz o jogador ocupar espaço igual */
    }
    .jogador img {
        width: 50px; /* Tamanho da imagem */
        height: 50px; /* Tamanho da imagem */
        border-radius: 50%; /* Imagem redonda */
        margin-right: 10px; /* Espaço entre a imagem e o nome */
    }
    .vencedor {
        background-color: #28a745; /* Fundo verde para vencedor */
        color: white;
        padding: 10px;
        border-radius: 3px;
        margin-top: 10px; /* Espaço acima do vencedor */
    }
    .detalhes {
        margin-top: 10px; /* Espaço acima dos detalhes */
    }
</style>

<div style="overflow: hidden;">
    <h2 style="color:#3b7086;">Partidas de <?php echo htmlspecialchars($jogoSelecionado); ?></h2>
    <div class="container">
        <?php
        if (!empty($partidas)) {
            foreach ($partidas as $partida) {
                echo '<div class="partida">';
                
                // Jogadores
                echo '<div class="jogadores">';
                echo '<div class="jogador">';
                echo "<img src='{$partida['foto1']}' alt='Foto de {$partida['jogador1']}'>";
                echo "<div>{$partida['jogador1']}</div>";
                echo '</div>';
                
                echo '<div class="jogador">';
                echo "<img src='{$partida['foto2']}' alt='Foto de {$partida['jogador2']}'>";
                echo "<div>{$partida['jogador2']}</div>";
                echo '</div>';
                echo '</div>'; // Fecha .jogadores

              
                // Detalhes da partida
                echo "<div class='detalhes'>";
                echo "<strong>Data:</strong> " . htmlspecialchars($partida['data']) . "<br>";
                echo "<strong>Horário:</strong> " . htmlspecialchars($partida['horario']) . "<br>";
                echo "<strong>Local:</strong> " . htmlspecialchars($partida['local']) . "<br>";
                echo "<strong>Dificuldade:</strong> " . htmlspecialchars($partida['dificuldade']) . "<br>";
                echo "</div>";

                echo '</div>'; // Fecha .partida
            }
        } else {
            echo '<div class="alert alert-warning">Nenhuma partida encontrada.</div>';
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>
