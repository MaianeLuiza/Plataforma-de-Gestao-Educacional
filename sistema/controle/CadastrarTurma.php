<?php
require '../dados/conexao.php';

session_start();

if(isset($_SESSION["idProfessor"])){
    $idProfessor = $_SESSION['idProfessor'];

    echo $idProfessor;
    
    $nomeTurma = $_POST['nomeTurma'];

    try {
        $verificarTurma = $pdo->prepare('SELECT COUNT(*) FROM turma WHERE nome = ? AND idProfessor = ?');
        $verificarTurma->bindValue(1, $nomeTurma);
        $verificarTurma->bindValue(2, $idProfessor);
        $verificarTurma->execute();

        $turmaExistente = $verificarTurma->fetchColumn();

        if ($turmaExistente > 0) {
            $mensagem = "Já existe uma turma com esse nome";
        } else {
            $sql = $pdo->prepare('INSERT INTO turma (nome, idProfessor) VALUES (?, ?)');
            $sql->bindValue(1, $nomeTurma);
            $sql->bindValue(2, $idProfessor);
            $sql->execute();

            header('Location: ../visao/formListarTurma.php');
            exit();
        }
    } catch(PDOException $e){
        $mensagem = 'Erro ao cadastrar turma: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro de Turma</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3">
                <?php if (isset($mensagem)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensagem; ?>
                    </div>
                    <a href="../visao/formListarTurma.php" class="btn btn-primary">Voltar para Página de Turmas</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>