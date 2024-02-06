<?php
if (isset($_GET["idTurma"])) {
    $idTurma = $_GET["idTurma"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Confirmação de Exclusão</title>
</head>
<body>
    <div class="container mt-5" style="height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-3">
                    <h4 class="card-title text-center">Confirmação de Exclusão</h4>
                    <div class="card-body text-center">
                        <p>Você realmente deseja excluir esta turma?</p>
                        <form action="../controle/ExcluirTurma.php" method="post">
                            <input type="hidden" name="idTurma" value="<?php echo $idTurma; ?>">
                            <button type="submit" class="btn btn-danger">Sim, Excluir</button>
                            <a href="../visao/formListarTurma.php" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
} else {
    header('Location: ../visao/formListarTurma.php');
    exit();
}
?>
