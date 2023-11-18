<?php
require "../conexao.php";
$pdo = mysqlConnect();

$query = "SELECT Nome, Email, CPF FROM cliente";
$statement = $pdo->prepare($query);
$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;

echo json_encode($results);
?>