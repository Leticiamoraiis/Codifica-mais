<?php 

//Notas dos alunos
$NotasAlunos = [
 "Aluno 1" => [8.5, 6.0, 7.8, 9.2, 5.5], 
 "Aluno 2" => [7.0, 8.0, 6.5, 7.5, 8.5], 
 "Aluno 3" => [6.5, 7.5, 4.5, 5.5, 7.0], 
 "Aluno 4" => [5.0, 4.6, 7.8, 9.0, 6.0] 
];

//Criando variavel de soma de notas
foreach ($NotasAlunos as $NomeAluno => $notas) {

    $Soma = array_sum($notas);           // soma das notas
    $MediaNotas = $Soma / count($notas); // média das notas

    if ($MediaNotas < 7) {
        echo "$NomeAluno | Média: $MediaNotas | Reprovado\n";
    } else {
        echo "$NomeAluno | Média: $MediaNotas | Aprovado ✅ Parabéns!\n";
    }
}