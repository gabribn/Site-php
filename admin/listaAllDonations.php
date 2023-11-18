<?php
require "../conexao.php";
$pdo = mysqlConnect();

$query = "SELECT Data, Valor, id_cliente FROM doacao";
$statement = $pdo->prepare($query);
$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;

echo json_encode($results);
?>
