<?php
require "../UsuarioEntidade.php";
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true || !isset($_SESSION["usuario"])) {
    header("Location: login.html");
    exit();
}

$usuario = $_SESSION["usuario"];
$id_cliente = $usuario->getCpf();

require "../conexao.php";
$pdo = mysqlConnect();

$query = "SELECT Data, Valor FROM doacao WHERE id_cliente = :id_cliente";
$statement = $pdo->prepare($query);
$statement->bindParam(':id_cliente', $id_cliente, PDO::PARAM_STR);
$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;

echo json_encode($results);
