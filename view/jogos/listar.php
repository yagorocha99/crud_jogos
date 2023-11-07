<?php 
include_once(__DIR__ . "/../../controller/JogoController.php");

// Carrega a lista de jogos
$jogoCont = new JogoController();
$jogos = $jogoCont->listar();
?>

<?php 
    include_once(__DIR__ . "/../include/header.php");
?>    

<h3>Listagem de jogos</h3>

<div>
    <a class="btn btn-success" href="inserir.php">Inserir</a>
</div>

<table class="table table-striped table-hover mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Plataforma</th>
            <th>Gênero</th>
            <th>Ano de Lançamento</th>
            <th>Desenvolvedora</th>
            <th>Nota</th> <!-- Adicionado o campo Nota -->
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($jogos as $j): ?>
            <tr>
                <td><?= $j->getId() ?></td>
                <td><?= $j->getNome() ?></td>
                <td><?= $j->getPlataforma() ?></td>
                <td><?= $j->getGenero() ?></td>
                <td><?= $j->getAnoLancamento() ?></td>
                <td><?= $j->getDesenvolvedora() ?></td>
                <td><?= $j->getNota() ?></td> <!-- Exibir o valor da Nota -->
                <td>
                    <a class="btn btn-primary" href="alterar.php?id=<?= $j->getId() ?>">
                        Editar
                    </a>
                </td>
                <td>
                    <a class "btn btn-danger" href="excluir.php?id=<?= $j->getId() ?>"
                        onclick="return confirm('Confirma a exclusão?');" >
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
    include_once(__DIR__ . "/../include/footer.php");
?>
