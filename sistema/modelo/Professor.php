<?php
class Turma {

    private $idTurma;
    private $nome;
    private $idProfessor;

    public function __construct($idTurma, $nome, $idProfessor) {
        $this->idTurma = $idTurma;
        $this->nome = $nome;
        $this->idProfessor = $idProfessor;
    }

    public function getIdTurma() {
        return $this->idTurma;
    }

    public function setIdTurma($idTurma) {
        $this->idTurma = $idTurma;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdProfessor() {
        return $this->idProfessor;
    }

    public function setIdProfessor($idProfessor) {
        $this->idProfessor = $idProfessor;
    }
    }

?>