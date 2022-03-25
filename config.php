<?php

$dbName = 'localiza_bus';
$dbHost = 'localhost';
$dbUser = 'root';
$dbSenha = '';

try {

    $conexao = new PDO(
        'mysql:dbname=' . $dbName . ';
         host=' . $dbHost . '',
        'root',
        ''
    );

    /*
    $sql = $conexao->prepare('INSERT INTO cadastro VALUES (:usuario, :email, :telefone, :senha)');
    $sql->bindValue(':usuario', 'vou pegar a itiara hoje');
    $sql->bindValue(':email', 'itiara@gmail.com');
    $sql->bindValue(':telefone', '19-992544243');
    $sql->bindValue(':senha', '111');
    $sql->execute();
    */
    // $conexao = new PDO('mysql:dbname=tarefas;host=localhost', 'root', '');

    //
} catch (PDOException $e) {

    echo "Erro => " . $e->getMessage();
}


//fecha a conexão com o banco de dados
//unset($this->driverConexaoBDO);
