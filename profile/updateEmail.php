<?php
require "../conexao.php";
require_once "../UsuarioEntidade.php";
    session_start();
    if(!isset($_SESSION["login"]) || $_SESSION["login"] != "1") {
        header("Location: login.php");
    }
    else {
        $usuario = $_SESSION["usuario"];
    }
$pdo = mysqlConnect();

$newEmail = $_POST["newEmail"] ?? "";
$cpf = $_SESSION["usuario"]->getCpf();

$sql = "UPDATE cliente SET email = ? WHERE cpf = ?";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$newEmail, $cpf]);
    echo "success";
} catch (Exception $e) {
    echo "error";
}
?>
