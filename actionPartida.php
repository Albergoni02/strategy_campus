<?php include("header.php"); ?>
<style>
    body {
        background-color: black; /* Fundo preto */
        /*color: white; /* Texto branco */
    }
</style>

<?php
// Bloco para declaração das variáveis
$nomeJogo = $modoJogo = $totalJogo = $dificuldadeJogo = $localJogo = "";
$dataPartida = date('Y-m-d'); // Utiliza a função date para pegar a data no formato AAAA-MM-DD
$horaPartida = date('H:i:s'); // Utiliza a função date para pegar as horas no formato HH:MM:SS
$erroPreenchimento = false; // Variável para controle de erros durante o preenchimento do formulário

// Verifica o método de envio do FORM
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica e filtra os campos recebidos
    if (empty($_POST["nomeJogo"])) {
        echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $nomeJogo = filtrar_entrada($_POST["nomeJogo"]);
    }

    if (empty($_POST["modoJogo"])) {
        echo "<div class='alert alert-warning text-center'>O campo <strong>MODALIDADE</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $modoJogo = filtrar_entrada($_POST["modoJogo"]);
    }

    if (empty($_POST["localJogo"])) {
        echo "<div class='alert alert-warning text-center'>O campo <strong>LOCAL</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $localJogo = filtrar_entrada($_POST["localJogo"]);
    }

    if (empty($_POST["dificuldadeJogo"])) {
        echo "<div class='alert alert-warning text-center'>O campo <strong>DIFICULDADE</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $dificuldadeJogo = filtrar_entrada($_POST["dificuldadeJogo"]);
    }

    if (empty($_POST["totalJogo"])) {
        echo "<div class='alert alert-warning text-center'>O campo <strong>TOTAL DE PARTIDAS</strong> é obrigatório!</div>";
        $erroPreenchimento = true;
    } else {
        $totalJogo = filtrar_entrada($_POST["totalJogo"]);
    }

    // Captura os jogadores
    $jogador1 = isset($_POST["jogador1"]) ? filtrar_entrada($_POST["jogador1"]) : null;
    $jogador2 = isset($_POST["jogador2"]) ? filtrar_entrada($_POST["jogador2"]) : null;

    // Se NÃO houver erro de preenchimento
    if (!$erroPreenchimento) {
        // Cria a Query para realizar a inserção das informações na tabela Partidas
        $inserirPartida = "INSERT INTO Partida (nomeJogo, modoJogo, data, horario, dificuldade, local, totalPartida, jogador1, jogador2)
                           VALUES ('$nomeJogo', '$modoJogo', '$dataPartida', '$horaPartida', '$dificuldadeJogo', '$localJogo', '$totalJogo', '$jogador1', '$jogador2')";

        // Inclui o arquivo para conexão com o Banco de Dados
        include("conexaoBD.php");

        // Utiliza a função mysqli_query para executar a QUERY no Banco de Dados
        if (mysqli_query($conn, $inserirPartida)) {
            echo "
                <div class='alert alert-success text-center'>Partida cadastrada com sucesso!</div>
                <div class='container mt-3'>
                    <div class='table-responsive'>
                        <table class='table'>
                            <tr>
                                <th>NOME</th>
                                <td>$nomeJogo</td>
                            </tr>
                            <tr>
                                <th>MODO</th>
                                <td>$modoJogo</td>
                            </tr>
                            <tr>
                                <th>DATA</th>
                                <td>$dataPartida</td>
                            </tr>
                            <tr>
                                <th>HORÁRIO</th>
                                <td>$horaPartida</td>
                            </tr>
                            <tr>
                                <th>DIFICULDADE</th>
                                <td>$dificuldadeJogo</td>
                            </tr>
                            <tr>
                                <th>LOCAL</th>
                                <td>$localJogo</td>
                            </tr>
                            <tr>
                                <th>JOGADOR 1</th>
                                <td>$jogador1</td>
                            </tr>
                            <tr>
                                <th>JOGADOR 2</th>
                                <td>$jogador2</td>
                            </tr>
                        </table>
                    </div>
                </div>
            ";
        } else {
            echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar a partida!</div>" . mysqli_error($conn);
            echo "<p>$inserirPartida</p>";
        }
    }
}

// Função para filtrar as entradas de dados do formulário para evitar SQL Injection
function filtrar_entrada($dado) {
    $dado = trim($dado); // Remove espaços desnecessários
    $dado = stripslashes($dado); // Remove as barras invertidas
    $dado = htmlspecialchars($dado); // Converte caracteres especiais em entidades HTML

    return ($dado); // Retorna o dado já filtrado
}
?>

<?php include("footer.php"); ?>
