<?php
    require '../dados/conexao.php';
    
    session_start();

    if(isset($_POST["email"]) && isset($_POST["senha"])){
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        
        $sql = $pdo->prepare('SELECT idProfessor, nome, senha FROM professor WHERE email = ?');
        $sql->bindValue(1, $email);
        $sql->execute();

        $resultado_consulta = $sql->fetch();

        if ($resultado_consulta && $senha === $resultado_consulta['senha']) {
            $nome = $resultado_consulta['nome'];
            $idProfessor = $resultado_consulta['idProfessor'];

            $_SESSION["nome"] = $nome;
            $_SESSION["idProfessor"] = $idProfessor;

            header("Location: ../visao/formListarTurma.php");
            exit();
        } else {
            header("Location: ../visao/formAutenticar.php");
        }
    } else {
        echo "Campos de e-mail e senha são obrigatórios.";
    }

?>