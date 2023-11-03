<?php
session_start();

require_once('classes/Eagle.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new eagle($db);

if(isset($_POST['logar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($usuario->logar($email, $senha)){
        $_SESSION['email'] = $email;

        header("Location: dashboard.php");
        exit();
    }else{
        print "<script>alert('Login invalido')</script>";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Tela de Login</title>
</head>

<body>
    <div class="logar">
        <h1>Tela de Login</h1>
        <form action="" method="POST">
            <label for="Email">Usuario</label>
            <input type="text" name="nome" placeholder="Coloque seu email">
            
            <label for="Senha">Senha</label>
            <input type="passoword" name="senha" placeholder="Coloque sua senha">

            <button type="submit" name="entrar">Entrar</button>
        </form>

        <p><a href="trocarsenha.php">Esqueceu sua senha?</a></p>

        <p><a href="cadastrar.php">Cadastre-se</a></p>
    </div>
</body>

</html>