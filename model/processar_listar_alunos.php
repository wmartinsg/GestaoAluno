<?php
require_once "../config/conexao.php";
function getAllAlunos($conn) {
    try {
        $stmt = $conn->prepare("SELECT nome, dataNascimento, curso, matricula, cpf, email, endereco FROM aluno");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Erro ao recuperar alunos: " . $e->getMessage();
        return [];
    }
}
?>
