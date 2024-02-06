<?php
require '../dados/conexao.php';

session_start();

if (isset($_SESSION["idProfessor"])) {
    $idProfessor = $_SESSION["idProfessor"];

    $sql = $pdo->prepare('CALL listarTurmas(?)');
    $sql->bindValue(1, $idProfessor);

    $sql->execute();

    $resultados = $sql->fetchAll();

} else {
    header("Location: ../visao/formAutenticar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Turmas</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../visao/formListarTurma.php"><?php echo($_SESSION["nome"]); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="../controle/CtrlSair.php">SAIR</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Turmas</h2>
    </div>
    <div class="col text-end">
      <a href="../visao/formCadastrarTurma.php" class="btn btn-primary">Cadastrar Turma</a>
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Número</th>
        <th>Nome</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($resultados as $linha) {
   
        echo("<tr>");
        echo(" <td>" . $linha['idTurma'] . "</td>");
        echo(" <td>".$linha['nome'] ."</td>");
        echo("<td>");

        echo("<a href='../visao/formConfirmarExclusao.php?idTurma=" . $linha['idTurma'] . "' class='btn btn-danger ms-2'>Excluir</a>");
        
        echo("<a href='../visao/formListarAtividade.php?idTurma=" . $linha['idTurma'] . "' class='btn btn-success ms-2'>Visualizar</a>");

        
        echo("</td>");
        echo("</tr>");
      }
    ?>      
    </tbody>
  </table>
</div>
</body>
</html>