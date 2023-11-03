<?php
include_once('conexao/conexao.php');

$db = new Database();

class Livros
{
    private $conn;
    private $table_name = "livros";

    public function __construct($db)
    {
        $this->conn = $db;
    }
    /* Função pega as informações digitadas no formulario e coloca as informações no banco de dados */
    public function create($postValues)
    {
        $titulo = $postValues['titulo'];
        $autor = $postValues['autor'];
        $caps = $postValues['caps'];
        $pags = $postValues['pags'];
        $estilo = $postValues['estilo'];
        $genero = $postValues['genero'];
        $data = $postValues['data'];

        $tituloverificar = $this->verificarTituloExistente($titulo);
        if ($tituloverificar) {
            print "<script> alert('Livro ja Cadastrado')</script>";
            return false;
        }


        $query = "INSERT INTO " . $this->table_name . " (titulo, autor, qntcap, qntpg, estilo, genero, data) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $autor);
        $stmt->bindParam(3, $caps);
        $stmt->bindParam(4, $pags);
        $stmt->bindParam(5, $estilo);
        $stmt->bindParam(6, $genero);
        $stmt->bindParam(7, $data);

        $rows = $this->read();
        if ($stmt->execute()) {
            print "<script>alert('Cadastro Ok!')</script>";
            print "<script> location.href='atualizar.php'; </script>";
            return true;
        } else {
            return false;
        }
    }

    private function verificarTituloExistente($titulo)
    {
        $sql = "SELECT COUNT(*) FROM livros WHERE titulo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $titulo);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }

    /* essa função le as informações do banco de dados */
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    /*atualiza as informações do banco de dados */
    public function update($postValues)
    {

        $id = $postValues['id'];
        $titulo = $postValues['titulo'];
        $autor = $postValues['autor'];
        $caps = $postValues['caps'];
        $pags = $postValues['pags'];
        $estilo = $postValues['estilo'];
        $genero = $postValues['genero'];
        $data = $postValues['data'];

        if (empty($id) || empty($titulo) || empty($autor) || empty($caps) || empty($pags) || empty($estilo) || empty($genero) || empty($data)) {
            return false;
        }

        $query = "UPDATE " . $this->table_name . " SET titulo = ?, autor = ?, qntcap = ?, qntpg = ?, estilo = ?, genero = ?, data = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $autor);
        $stmt->bindParam(3, $caps);
        $stmt->bindParam(4, $pags);
        $stmt->bindParam(5, $estilo);
        $stmt->bindParam(6, $genero);
        $stmt->bindParam(7, $data);
        $stmt->bindParam(8, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /* puxa as informações atualizadas e atualiza no banco*/
    public function readOne($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    /* deleta as informações no banco de dados do id*/
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
