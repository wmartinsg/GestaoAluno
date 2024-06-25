<?php
// Incluir o arquivo de conexão
require_once '../config/conexao.php';

// Receber o CPF via GET
$cpf = $_GET['cpf'];
//função isset verifica se foi definido
if (isset($cpf))
{
    try {
        // Preparar o comando SQL DELETE usando PDO
        $sql = "DELETE FROM aluno WHERE CPF = :cpf";

        // Preparar a declaração
        $stmt = $conn->prepare($sql);

        // Vincular o parâmetro CPF à declaração
        $stmt->bindParam(':cpf', $cpf);

        // Executar a declaração
        if ($stmt->execute()) {
        header("Location: ../templates/deletar_aluno.php");
        } else {
                echo "<script>alert('Erro ao deletar aluno.');</script>";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
} //fim if empty
else {
    echo "<script>alert('CPF não fornecido.');</script>";
}
?>