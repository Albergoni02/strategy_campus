<?php
include("header.php");
?>

<style>
    body {
        background-color: black; /* Fundo preto */
        /*color: white; /* Texto branco */
    }
    .game-image {
        width: 200px; /* Tamanho da imagem do jogo */
        height: auto; /* Manter a proporção */
        cursor: pointer; /* Cursor em forma de mão */
    }
    .game-container {
        display: flex;
        justify-content: space-around;
        margin: 20px 0;
    }
</style>

<h2 style="color:#3b7086;">Escolha um Jogo</h2>
<div class="game-container">
    <?php 
    $jogos = [
        'Xadrez' => 'img/Xadrez.webp',
        'Damas' => 'img/Damas.jpeg',
        'Batalha Naval' => 'img/BTNV.png',
        'Clash Royale' => 'img/Royale.png',
    ];
    
    foreach ($jogos as $nomeJogo => $imagem) {
        echo "<a href=\"partidas.php?jogo=" . urlencode($nomeJogo) . "\">";
        echo "<img src=\"$imagem\" alt=\"$nomeJogo\" class=\"game-image\">";
        echo "</a>";
    }
    ?>
</div>

<?php include("footer.php"); ?>
