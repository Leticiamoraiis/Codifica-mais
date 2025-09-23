<?php

do {
    $a = (int) readline("Digite o número inteiro A: ");
    $b = (int) readline("Digite o número inteiro B: ");

    if ($a > $b) {
        echo "O número A deve ser menor ou igual a B. Por favor, tente novamente.\n";
    }

}
 while ($a > $b);

$soma = 0;

for ($i = $a; $i <= $b; $i++) {
    if ($i % 2 != 0) {
        $soma += $i;
    }
}

echo "A soma dos números ímpares no intervalo de $a até $b é: $soma\n";
?>
