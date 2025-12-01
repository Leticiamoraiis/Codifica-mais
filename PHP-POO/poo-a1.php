<?php

class ContaBancaria {
    private $numeroConta;
    private $nomeTitular;
    private $saldo;

    public function __construct($numeroConta, $nomeTitular) {
        $this->numeroConta = $numeroConta;
        $this->nomeTitular = $nomeTitular;
        $this->saldo = 0;
    }

    public function depositar($quantia) {
        if ($quantia > 0) {
            $this->saldo += $quantia;
            echo "Depósito de R$ $quantia realizado com sucesso.<br>";
        } else {
            echo "Valor inválido para depósito.<br>";
        }
    }

    public function sacar($quantia) {
        if ($quantia > 0 && $quantia <= $this->saldo) {
            $this->saldo -= $quantia;
            echo "Saque de R$ $quantia realizado com sucesso.<br>";
        } else {
            echo "Saldo insuficiente ou valor inválido.<br>";
        }
    }

    public function exibirSaldo() {
        echo "Saldo atual: R$ " . $this->saldo . "<br>";
    }
}

// ==============================
// TESTES
// ==============================

$conta = new ContaBancaria("875246", "Leticia Morais");

$conta->depositar(100);
$conta->sacar(30);
$conta->exibirSaldo();

$conta->depositar(0);
$conta->sacar(500);
