<?php
// View para alterar um jogo

include_once(__DIR__ . "/../../controller/JogoController.php");
include_once(__DIR__ . "/../../model/Jogo.php");

$msgErros = "";
$jogo = null;

if (isset($_POST['submetido'])) {
    // Salvar o registro com as alterações

    // Capturar o valor dos inputs do formulário
    $idJogo = $_POST['id_jogo'];
    $nome = trim($_POST['nome']);
    $genero = $_POST['genero']; // Campo de seleção de gênero
    $plataforma = $_POST['plataforma']; // Campo de seleção de plataforma
    $anoLancamento = is_numeric($_POST['anoLancamento']) ? $_POST['anoLancamento'] : null;
    $desenvolvedora = trim($_POST['desenvolvedora']);
    $nota = is_numeric($_POST['nota']) ? $_POST['nota'] : null;

    // Criar um objeto jogo
    $jogo = new Jogo();
    $jogo->setId($idJogo);
    $jogo->setNome($nome);
    $jogo->setGenero($genero);
    $jogo->setPlataforma($plataforma);
    $jogo->setAnoLancamento($anoLancamento);
    $jogo->setDesenvolvedora($desenvolvedora);
    $jogo->setNota($nota);

    // Chamar o controller para atualizar o jogo (persistir o objeto)
    $jogoCont = new JogoController();
    $erros = $jogoCont->alterar($jogo);

    // Caso não tenha erros, redirecionar para a listagem
    if (empty($erros)) {
        header("location: listar.php");
        exit;
    }

    // Exibir os erros para o usuário
    $msgErros = implode("<br>", $erros);
} else {
    // Receber o ID do jogo por parâmetro GET
    $idJogo = 0;
    if (isset($_GET['id'])) {
        $idJogo = $_GET['id'];

        // Validar se o jogo com o ID recebido existe
        $jogoCont = new JogoController();
        $jogo = $jogoCont->buscarPorId($idJogo);

        // Verificar se o jogo foi encontrado
        if (!$jogo) {
            echo "Jogo não encontrado!<br>";
            echo "<a href='listar.php'>Voltar</a>";
            exit;
        }
    } else {
        // Redirecionar para listar.php caso o ID do jogo não tenha sido especificado
        header("location: listar.php");
        exit;
    }
}

include_once(__DIR__ . "/form.php");
