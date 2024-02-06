<?php
require '../dados/conexao.php';

session_start();

if (isset($_SESSION["idProfessor"])) {
    if (isset($_GET["idTurma"])) {
        $idTurma = $_GET["idTurma"];
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["descricaoAtividade"])) {
                $descricaoAtividade = $_POST["descricaoAtividade"];

                try {
                    $sql = $pdo->prepare('INSERT INTO atividade (descricao, idTurma) VALUES (?, ?)');

                    $sql->bindValue(1, $descricaoAtividade);
                    $sql->bindValue(2, $idTurma);

                    $sql->execute();

                    header('Location: ../visao/formListarAtividade.php?idTurma=' . $idTurma);
                    exit();
                } catch(PDOException $e){
                    if ($e->errorInfo[1] == 1062) { 
                        $mensagem =  "Erro: Já existe uma atividade com essa descrição para esta turma.";
                    } else {
                        echo 'Erro ao cadastrar atividade: ' . $e->getMessage();
                    }
                }
            } else {
                echo "Descrição da atividade não fornecida.";
            }
        }
    }
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
                        <a href="../visao/formListarAtividade.php?idTurma=<?php echo $idTurma; ?>" class="btn btn-primary">Voltar para Página de Atividades</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>