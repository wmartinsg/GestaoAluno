<?php
function cpfExiste($cpf, $conn) {
    try {
        // Prepara a consulta SQL para verificar a existência do CPF
        $stmt = $conn->prepare("SELECT COUNT(*) FROM aluno WHERE cpf = :cpf");
        // Associa o parâmetro CPF
        $stmt->bindParam(':cpf', $cpf);
        // Executa a consulta
        $stmt->execute();
        // Obtém o resultado da consulta
        $count = $stmt->fetchColumn();
        // Retorna true se o CPF existir (count > 0), caso contrário retorna false
        return $count > 0;
    } catch (PDOException $e) {
        echo "Erro ao verificar CPF: " . $e->getMessage();
        return false;
    }
}// fim cpf
function matriculaExiste($matricula, $conn) {
    try {
        // Prepara a consulta SQL para verificar a existência da matrícula
        $stmt = $conn->prepare("SELECT COUNT(*) FROM aluno WHERE matricula = :matricula");
        // Associa o parâmetro matrícula
        $stmt->bindParam(':matricula', $matricula);
        // Executa a consulta
        $stmt->execute();
        // Obtém o resultado da consulta
        $count = $stmt->fetchColumn();
        // Retorna true se a matrícula existir (count > 0), caso contrário retorna false
        return $count > 0;
    } catch (PDOException $e) {
        echo "Erro ao verificar matrícula: " . $e->getMessage();
        return false;
    }
}
?>