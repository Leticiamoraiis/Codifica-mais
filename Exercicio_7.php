<?php

$Numeroum = readline ("Digite um numero");
$Numerodois = readline ("Digite um numero");

if ($Numeroum > $Numerodois) {
    echo "O número $Numeroum é maior.\n";
}
 elseif ($Numerodois > $Numeroum) {
    echo "O número $Numerodois é maior.\n";
} 
else {
    echo "Os dois números são iguais.\n";
}