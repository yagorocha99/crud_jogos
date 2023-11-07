<?php
include_once(__DIR__ . "/../../model/Jogo.php");
include_once(__DIR__ . "/../../controller/JogoController.php");

$msgErros = "";
$jogo = null;

if (isset($_POST['submetido'])) {
    // Capturar o valor dos inputs do formulário
    $nome = trim($_POST['nome']);
    $plataforma = trim($_POST['plataforma']);
    $genero = trim($_POST['genero']);
    $anoLancamento = is_numeric($_POST['anoLancamento']) ? $_POST['anoLancamento'] : null;
    $desenvolvedora = trim($_POST['desenvolvedora']);
    $nota = is_numeric($_POST['nota']) ? $_POST['nota'] : null; // Capturar o valor da nota

    // Criar um objeto jogo
    $jogo = new Jogo();
    $jogo->setNome($nome);
    $jogo->setPlataforma($plataforma);
    $jogo->setGenero($genero);
    $jogo->setAnoLancamento($anoLancamento);
    $jogo->setDesenvolvedora($desenvolvedora);
    $jogo->setNota($nota); // Configurar o atributo Nota

    // Chamar o controller para inserir o jogo (persistir o objeto)
    $jogoCont = new JogoController();
    $erros = $jogoCont->inserir($jogo);

    // Caso não tenha erros, redirecionar para a listagem
    if (empty($erros)) {
        header("location: listar.php");
        exit;
    }

    // Exibir os erros para o usuário
    $msgErros = implode("<br>", $erros);
}

include_once(__DIR__ . "/form.php");
