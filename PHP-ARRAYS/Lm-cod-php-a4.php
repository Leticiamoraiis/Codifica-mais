<?php 

//Solicita o valor original da compra
 $ValorOriginal = readline("Informe o valor original do produto: R$");

 //Parametro de porcentagem de desconto
 $PorcentagemDesconto = 8;

  //Conta para identificar o valor do desconto na compra
 $CalculoValorDesconto = $ValorOriginal * ($PorcentagemDesconto / 100);

 //Calcule o valor final com desconto
 $ValorFinal = $ValorOriginal - $CalculoValorDesconto;

 //Valor final com desconto
 echo "O valor final da compra com desconto é de: R$ $ValorFinal \n";