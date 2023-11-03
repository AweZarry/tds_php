<?php
require_once('classes/Livros.php'); /* essa parte do codigo puxa as informações tipo atributos e outras coisas variaveis desse arquivo */
require_once('conexao/conexao.php');

$database = new Database();
$db = $database->getConnection();
$Livros = new Livros($db);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        /* São as ações que cada botão vai fazer o read e para poder atualizar sem ter problema com as informações antigas */
        case 'create':
            $Livros->create($_POST);
            $rows = $Livros->read();
            break;
        case 'read':
            $rows = $Livros->read();
            break;
        default:
            $rows = $Livros->read();
            break;
    }
} else {
    $rows = $Livros->read();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: flex;
            margin-top: 10px
        }

        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=date] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
<form action="?action=create" method="POST">
        <label for="">Titulo</label>
        <input type="text" name="titulo" required placeholder="Coloque o titulo do livro">

        <label for="">Livro</label>
        <input type="text" name="autor" required placeholder="Coloque o nome do autor">

        <label for="">Capitulos</label>
        <input type="text" name="caps" required placeholder="Coloque a quantidade de capitulos">
        
        <label for="">Paginas</label>
        <input type="text" name="pags" required placeholder="Coloque a quantidade de paginas">

        <label for="">Estilo</label>
        <select name="estilo">
            <option value="CapaGrossa">Capa Grossa</option>
            <option value="CapaFina">Capa Fina</option>
            <option value="EBook">EBook</option>
        </select>

        <label for="">Genero</label>
        <input type="text" name="genero" required placeholder="Coloque o genero do livro">

        <label for="">Data de Lançamento</label>
        <input type="date" name="data" required>

        <input type="submit" value="Cadastrar" name="enviar" onclick="return confirm('Certeza que deseja cadastar esse livro?')">
    </form>
    
</body>
</html>