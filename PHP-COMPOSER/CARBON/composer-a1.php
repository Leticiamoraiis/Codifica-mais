<?php
require __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

/**
 * Função de entrada segura: usa readline() se existir, senão usa fgets(STDIN).
 */
function input($prompt = '') {
    echo $prompt;
    if (function_exists('readline')) {
        $line = readline();
    } else {
        $line = fgets(STDIN);
    }
    return trim((string) $line);
}

/**
 * Mapa simples para traduzir dias da semana do inglês para português.
 */
$daysPt = [
    'Monday'    => 'Segunda-feira',
    'Tuesday'   => 'Terça-feira',
    'Wednesday' => 'Quarta-feira',
    'Thursday'  => 'Quinta-feira',
    'Friday'    => 'Sexta-feira',
    'Saturday'  => 'Sábado',
    'Sunday'    => 'Domingo',
];

echo "Formato esperado da data: DD-MM-YYYY (ex: 19-01-1996)\n";

$raw = input("Digite sua data de nascimento: ");

try {
    // cria objeto Carbon a partir do formato Y-m-d
    $birth = Carbon::createFromFormat('d-m-Y', $raw);

    // validar se parse corresponde exatamente (para evitar coisas como 2020-02-31)
    if ($birth === false || $birth->format('d-m-Y') !== $raw) {
        throw new Exception("Formato inválido ou data inexistente.");
    }
} catch (Exception $e) {
    echo "Data inválida. Certifique-se do formato DD-MM-YYYY e tente novamente.\n";
    exit(1);
}

$today = Carbon::today();

// 1) Quantos dias faltam para o próximo aniversário
$nextBirthday = $birth->copy()->year($today->year);

// se o aniversário deste ano já passou ou é hoje e queremos contar 0 quando for hoje:
if ($nextBirthday->lt($today)) {
    $nextBirthday->addYear();
}

$daysUntil = $today->diffInDays($nextBirthday);

// 2) Quantos anos de vida você tem
$ageYears = $birth->diffInYears($today);

// 3) Quantos dias de vida você tem
$daysLived = $birth->diffInDays($today);

// 4) Que dia da semana você nasceu
$dayEng = $birth->format('l'); // ex: Monday
$dayPt = $daysPt[$dayEng] ?? $dayEng;

// Exibindo os resultados
if ($daysUntil === 0) {
    echo "Feliz aniversário! Hoje é seu aniversário. 🎉\n";
} else {
    echo "Faltam $daysUntil dia(s) para o seu próximo aniversário ({$nextBirthday->format('d/m/Y')}).\n";
}

echo "Você tem $ageYears ano(s) de vida.\n";
echo "Você viveu aproximadamente $daysLived dia(s).\n";
echo "Você nasceu em: {$birth->format('d/m/Y')} — {$dayPt}.\n";

