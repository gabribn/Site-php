<?php
session_start();

require "../conexao.php";
require "../UsuarioEntidade.php";

$pdo = mysqlConnect();

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

function getUserInfo($pdo, $email)
{
    $sql = "SELECT cpf, nome, data_nascimento, adm FROM cliente WHERE email = ?";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        exit('Falha inesperada: ' . $e->getMessage());
    }
}

function checkLogin($pdo, $email, $senha)
{
    $sql = "SELECT hash_senha, cpf FROM cliente WHERE email = ?";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row || !password_verify($senha, $row['hash_senha'])) {
            return false;
        }

        return $row['cpf'];
    } catch (Exception $e) {
        exit('Falha inesperada: ' . $e->getMessage());
    }
}

$cpfUsuario = checkLogin($pdo, $email, $senha);

if ($cpfUsuario) {
    $userInfo = getUserInfo($pdo, $email);

    $usuario = new UsuarioEntidade();
    $usuario->setCpf($userInfo['cpf']);
    $usuario->setNome($userInfo['nome']);
    $usuario->setDataNascimento($userInfo['data_nascimento']);
    $usuario->setEmail($email);

    $_SESSION["login"] = true;
    $_SESSION["usuario"] = $usuario;

    if ($userInfo['adm']) {
        header("Location: ../admin.html");
    } else {
        header("Location: ../loged.html");
    }
    exit();
} else {
    header("Location: login.html");
    exit();
}
?>
