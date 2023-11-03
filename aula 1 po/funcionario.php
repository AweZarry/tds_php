<?php


class Funcionario{
    //propriedades da classe Veiculo

    protected $nome;
    protected $salario;

    //métedo construtor

    public function __construct($nome, $modelo){
        $this->nome = $nome;
        $this->modelo = $modelo;
    }


    //métedo para exibir informações 

    public function exibirinformacoes(){
        return "Nome: {$this->nome} e Salario: {$this->salario}";
    }


}

class Gerente extends Funcionario{
    //propriedades adicional da classe Funcionario
    private $setor;

    public function __construct($nome, $salario, $setor){
        parent::__construct($nome, $salario);
        $this->setor = $setor;
    }

    public function exibirinformacoes(){
        return "Nome: {$this->nome}, Salario: {$this->salario} e Setor: {$this->setor}";
    }
}

class Desenvolvedor extends Funcionario{
    //propriedades adicional da classe Funcionario
    private $linguagem;
    
    public function __construct($nome, $salario, $linguagem){
        parent::__construct($nome, $salario);
        $this->linguagem = $linguagem;
    }

    public function exibirinformacoes(){
        return "Nome: {$this->nome}, Salario: {$this->salario} e Linguagem: {$this->linguagem}";
    }
}

//objetos da classes
$funcionario = new Funcionario("Anliboliverd", 2000);
$gerente = new Gerente("Polinsk", 5000, "Comando");
$desenvolvedor = new Desenvolvedor("Marquinho", 7000,"C");


//exibir as informações 

echo $funcionario->exibirinformacoes() . "<br>";
echo $gerente->exibirinformacoes() . "<br>";
echo $desenvolvedor->exibirinformacoes() . "<br>";