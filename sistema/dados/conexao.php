<?php
    try {

        $pdo = new PDO('mysql:host=localhost;dbname=ensino_profissional_db', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
?>