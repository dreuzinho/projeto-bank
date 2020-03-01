<?php
session_start();
require 'config.php';

if (isset($_POST['conta']) && !empty($_POST['conta'])) {
    $titular = addslashes($_POST['titular']);
    $agencia = addslashes($_POST['agencia']);
    $conta = addslashes($_POST['conta']);
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM contas WHERE conta = '$conta'";
    $sql = $pdo->query($sql);

    if ($sql->rowCount() <= 0) {

        $sql = "INSERT INTO contas (titular, agencia, conta, senha) VALUES ('$titular', '$agencia', '$conta', '$senha')";
        $sql = $pdo->query($sql);

        header("Location: login.php");
        exit;
    }
}
?>

<html>

<head>
</head>

<body>
    <h1>Cadastrar</h1>

    <form method="POST">
        Titular:<br />
        <input type="text" name="titular" /><br /><br />

        Agencia:<br />
        <input type="text" name="agencia" /><br /><br />

        Conta:<br />
        <input type="text" name="conta" /><br /><br />

        Senha:<br />
        <input type="password" name="senha" /><br /><br />

        <input type="submit" value="Cadastrar"><br />
    </form>
</body>

</html>