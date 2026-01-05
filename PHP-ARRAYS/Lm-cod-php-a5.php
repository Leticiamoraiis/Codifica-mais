<?php

//Solciita ao usuario seu peso
$Peso = readline ("Informe seu peso (KG): ");

//Solicita ao usuario sua altura
$Altura = readline ("Informe sua altura(M): ");

$Peso = (float) str_replace(',', '.', trim($Peso));
$Altura = (float) str_replace(',', '.', trim($Altura));

// validação básica
if ($Peso <= 0 || $Altura <= 0) {
    echo "Peso ou altura inválidos. Digite valores numéricos maiores que zero.\n";
    exit;
}

//Calcular o IMC
$CalculoIMC = $Peso / ($Altura * $Altura);

//Criada variavel resultado
$Resultado = $CalculoIMC;
  echo "Seu IMC é:" . $Resultado. "\n";

if ($CalculoIMC < 18.5) {
    echo "Magreza\n";
}
elseif ($CalculoIMC >= 18.5 && $CalculoIMC <= 24.9) {
    echo "Normal\n";
}
elseif ($CalculoIMC >= 25 && $CalculoIMC <= 29.9) {
echo  "Sobrepeso\n";
}
elseif ($CalculoIMC >= 30 && $CalculoIMC <= 34.9) {
    echo "Obesidade grau I\n";
}
elseif ($CalculoIMC >= 35 && $CalculoIMC < 40) {
    echo "Obesidade grau II\n";
}
else { ($CalculoIMC > 40);
    echo "Obesidade grau III\n";
}