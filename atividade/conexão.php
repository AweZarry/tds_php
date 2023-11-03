<?php
$servername = "localhost";  
$username = "root";   
$password = "";     
$dbname = "errospc";   


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

echo "Conexão bem-sucedida";
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $aparelho = $_POST["aparelho"];
    $problema = $_POST["problema"];

    if ($aparelho == "Computador" || $aparelho == "Notebook") {
        $sql = "INSERT INTO errospc (nome_usuario, email, aparelho, problema) VALUES ('$nome', '$email', '$aparelho', '$problema')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso!";
        } else {
            echo "Erro ao inserir registro: " . $conn->error;
        }
    } else {
        echo "Aceitamos apenas Computadores e Notebooks";
    }

    $conn->close();  
}
?>
