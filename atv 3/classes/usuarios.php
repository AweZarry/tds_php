<?php
include("conexao/db.php");

$db = new Conexao();

class Usuario
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar($nome, $email, $senha, $confirmarSenha)
    {
        if ($senha === $confirmarSenha) {
            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);

            $query = "INSERT usuarios (nome, email, senha) VALUES (?,?,?)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValues(1, $nome);
            $stmt->bindValues(2, $email);
            $stmt->bindValues(3, $senhaCrip);
            $result = $stmt->execute();

            return $result;
        }
    }

    public function logar($nome, $senha)
    {
        $query = "SELECT * FROM usuarios WHERE nome = :nome";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValues(':nome', $nome);
        $stmt->execute();

        if($stmt->rowCount() ==1){
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($senha, $usuario['senha'])){
                return true;
            }
        }
        return false;
    }

    public function verificarEmailNomeExistente($nome,$email){
        $query = "SELECT COUNT(*) FROM usuarios WHERE nome = ?, email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1,$nome);
        $stmt->bindValue(2,$email);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }
}
