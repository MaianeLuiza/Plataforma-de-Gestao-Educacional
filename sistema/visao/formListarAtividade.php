<?php
require '../dados/conexao.php';

session_start();

if (isset($_SESSION["idProfessor"])) {
    if(isset($_GET["idTurma"])){
        
        $idTurma = $_GET["idTurma"];

        $sqlNomeTurma = $pdo->prepare('SELECT nome FROM turma WHERE idTurma = ?');
        $sqlNomeTurma->bindValue(1, $idTurma);
        $sqlNomeTurma->execute();
        $resultadoTurma = $sqlNomeTurma->fetch();

  
        if($resultadoTurma) {
            $nomeTurma = $resultadoTurma['nome'];

            $sql = $pdo->prepare('CALL listarAtividades(?)');
            $sql->bindValue(1, $idTurma);
            $sql->execute();
            $resultados = $sql->fetchAll();

        } else {
            echo "Turma não encontrada.";
            exit();
        }
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Atvidades</title>
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
      <h2>Turma: <?php echo $nomeTurma; ?></h2>
    </div>

    <div class="col text-end">
      <a href="../visao/formCadastrarAtividadde.php?idTurma=<?php echo $idTurma; ?>" class="btn btn-primary">Cadastrar Atividade</a>
    </div>

  </div>
  <table class="table">
    <thead>
      <tr>
        <th>Número</th>
        <th>Nome</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($resultados as $linha) {
   
        echo("<tr>");
        echo(" <td>". $linha["idAtividade"] ."</td>");
        echo(" <td>". $linha["descricao"] ."</td>");
        echo("<td>");

     
        echo("</td>");
        echo("</tr>");
      }
    ?>      
    </tbody>
  </table>
  <div class="row mt-3">
    <div class="col">
      <a href="../visao/formListarTurma.php" class="btn btn-secondary">Voltar</a>
    </div>
  </div>
</div>
</body>
</html>