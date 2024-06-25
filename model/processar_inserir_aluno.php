<?php
// Inclui o arquivo de conexão e verificação
require_once "../config/conexao.php";
require_once "validar.php";
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $curso = $_POST['curso'];
    $matricula = $_POST['matricula'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    // Verifica se o CPF ou a matrícula já existem
    if (cpfExiste($cpf, $conn)) {
        $mensagemErro = "O CPF já está cadastrado.";
    } elseif (matriculaExiste($matricula, $conn)) {
        $mensagemErro = "A matrícula já está cadastrada.";
    } else {
        try {
            // Prepara a consulta SQL para inserir um novo aluno
            $stmt = $conn->prepare("INSERT INTO aluno (nome, dataNascimento, curso, matricula, cpf, email, endereco)
            VALUES (:nome, :dataNascimento, :curso, :matricula, :cpf, :email, :endereco)");
            // Associa os parâmetros com os valores do formulário
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':dataNascimento', $dataNascimento);
            $stmt->bindParam(':curso', $curso);
            $stmt->bindParam(':matricula', $matricula);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':endereco', $endereco);
            // Executa a consulta
            $stmt->execute();
            // Redireciona para index.php
            header("Location: ../templates/index.php");
            exit(); // Garante que o script pare de ser executado após o redirecionamento
        } catch(PDOException $e) {
            $mensagemErro = "Erro ao inserir aluno: " . $e->getMessage();
        }
    }
    // Se houve algum erro, redireciona de volta ao formulário com a mensagem de erro
    if (isset($mensagemErro)) {
    header("Location: ../templates/inserir_aluno.php?erro=" . urlencode($mensagemErro));
    exit();
    }
}
?>