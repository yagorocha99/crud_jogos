<?php
include_once(__DIR__ . "/../include/header.php");
?>

<h3><?php echo ($jogo && $jogo->getId() > 0 ? 'Alterar' : 'Inserir') ?> Jogo</h3>

<div class="row">
    <div class="col-6">
        <form method="POST" action="">
            <div class="form-group">
                <label for="inpNome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="inpNome" value="<?php echo ($jogo ? $jogo->getNome() : '') ?>">
            </div>

            <div class="form-group">
                <label for="inpPlataforma">Plataforma:</label>
                <select class="form-control" name="plataforma" id="inpPlataforma">
                    <option value="">--- Selecione ---</option>
                    <option value="PC">PC</option>
                    <option value="PlayStation">PlayStation</option>
                    <option value="Xbox">Xbox</option>
                    <option value="Nintendo">Nintendo</option>
                    <?php
                    foreach ($plataformas as $plataforma) {
                        $selected = ($jogo && $jogo->getPlataforma() && $jogo->getPlataforma()->getNome() == $plataforma) ? 'selected' : '';
                        echo "<option value='{$plataforma}' {$selected}>{$plataforma}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="inpGenero">Gênero:</label>
                <select class="form-control" name="genero" id="inpGenero">
                    <option value="">--- Selecione ---</option>
                    <option value="Acao">Ação</option>
                    <option value="RPG">RPG</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Esporte">Esporte</option>
                    <?php
                    foreach ($generos as $genero) {
                        $selected = ($jogo && $jogo->getGenero() && $jogo->getGenero()->getNome() == $genero) ? 'selected' : '';
                        echo "<option value='{$genero}' {$selected}>{$genero}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="inpAnoLancamento">Ano de Lançamento:</label>
                <select class="form-control" name="anoLancamento" id="inpAnoLancamento">
                    <option value="">--- Selecione ---</option>
                    <?php
                    // Loop para gerar as opções de ano de 2010 a 2023
                    for ($ano = 2010; $ano <= 2023; $ano++) {
                        echo '<option value="' . $ano . '"';
                        if ($jogo && $jogo->getAnoLancamento() == $ano) {
                            echo ' selected';
                        }
                        echo '>' . $ano . '</option>';
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="inpDesenvolvedora">Desenvolvedora:</label>
                <input class="form-control" type="text" name="desenvolvedora" id="inpDesenvolvedora"
                    value="<?php echo ($jogo ? $jogo->getDesenvolvedora() : '') ?>">
            </div>

            <div class="form-group">
                <label for="inpNota">Nota:</label>
                <input class="form-control" type="number" name="nota" id="inpNota" min="0" max="10" 
                    value="<?php echo ($jogo ? $jogo->getNota() : '') ?>">
            </div>

            <button class="btn btn-success" type="submit">Gravar</button>
            <button class="btn btn-secondary" type="reset">Limpar</button>

            <input type="hidden" name="id_jogo" value="<?php echo ($jogo ? $jogo->getId() : '') ?>">
            <input type="hidden" name="submetido" value="1">
        </form>
    </div>
    <?php if($msgErros): ?>
        <div class="alert alert-danger">
            <?= $msgErros ?>
        </div>
    <?php endif; ?>
</div>
<a class="btn btn-outline-primary mt-5" href="listar.php">Voltar</a>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>
