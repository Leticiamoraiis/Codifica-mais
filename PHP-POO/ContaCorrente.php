<?php

require_once __DIR__ . '/ContaBancaria.php';

class ContaCorrente extends ContaBancaria
{
    private float $taxaSaque = 3.50;
    private float $taxaTransferencia = 1.50;

    public function sacar(float $valor): void
    {
        $valorTotal = $valor + $this->taxaSaque;

        if ($valorTotal > $this->saldo) {
            echo "Saldo insuficiente para saque" . PHP_EOL;
            return;
        }

        $this->saldo -= $valorTotal;
    }

    public function transferir(ContaBancaria $contaDestino, float $valor): void
    {
        $valorTotal = $valor + $this->taxaTransferencia;

        if ($valorTotal > $this->saldo) {
            echo "Saldo insuficiente para transferência" . PHP_EOL;
            return;
        }

        $this->saldo -= $valorTotal;
        $contaDestino->depositar($valor);
    }
}
