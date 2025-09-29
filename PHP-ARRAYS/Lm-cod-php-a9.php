<?php

$Estoque = [
['Bermuda', 59.9, 6], // Produto 1
['Camisa', 89.9, 5], // Produto 2
['Sapato', 179.9, 10], // Produto 3
['Calça', 99.9, 7] // Produto 4
];

//Variavel de calculo total
$ValorTotal = 0;

//Criando especificações dos produtos para calculo
foreach ($Estoque as $Produto) {

// Criando um array associativo
$Item = [
        'nome'       => $Produto[0],
        'valor'      => $Produto[1],
        'quantidade' => $Produto[2]
];

// Cálculo do subtotal
    $ValorProduto = $Item['valor'] * $Item['quantidade'];
    $ValorTotal += $ValorProduto;
}

// Imprimindo o resultado
echo "Valor total do estoque: R$ " . number_format($ValorTotal, 2, ',', '.');