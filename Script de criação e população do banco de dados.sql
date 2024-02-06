CREATE DATABASE ensino_profissional_db;
USE ensino_profissional_db;

CREATE TABLE professor (
    idProfessor INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60),
    email VARCHAR(100),
    senha VARCHAR(25)
);

INSERT INTO professor (nome, email, senha) VALUES 
    ('João Silva', 'joao@email.com', 'senha123'),
    ('Maria Oliveira', 'maria@email.com', 'senha456'),
    ('Carlos Souza', 'carlos@email.com', 'senha789');

CREATE TABLE turma (
    idTurma INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60) UNIQUE,
    idProfessor INT,
    FOREIGN KEY (idProfessor) REFERENCES professor(idProfessor)
);

INSERT INTO turma (nome, idProfessor) VALUES 
    ('Turma 1', 3),
    ('Turma 2', 1),
    ('Turma 3', 2);

CREATE TABLE atividade (
    idAtividade INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(60) UNIQUE,
    idTurma INT,
    FOREIGN KEY (idTurma) REFERENCES turma(idTurma)
);

INSERT INTO atividade (descricao, idTurma) VALUES 
    ('Atividade de matemática', 2),
    ('Atividade de geografia', 1),
    ('Atividade de história', 3);

DELIMITER //
CREATE PROCEDURE listarTurmas(IN idProfessor INT)
BEGIN
    SELECT turma.idTurma, turma.nome
    FROM turma
    WHERE turma.idProfessor = idProfessor;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE listarAtividades(IN idTurma INT)
BEGIN
    SELECT atividade.idAtividade, atividade.descricao, turma.idTurma
    FROM turma
    INNER JOIN atividade ON atividade.idTurma = turma.idTurma
    WHERE turma.idTurma = idTurma;
END //
DELIMITER ;


