<?php
require "../UsuarioEntidade.php";

session_start();

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true || !isset($_SESSION["usuario"])) {
    header("Location: ../login/login.html");
    exit();
}

$usuario = $_SESSION["usuario"];
$id_cliente = $usuario->getCpf();
$valor = $_POST['amount'] ?? "";
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : "";
$data = date("Y-m-d");

require "../conexao.php";
$pdo = mysqlConnect();

$sql = "INSERT INTO doacao (id_cliente, valor, mensagem, data) VALUES (?, ?, ?, ?)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_cliente, $valor, $mensagem, $data]);

    header("Location: ../payment/payment.php");
    exit();
} catch (PDOException $e) {
    echo "Erro ao registrar doação: " . $e->getMessage();
}
