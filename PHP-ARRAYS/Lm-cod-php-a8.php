<?php

function aplicarDesconto($ValorCompra, $PercentualDesconto) {
    $valorDesconto = $ValorCompra * ($PercentualDesconto / 100);
    $valorFinal = $ValorCompra - $valorDesconto;
    return $valorFinal;
}
//Valor da compra
$ValorCompra = (float) readline ("Informe o valor da compra:R$");

if ($ValorCompra < 100) {
    $PercentualDesconto = 0;
    echo "Você não obteve desconto\n.";
}
elseif ($ValorCompra > 100 && $ValorCompra <= 500) {
      $PercentualDesconto = 10;
      echo "Você obteve 10% de desconto\n";

} elseif ($ValorCompra > 500) {
    $PercentualDesconto = 20;
    echo "Você obteve 20% de desconto\n";
}
// Calcular valor final
$valorFinal = aplicarDesconto($ValorCompra,$PercentualDesconto);
echo "Valor final: R$ " . number_format($valorFinal, 2, ',', '.') . "\n";
