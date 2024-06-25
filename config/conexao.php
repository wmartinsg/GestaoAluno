<?php
    $host= "localhost"; // Endereço do servidor MySQL
    $port= "3306"; // Porta do serviço MySQL (por padrão é 3306)
    $dbname="bdaula"; // Nome do banco de dados
    $user="root"; // Nome de usuário do MySQL
    $pass="911076"; // Senha do MySQL
    try
    {
        // Tentativa de conexão com o banco de dados usando PDO
        $conn= new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        // Define o modo de tratamento de erros do PDO para lançar exceções em caso de erro
        // PDO::ATTR_ERRMODE é o atributo que estamos configurando, define o modo de tratamento de erros
        // PDO::ERRMODE_EXCEPTION é o valor que estamos atribuindo ao atributo PDO::ATTR_ERRMODE
        // Este valor instrui o PDO a lançar uma exceção em caso de erro
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        // Em caso de erro na conexão, captura a exceção e imprime a mensagem de erro
        $erro= $e->getMessage();
        echo $erro;
    }
?>