<?php
// Solicita o valor da conta
$valorConta = readline("Digite o valor da conta: ");

// Solicita a porcentagem da gorjeta
$porcentagem = readline("Digite a porcentagem da gorjeta: ");

// Calcula o valor da gorjeta
$valorGorjeta = ($valorConta * $porcentagem) / 100;

// Calcula o valor total a ser pago
$totalPagar = $valorConta + $valorGorjeta;

// Exibe os resultados formatados
echo "-----------------------------\n";
echo "Valor da conta: R$ " . number_format($valorConta, 2, ',', '.') . "\n";
echo "Porcentagem da gorjeta: $porcentagem%\n";
echo "Valor da gorjeta: R$ " . number_format($valorGorjeta, 2, ',', '.') . "\n";
echo "Valor total a pagar: R$ " . number_format($totalPagar, 2, ',', '.') . "\n";
echo "-----------------------------\n";
