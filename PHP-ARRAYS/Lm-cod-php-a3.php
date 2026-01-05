<?php

// Solicite o valor da temperatura 
$Temperatura = readline("Informe sua temperatura: ");

// Definindo uma variavel unidade 
$Unidade = readline("Digite C para Celsius e F para Fahrenheit: ");

// Verifica a unidade e faz a conversão
if (strtoupper($Unidade) === "C") {
    // Celsius para Fahrenheit
    $Conversao = ($Temperatura * 9 / 5) + 32;
    echo "A temperatura de Celsius para Fahrenheit é: $Conversao \n";
} elseif (strtoupper($Unidade) === "F") {
    // Fahrenheit para Celsius
    $Conversao = ($Temperatura - 32) * 5 / 9;
    echo "A temperatura de Fahrenheit para Celsius é: $Conversao \n";
} else {
    echo "Unidade inválida! Digite C ou F.\n";
}