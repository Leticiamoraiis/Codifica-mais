<?php
// Carrega o autoload do Composer
require 'vendor/autoload.php';

// Importa a classe Carbon
use Carbon\Carbon;

// Configura o Locale para português do Brasil (pt_BR)
setlocale(LC_TIME, 'pt_BR.UTF-8');
Carbon::setLocale('pt_BR');

// Interage com o usuário e captura a data de nascimento
echo "Qual a sua data de nascimento? (formato: dd/mm/aaaa)\n";
$dataNascimento = readline();

// Converte a data informada para o formato Carbon
$dataNascimento = Carbon::createFromFormat('d/m/Y', $dataNascimento);

// Exibe a data formatada
echo "Você nasceu em: " . $dataNascimento->toFormattedDateString() . "\n";

// Exibe a quantidade de anos de vida
echo "Você tem " . $dataNascimento->age . " anos de vida.\n";

// Exibe os dias de vida
echo "Você tem " . $dataNascimento->diffInDays(Carbon::now()) . " dias de vida.\n";

// Exibe o dia da semana em português
$diaDaSemana = $dataNascimento->translatedFormat('l'); // Traduz para o locale configurado (pt_BR)
echo "Você nasceu em uma $diaDaSemana.\n";

// Exibe a data do próximo anivers
