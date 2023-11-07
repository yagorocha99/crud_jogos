<?php
include_once(__DIR__ . "/../model/Jogo.php");
include_once(__DIR__ . "/../dao/JogoDAO.php");

class JogoService {
    private JogoDAO $jogoDAO;

    public function __construct() {
        $this->jogoDAO = new JogoDAO();
    }

    public function validarDados(Jogo $jogo) {
        $erros = array();

        if (empty($jogo->getNome())) {
            array_push($erros, "O campo Nome é obrigatório.");
        }

        if (empty($jogo->getGenero())) {
            array_push($erros, "O campo Gênero é obrigatório.");
        }

        if (empty($jogo->getPlataforma())) {
            array_push($erros, "O campo Plataforma é obrigatório.");
        }

        // Adicione mais verificações para outros campos conforme necessário

        return $erros;
    }

    public function listarJogos() {
        return $this->jogoDAO->list();
    }

    public function inserirJogo(Jogo $jogo) {
        $erros = $this->validarDados($jogo);

        if (empty($erros)) {
            $this->jogoDAO->insert($jogo);
        }

        return $erros;
    }

    public function atualizarJogo(Jogo $jogo) {
        $erros = $this->validarDados($jogo);

        if (empty($erros)) {
            $this->jogoDAO->update($jogo);
        }

        return $erros;
    }

    public function buscarJogoPorId($id) {
        return $this->jogoDAO->findById($id);
    }

    public function excluirJogo($id) {
        $this->jogoDAO->deleteById($id);
    }
}
