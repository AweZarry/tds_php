<?php

class Carro{
    //propriedades da classe carro
    public $marca;
    public $modelo;
    public $ano;

    //método construtor

    public function __construct($marca,$modelo,$ano)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    //método para exibir informações 
    public function exibirinformacoes(){
        return "Carro: {$this->marca} {$this->modelo}, Ano {$this->ano}";

    }
}

class Pessoa{
       //Propriedades da classe  Pessoa 
        public $nome;
        public $idade;
        public $sexo;

       //Método construtor 
        public function __construct($nome,$idade,$sexo){
           $this->nome = $nome;
           $this->idade = $idade;
           $this->sexo = $sexo;
      }

       //Método para exibir informação das pessoas
        public function exibirinformacoes(){
        return "Nome: {$this->nome}, Idade {$this->idade} e Sexo {$this->sexo}";
    }
}
//Criando um objeto de classe Carro e da classe Pessoa
$carro1 = new Carro("Toyota", "Corolla", 2022);
$carro2 = new Carro("Honda", "Civic", 1999);

$pessoa1 = new Pessoa("Hyllan", 18, "Masculino");
$pessoa2 = new Pessoa("João", 22, "Masculino");


//exibir as informações dos carros e das pessoas

echo $carro1->exibirinformacoes() . "<br>";
echo $carro2->exibirinformacoes() . "<br>";

echo $pessoa1->exibirinformacoes() . "<br>";
echo $pessoa2->exibirinformacoes() . "<br>";