<?php

require "../conexao.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$datanascimento = $_POST["datanascimento"] ?? "";

$hashsenha = password_hash($senha, PASSWORD_DEFAULT);

try {

    $sql = <<<SQL
  INSERT INTO cliente (nome, cpf, email, hash_senha, data_nascimento)
  VALUES (?, ?, ?, ?, ?)
  SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $nome, $cpf, $email, $hashsenha,
        $datanascimento
    ]);

    header("location: ../index.html");
    exit();
} catch (Exception $e) {
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
