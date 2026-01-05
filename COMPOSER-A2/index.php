<?php
require 'vendor/autoload.php';

use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Formatter\MessageFormatter;

// Criar formatador (obrigatório na versão 7)
$formatter = new MessageFormatter();

// Criar o tradutor com idioma padrão pt
$translator = new Translator('pt', $formatter);

// Adicionar loader tipo array
$translator->addLoader('array', new ArrayLoader());

// Adicionar arquivos de tradução
$translator->addResource('array', require __DIR__.'/translations/messages.pt.php', 'pt');
$translator->addResource('array', require __DIR__.'/translations/messages.en.php', 'en');
$translator->addResource('array', require __DIR__.'/translations/messages.es.php', 'es');
$translator->addResource('array', require __DIR__.'/translations/messages.fr.php', 'fr');


// Testar em todos os idiomas
$idiomas = ['pt', 'en', 'es', 'fr'];

foreach ($idiomas as $locale) {
    $translator->setLocale($locale);

    echo "Em $locale: " . $translator->trans('hello') . "<br>";
    echo "Em $locale: " . $translator->trans('welcome') . "<br>";
    echo "Em $locale: " . $translator->trans('bye') . "<br><br>";
}

