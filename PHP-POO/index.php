<?php

require_once __DIR__ . '/ContaBancaria.php';
require_once __DIR__ . '/ContaCorrente.php';
require_once __DIR__ . '/ContaPoupanca.php';

$contaCorrente = new ContaCorrente(12345678, 'Gabriel', 100);
$contaPoupanca = new ContaPoupanca(123456, 'Lucas', 200);

$contaCorrente->exibirSaldo();
$contaPoupanca->exibirSaldo();

$contaPoupanca->depositar(100);
$contaPoupanca->sacar(50);

$contaCorrente->sacar(50);
$contaCorrente->exibirSaldo();

$contaCorrente->transferir($contaPoupanca, 40);

echo $contaPoupanca->getPorcentagemRendimento() . PHP_EOL;
$contaPoupanca->setPorcentagemRendimento(0.10);
echo $contaPoupanca->getPorcentagemRendimento() . PHP_EOL;

$contaPoupanca->aplicarRendimento();
$contaPoupanca->exibirSaldo();
