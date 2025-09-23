<?php
echo "Qual o seu nome? ";
$nome = trim(fgets(STDIN)); // lê o nome digitado pelo usuário
echo "Olá, $nome!\n";