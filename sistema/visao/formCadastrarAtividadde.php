<?php
require '../dados/conexao.php';

session_start();

if (isset($_SESSION["idProfessor"])) {
    if (isset($_GET["idTurma"])) {
        $idTurma = $_GET["idTurma"];

    } else {
        echo "ID da turma não fornecido.";
        exit();
    }
} else {
    header("Location: ../visao/formAutenticar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro de Atividade</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="../visao/formListarAtividade.php?idTurma=<?php echo $idTurma; ?>">Voltar</a>
    </div> 
</nav>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-3">
                <h4 class="card-title text-center">Cadastro de Atividade</h4>
                <div class="card-body">
                <form action="../controle/CadastrarAtividade.php?idTurma=<?php echo $idTurma; ?>" method="post">
                    <div class="mb-3">
                        <label for="descricaoAtividade" class="form-label">Descrição da Atividade: </label>
                        <input type="text" class="form-control" id="descricaoAtividade" name="descricaoAtividade" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>