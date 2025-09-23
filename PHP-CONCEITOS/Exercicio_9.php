<?php 

$numeros = [];
echo "Digite números inteiros. Para parar, digite -5.\n";


while (true) {
    $entrada = readline("Digite um número: ");

   
    $numero = (int)$entrada;

  
    if ($numero === -5) {
        break;
    }

  
    $numeros[] = $numero;
}

if (count($numeros) > 0) {
    $maior = max($numeros);
    $menor = min($numeros);

    echo "O maior número digitado foi: $maior\n";
    echo "O menor número digitado foi: $menor\n";
} else {
    echo "Nenhum número válido foi digitado.\n";
}
?>
