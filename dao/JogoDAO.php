<?php
include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Jogo.php");

class JogoDAO {
    public function list() {
        $conn = Connection::getConnection();
        $sql = "SELECT * FROM jogos";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapDBToObject($result);
    }

    public function listGeneros() {
        $conn = Connection::getConnection();
        $sql = "SELECT DISTINCT genero FROM jogos";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $generos = array();
        foreach ($result as $reg) {
            $generos[] = $reg['genero'];
        }

        return $generos;
    }

    public function listPlataformas() {
        $conn = Connection::getConnection();
        $sql = "SELECT DISTINCT plataforma FROM jogos";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $plataformas = array();
        foreach ($result as $reg) {
            $plataformas[] = $reg['plataforma'];
        }

        return $plataformas;
    }

    public function findById(int $idJogo) {
        $conn = Connection::getConnection();
        $sql = "SELECT * FROM jogos WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
        $result = $stm->fetchAll();

        $jogos = $this->mapDBToObject($result);
        if ($jogos)
            return $jogos[0];
        else
            return null;
    }

    public function insert(Jogo $jogo) {
        $conn = Connection::getConnection();
        $sql = "INSERT INTO jogos (nome, genero, plataforma, lancamento, desenvolvedora, nota) VALUES (?, ?, ?, ?, ?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute(array(
            $jogo->getNome(),
            $jogo->getGenero(),
            $jogo->getPlataforma(),
            $jogo->getAnoLancamento(),
            $jogo->getDesenvolvedora(),
            $jogo->getNota()
        ));
    }

    public function update(Jogo $jogo) {
        $conn = Connection::getConnection();
        $sql = "UPDATE jogos SET nome = ?, genero = ?, plataforma = ?, lancamento = ?, desenvolvedora = ?, nota = ? WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array(
            $jogo->getNome(),
            $jogo->getGenero(),
            $jogo->getPlataforma(),
            $jogo->getAnoLancamento(),
            $jogo->getDesenvolvedora(),
            $jogo->getNota(),
            $jogo->getId()
        ));
    }

    public function deleteById(int $idJogo) {
        $conn = Connection::getConnection();
        $sql = "DELETE FROM jogos WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
    }

    private function mapDBToObject(array $result) {
        $jogos = array();
        foreach ($result as $reg) {
            $jogo = new Jogo();
            $jogo->setId($reg['id']);
            $jogo->setNome($reg['nome']);
            $jogo->setGenero($reg['genero']);
            $jogo->setPlataforma($reg['plataforma']);
            $jogo->setAnoLancamento($reg['lancamento']);
            $jogo->setDesenvolvedora($reg['desenvolvedora']);
            $jogo->setNota($reg['nota']);
            $jogos[] = $jogo;
        }
        return $jogos;
    }
}

?>
