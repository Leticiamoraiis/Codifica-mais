<?php

//Variavél de todos os funcionários, respectivos sálarios e horas extras.
$Funcionarios = [  
['Pedro',2500.0,10],
['Renata',3000.0,5],
['Sérgio',2800.0,8],
['Vanessa',3200.0,12],
['André',1700.0,0],

];

//Função para calcular o salario total
function CalcularSalarioTotal ($salarioBase, $horasExtras){

//Calcular hora normal
$ValorHoraNormal = $salarioBase / 160;

//Calcular hora extra
$ValorHoraExtra = $ValorHoraNormal *1.5;

//Salario total com horas extras
return $salarioBase + ($horasExtras * $ValorHoraExtra);
}

//Criando array associativo
//Função para listar funcionários
function listarFuncionarios($funcionarios) {
    foreach ($funcionarios as $f) {
        echo "Nome: {$f['nome']}\n";
        echo "Salário Base: R$ " . number_format($f['salario base'], 2, ',', '.') . "\n";
        echo "Horas Extras: {$f['horas extras']}\n";
        echo "Salário Total: R$ " . number_format($f['salario total'], 2, ',', '.') . "\n";
        echo "----------------------\n";
    }
}

// Criando array associativo e adicionando o salário total
$FuncionariosAssociativo = [];

foreach ($Funcionarios as $Dados) {
    $salarioBase = $Dados[1];
    $horasExtras = $Dados[2];

    // Calcular o salário total
    $salarioTotal = CalcularSalarioTotal($salarioBase, $horasExtras);

    // Criar array associativo para cada funcionário
    $FuncionariosAssociativo[] = [
        'nome' => $Dados[0],
        'salario_base' => $salarioBase,
        'horas_extras' => $horasExtras,
        'salario_total' => $salarioTotal
    ];
}

// Listar funcionários com os salários totais
listarFuncionarios($FuncionariosAssociativo);