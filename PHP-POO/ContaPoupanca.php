<?php

require_once __DIR__ . '/ContaBancaria.php';

class ContaPoupanca extends ContaBancaria
{
    public float $porcentagemRendimento = 0.01;

    public function aplicarRendimento(): void
    {
        $this->saldo += $this->saldo * $this->porcentagemRendimento;
    }

    public function getPorcentagemRendimento(): float
    {
        return $this->porcentagemRendimento;
    }

    public function setPorcentagemRendimento(float $valor): void
    {
        if ($valor < 0) {
            echo "Valor inválido" . PHP_EOL;
            return;
        }

        $this->porcentagemRendimento = $valor;
    }
}
