<?php

//Solicite o valor da largura do retângulo
$LarguraRetangulo = readline ("Informe a largura do retangulo: ");

//Solicite o valor da altura do retângulo
$AlturaRetangulo = readline ("Informe a largura do retângulo: ");

//Informe o valor da area
$AreaTotal = ($LarguraRetangulo * $AlturaRetangulo);

//Exibe o resultado
echo "O tamanho total da area é: $AreaTotal";

//Solicita o valor do perimetro
$Perimetro = (2 * $LarguraRetangulo + $AlturaRetangulo);
echo " O valor do perimetro é: $Perimetro";