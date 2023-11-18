<?php
require "../conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
    $pdo = mysqlConnect();
    if ($pdo) {
        $query = "DELETE FROM cliente WHERE CPF = :cpf";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        
        if ($statement->execute()) {
            echo json_encode(['success' => true, 'message' => 'Usuário removido com sucesso.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao remover o usuário.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro de conexão com o banco de dados.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'CPF não fornecido ou método de solicitação inválido.']);
}
?>
