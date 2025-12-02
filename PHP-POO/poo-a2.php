<?php

class Produto {
    // Atributos privados
    private $nome;
    private $preco;
    private $quantidade;

    // Construtor
    public function __construct($nome, $preco, $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }

    // Alterar preço
    public function alterarPreco($novoPreco) {
        if ($novoPreco > 0) {
            $this->preco = $novoPreco;
        } else {
            echo "Preço inválido.<br>";
        }
    }

    // Alterar quantidade
    public function alterarQuantidade($novaQuantidade) {
        if ($novaQuantidade >= 0) {
            $this->quantidade = $novaQuantidade;
        } else {
            echo "Quantidade não pode ser negativa.<br>";
        }
    }

    // Exibir detalhes
    public function exibirDetalhes() {
        echo "Produto: " . $this->nome . "\n";
        echo "Preço: R$ " . $this->preco . "\n";
        echo "Quantidade em estoque: " . $this->quantidade . "\n";
    }
}

// Criando objeto e testando
$produto1 = new Produto("Camiseta", 50.00, 10);

$produto1->alterarPreco(60.00);
$produto1->alterarQuantidade(15);

$produto1->exibirDetalhes();

?>
