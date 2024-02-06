<?php
require '../dados/conexao.php';

if(isset($_POST["idTurma"])){
    $idTurma = $_POST["idTurma"];
    echo $idTurma;
 
    try{
        $sql = $pdo->prepare('SELECT COUNT(*) FROM atividade WHERE idTurma = ?');
        $sql->bindValue(1, $idTurma);
        $sql->execute();
        $quantidadeAtividades = $sql->fetchColumn();

        if($quantidadeAtividades > 0){
            $mensagem = "Você não pode excluir uma turma com atividades cadastradas.";
        } else {
            $sqlExcluirTurma = $pdo->prepare('DELETE FROM turma WHERE idTurma = ?');
            $sqlExcluirTurma->bindValue(1, $idTurma);
            $sqlExcluirTurma->execute();
            
            header('Location: ../visao/formListarTurma.php');
            exit();
        }

    } catch(PDOException $e) {
        echo 'Erro ao excluir turma: ' . $e->getMessage();
        header('Location: ../visao/formListarTurma.php');
        exit();
    }
    
} else {
    header('Location: ../visao/formListarTurma');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Exclusão de Turma</title>
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
                        <a href="../visao/formListarTurma.php" class="btn btn-primary">Voltar para Página Inicial</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>