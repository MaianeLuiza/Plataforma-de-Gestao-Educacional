<?php

class Atividade {

    private $idAtividade;
    private $descricao;
    private $idTurma;

    public function __construct($idAtividade, $descricao, $idTurma) {
        $this->idAtividade = $idAtividade;
        $this->descricao = $descricao;
        $this->idTurma = $idTurma;
    }

    public function getIdAtividade() {
        return $this->idAtividade;
    }

    public function setIdAtividade($idAtividade) {
        $this->idAtividade = $idAtividade;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getIdTurma() {
        return $this->idTurma;
    }

    public function setIdTurma($idTurma) {
        $this->idTurma = $idTurma;
    }
}

?>