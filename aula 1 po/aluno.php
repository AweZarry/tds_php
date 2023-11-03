<?php

class Aluno{
    //propriedades da classe Aluno
    public $nome;
    public $idade;
    public $matricula;

    //método construtor

    public function __construct($nome,$idade,$matricula)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->matricula = $matricula;
    }

    //método para exibir informações 
    public function exibirinformacoes(){
        return "Nome: {$this->nome}, Idade: {$this->idade}, Matricula: {$this->matricula}";

    }
}

//Criando um objeto de classe Carro e da classe Pessoa
$aluno1 = new Aluno("Marcinho PJL", 21, 2022);
$aluno2 = new Aluno("Vailander", 19, 2017);
$aluno3 = new Aluno("Hyllan", 18, 2018);
$aluno4 = new Aluno("João", 22, 2015);


//exibir as informações dos carros e das pessoas

echo $aluno1->exibirinformacoes() . "<br>";
echo $aluno2->exibirinformacoes() . "<br>";
echo $aluno3->exibirinformacoes() . "<br>";
echo $aluno4->exibirinformacoes() . "<br>";