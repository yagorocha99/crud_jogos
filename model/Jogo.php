<?php
// Modelo para Jogo
class Jogo {

    private $id;
    private $nome;
    private $genero;
    private $plataforma;
    private $preco;
    private $anoLancamento;
    private $desenvolvedora;
    private $nota;

    public function __construct() {
        $this->id = 0;
        $this->genero = null;
        $this->plataforma = null;
        $this->preco = 0.0;
        $this->nota = 0; // Inicializa a nota como 0 por padrão
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function getPlataforma() {
        return $this->plataforma;
    }

    public function setPlataforma($plataforma) {
        $this->plataforma = $plataforma;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getAnoLancamento() {
        return $this->anoLancamento;
    }

    public function setAnoLancamento($anoLancamento) {
        $this->anoLancamento = $anoLancamento;
    }

    public function getDesenvolvedora() {
        return $this->desenvolvedora;
    }

    public function setDesenvolvedora($desenvolvedora) {
        $this->desenvolvedora = $desenvolvedora;
    }

    public function getNota() {
        return $this->nota;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }
}
?>
