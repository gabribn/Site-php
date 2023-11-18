<?php
require_once "../UsuarioEntidade.php";
require_once "../conexao.php";
session_start();

$usuario = $_SESSION["usuario"];

if (isset($_POST['delete'])) {
    try {
        $pdo = mysqlConnect();
        $cpf = $usuario->getCpf();

        $query = "DELETE FROM cliente WHERE CPF = :cpf";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    
        if ($statement->execute()) {
            session_destroy(); 
            header("Location: ../index.html");
            exit();
        } else {
            echo "Erro ao excluir o usuário";
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
