<?php

class ContaBancaria
{
    public int $numeroDaConta;
    public string $nomeDoTitular;
    public float $saldo = 0;

    public function __construct(int $numeroDaConta, string $nomeDoTitular, float $saldo = 0)
    {
        $this->numeroDaConta = $numeroDaConta;
        $this->nomeDoTitular = $nomeDoTitular;

        if ($saldo < 0) {
            $this->saldo = 0;
        } else {
            $this->saldo = $saldo;
        }
    }

    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            echo "Valor inválido para depósito" . PHP_EOL;
            return;
        }

        $this->saldo += $valor;
    }

    public function sacar(float $valor): void
    {
        if ($valor <= 0 || $valor > $this->saldo) {
            echo "Não foi possível realizar o saque" . PHP_EOL;
            return;
        }

        $this->saldo -= $valor;
    }

    public function exibirSaldo(): void
    {
        echo "Conta: " . $this->numeroDaConta .
             " - Titular: " . $this->nomeDoTitular .
             " - Saldo: R$ " . $this->saldo . PHP_EOL;
    }
}
