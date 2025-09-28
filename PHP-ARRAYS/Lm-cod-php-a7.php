<?php

// Itens comprados
$ProdutosComprados = ['Carne','sal','tomate','cebola','pimentão','arroz'];

// Preço de cada item
$PrecoItens = [109.90, 5.0, 6.30, 1.70, 1.30, 1.0];

// Solicitar número total de participantes
$TotalParticipantes = (int) readline("Informe o número total de participantes: ");

// Calcular o valor total dos itens
$valorTotal = array_sum($PrecoItens);

// Função para dividir o valor
function CalcularPorPessoa(float $Total, int $QuantidadeParticipantes): float {
    if ($QuantidadeParticipantes <= 0) { 
        return 0;
    }
    return $Total / $QuantidadeParticipantes;
}

// Calcular valor por pessoa
$ValorPorPessoa = CalcularPorPessoa($valorTotal, $TotalParticipantes);

// Imprimir resultados
echo "\n Churrasco \n";
echo "Valor total: R$ " . number_format($valorTotal, 2, ',', '.') . "\n";
echo "Cada pessoa deve pagar: R$ " . number_format($ValorPorPessoa, 2, ',', '.') . "\n";

// Descobrir o item mais caro
$indiceMaisCaro = array_keys($PrecoItens, max($PrecoItens))[0];
$itemMaisCaro = $ProdutosComprados[$indiceMaisCaro];
echo "Item mais caro: " . $itemMaisCaro . " (R$ " . number_format($PrecoItens[$indiceMaisCaro], 2, ',', '.') . ")\n";