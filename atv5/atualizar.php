<?php
require_once('classes/Livros.php'); /* essa parte do codigo puxa as informações tipo atributos e outras coisas variaveis desse arquivo */
require_once('conexao/conexao.php');

$database = new Database();
$db = $database->getConnection();
$livros = new Livros($db);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
            /* São as ações que cada botão vai fazer o read e para poder atualizar sem ter problema com as informações antigas */
        case 'read':
            $rows = $livros->read();
            break;
        case 'update':
            if (isset($_POST['id'])) {
                $livros->update($_POST);
            }
            $rows = $livros->read();
            break;
        case 'delete':
            $livros->delete($_GET['id']);
            $rows = $livros->read();
            break;

        default:
            $rows = $livros->read();
            break;
    }
} else {
    $rows = $livros->read();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial;
            background-image: linear-gradient(to right, #FF2626, #D21F1F, #000000);
        }

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
            border: 1px solid #000000;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #000000;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=date] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #000000;
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

        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }

        th,
        td {
            text-align: left;
            background-color: #fff;
            padding: 8px;
            border: 1px solid #000000;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        a {
            display: inline-block;
            padding: 4px 8px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0069d9;
        }

        a.delete {
            background-color: #dc3545;
        }

        a.delete:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <?php
    /*Procurar as informações do usuario pelo id */
    if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $livros->readOne($id);

        if (!$result) {
            echo "Registro não encontrado.";
            exit();
        }
        $titulo = $result['titulo'];
        $autor = $result['autor'];
        $caps = $result['qntcap'];
        $pags = $result['qntpg'];
        $estilo = $result['estilo'];
        $genero = $result['genero'];
        $data = $result['data'];

    ?>

        <form action="?action=update" method="POST">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" value="<?php echo $titulo ?>">

            <label for="autor">Autor</label>
            <input type="text" name="autor" value="<?php echo $autor ?>">

            <label for="caps">Capitulos</label>
            <input type="text" name="caps" value="<?php echo $caps ?>">

            <label for="pags">Paginas</label>
            <input type="text" name="pags" value="<?php echo $pags ?>">

            <label for="estilo">Estilo</label>
            <select name="estilo" value="<?php echo $estilo ?>">
                <option value="CapaGrossa">Capa Grossa</option>
                <option value="CapaFina">Capa Fina</option>
                <option value="EBook">EBook</option>
            </select>


            <label for="genero">Genero</label>
            <input type="text" name="genero" value="<?php echo $genero ?>">

            <label for="data">Data de lançamento</label>
            <input type="date" name="data" value="<?php echo $data ?>">

            <input type="submit" value="Atualizar" name="enviar" onclick="return confirm('Certeza que deseja atualizar?')">

        </form>

    <?php
    }
    ?>

    <table>
        <tr>
            <td>Id</td>
            <td>Titulo</td>
            <td>Autor</td>
            <td>Capitulos</td>
            <td>Paginas</td>
            <td>Estilos</td>
            <td>Genero</td>
            <td>Data de lançamento</td>
            <td>Ações</td>
        </tr>

        <?php
        /* Mostra as informações de cada usuario na tabela acima os <a> são as açoes update e delete */
        if ($rows->rowCount() == 0) {
            echo "<tr>";
            echo "<td colspan='7'>Nenhum dado encontrado</td>";
            echo "</tr>";
        } else {
            while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['titulo'] . "</td>";
                echo "<td>" . $row['autor'] . "</td>";
                echo "<td>" . $row['qntcap'] . "</td>";
                echo "<td>" . $row['qntpg'] . "</td>";
                echo "<td>" . $row['estilo'] . "</td>";
                echo "<td>" . $row['genero'] . "</td>";
                echo "<td>" . $row['data'] . "</td>";
                echo "<td>";
                echo "<a href='?action=update&id=" . $row['id'] . "'>Editar</a>";
                echo "<a href='?action=delete&id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que quer apagar esse registro?\")' class='delete'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>

    </table>

</body>

</html>