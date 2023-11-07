<?php
include_once(__DIR__ . "/../../controller/JogoController.php");
include_once(__DIR__ . "/../include/header.php");

if (isset($_GET['id'])) {
    $idJogo = $_GET['id'];
    $jogoCont = new JogoController();
    $jogo = $jogoCont->buscarPorId($idJogo);
}

$msgErros = array(); // Defina como um array vazio

if (isset($_POST['submetido'])) {
    // Processar a exclusão do jogo
    if ($jogo) {
        $jogoCont->excluirPorId($jogo->getId());
        header("Location: listar.php"); // Redireciona após a exclusão
    } else {
        $msgErros[] = "Jogo não encontrado para exclusão.";
    }
}
?>

<h3>Excluir Jogo</h3>

<div class="row">
    <div class="col-6">
        <form method="POST" action="">
            <div class="form-group">
                <label for="inpNome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="inpNome"
                    value="<?php echo ($jogo ? $jogo->getNome() : '') ?>" readonly>
            </div>

            <div class="form-group">
                <label for="inpPlataforma">Plataforma:</label>
                <input class="form-control" type="text" name="plataforma" id="inpPlataforma"
                    value="<?php echo ($jogo ? $jogo->getPlataforma() : '') ?>" readonly>
            </div>

            <div class="form-group">
                <label for="inpGenero">Gênero:</label>
                <input class="form-control" type="text" name="genero" id="inpGenero"
                    value="<?php echo ($jogo ? $jogo->getGenero() : '') ?>" readonly>
            </div>

            <div class="form-group">
                <label for="inpAnoLancamento">Ano de Lançamento:</label>
                <input class="form-control" type="text" name="anoLancamento" id="inpAnoLancamento"
                    value="<?php echo ($jogo ? $jogo->getAnoLancamento() : '') ?>" readonly>
            </div>

            <div class="form-group">
                <label for="inpNota">Nota:</label>
                <input class="form-control" type="text" name="nota" id="inpNota"
                    value="<?php echo ($jogo ? $jogo->getNota() : '') ?>" readonly>
            </div>

            <button class="btn btn-danger" type="submit">Excluir</button>

            <input type="hidden" name="id_jogo"
                value="<?php echo ($jogo ? $jogo->getId() : '') ?>">
            <input type="hidden" name="submetido" value="1">
        </form>
    </div>
</div>

<?php if($msgErros): ?>
    <div class="alert alert-danger mt-3">
        <ul>
            <?php foreach ($msgErros as $erro): ?>
                <li><?= $erro ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<a class="btn btn-outline-primary mt-3" href="listar.php">Voltar</a>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>
