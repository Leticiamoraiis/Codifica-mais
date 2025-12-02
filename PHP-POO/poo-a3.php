<?php

class Funcionario {
    // Atributos privados
    private $nome;
    private $cargo;
    private $salario;

    // Construtor
    public function __construct($nome, $cargo, $salario) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    // Método para alterar cargo
    public function alterarCargo($novoCargo) {
        $this->cargo = $novoCargo;
    }

    // Método para alterar salário
    public function alterarSalario($novoSalario) {
        if ($novoSalario >= 0) {
            $this->salario = $novoSalario;
        } else {
            echo "O salário não pode ser negativo.\n";
        }
    }

    // Método para exibir detalhes
    public function exibirDetalhes() {
        echo "Nome: " . $this->nome . "\n";
        echo "Cargo: " . $this->cargo . "\n";
        echo "Salário: R$ " . $this->salario . "\n";
    }
}

// Criando um funcionário e testando
$funcionario1 = new Funcionario("Letícia", "Assistente", 3000);

$funcionario1->alterarCargo("Analista");
$funcionario1->alterarSalario(4500);

$funcionario1->exibirDetalhes();

?>
