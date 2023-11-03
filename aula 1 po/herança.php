<?php
//exemplo de herança

class Veiculo{
    //propriedades da classe Veiculo

    protected $marca;
    protected $modelo;

    //métedo construtor

    public function __construct($marca, $modelo){
        $this->marca = $marca;
        $this->modelo = $modelo;
    }


    //métedo para exibir informações 

    public function exibirinformacoes(){
        return "Veiculo: {$this->marca} {$this->modelo}";
    }


}

class Carro extends Veiculo{
    //propriedades adicional da classe Carro
    private $portas;

    public function __construct($marca, $modelo, $portas){
        parent::__construct($marca, $modelo);
        $this->portas = $portas;
    }

    public function exibirinformacoes(){
        return "Carro: {$this->marca} {$this->modelo} Portas: {$this->portas}";
    }
}

//objetos da clase veiculo
$carro1 = new Carro("Ford", "Ka", 4);
$carro2 = new Carro("Honda", "City", 2);

//exibir as informações 
echo $carro1->exibirinformacoes() . "<br>";
echo $carro2->exibirinformacoes() . "<br>";
