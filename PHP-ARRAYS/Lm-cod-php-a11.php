<?php

$Estoque = [
[
'Codigo' => 1,
'Nome' => 'Blusa',
'Tamanho' => 'P',
'Cor' => 'Branco',
'Quantidade' => 10,
],
[
'Codigo' => 2,
'Nome' => 'Camisa social',
'Tamanho' => 'M',
'Cor' => 'Preto',
'Quantidade' => 7,
],
[
'Codigo' => 3,
'Nome' => 'Blusa regata',
'Tamanho' => 'G',
'Cor' => 'Bege',
'Quantidade' => 11,
],
[
'Codigo' => 4,
'Nome' => 'Bermuda',
'Tamanho' => '42',
'Cor' => 'Azul',
'Quantidade' => 5,
],
[
'Codigo' => 5,
'Nome' => 'Calça jeans',
'Tamanho' => '40',
'Cor' => 'Verde',
'Quantidade' => 15,
],
];

function exibirMenu() {
echo "Menu: \n";
echo "1. Adicionar produto\n";
echo "2. Vender produto\n";
echo "3. Verificar estoque\n";
echo "4. Listar estoque\n";
echo "5. Sair\n";
echo "Escolha uma opção: ";
return trim(fgets(STDIN));
}

var_dump ($Estoque);

echo "Escolha uma opçao: \n";

function adicionarProduto(&$estoque, $codigo, $nomeProduto, $tamanho, $cor, $quantidade) {

$novoProduto = [
'Codigo' => $codigo,
'Nome' => $nomeProduto,
'Tamanho' => $tamanho,
'Cor' => $cor,
'Quantidade' => $quantidade,
 ];

    $estoque[] = $novoProduto;

    echo "✅ Produto '{$nomeProduto}' adicionado com sucesso!\n";
}

function listarEstoque($estoque) {
foreach ($estoque as $produto) {
echo "Código: {$produto['Codigo']} | Nome: {$produto['Nome']} | Tamanho: {$produto['Tamanho']} | Cor: {$produto['Cor']} | Quantidade: {$produto['Quantidade']}\n";
    }
}

/* 🔽 NOVAS FUNÇÕES ABAIXO 🔽 */

// Função para vender um produto (diminuir quantidade)
function venderProduto(&$estoque, $codigo, $quantidadeVendida) {
    foreach ($estoque as $key => &$produto) {
        if ($produto['Codigo'] == $codigo) {
            if ($produto['Quantidade'] >= $quantidadeVendida) {
                $produto['Quantidade'] -= $quantidadeVendida;
                echo "🛍️ Venda realizada! {$quantidadeVendida} unidade(s) de {$produto['Nome']} vendida(s).\n";

                // Remove do array se quantidade zerar
                if ($produto['Quantidade'] == 0) {
                    unset($estoque[$key]);
                    echo "❌ Produto '{$produto['Nome']}' removido do estoque (quantidade zerada).\n";
                }
            } else {
                echo "⚠️ Estoque insuficiente! Apenas {$produto['Quantidade']} unidade(s) disponíveis.\n";
            }
            return;
        }
    }
    echo "🚫 Produto com código $codigo não encontrado.\n";
}

// Função para verificar disponibilidade de um produto
function verificarEstoque($estoque, $codigo) {
    foreach ($estoque as $produto) {
        if ($produto['Codigo'] == $codigo) {
            echo "🔎 Produto encontrado: {$produto['Nome']} | Quantidade: {$produto['Quantidade']}\n";
            return;
        }
    }
    echo "🚫 Produto com código $codigo não está no estoque.\n";
}

/* 🔽 LOOP PRINCIPAL ABAIXO 🔽 */

while (true) {
$opcao = exibirMenu();
switch ($opcao) {
    case 1:
 echo "Informe o código do produto: ";
$codigo = trim(fgets(STDIN));

 echo "Informe o nome do produto: ";
 $nome = trim(fgets(STDIN));

 echo "Informe o tamanho: ";
$tamanho = trim(fgets(STDIN));

echo "Informe a cor: ";
$cor = trim(fgets(STDIN));

echo "Informe a quantidade: ";
$quantidade = (int) trim(fgets(STDIN));

adicionarProduto($Estoque, $codigo, $nome, $tamanho, $cor, $quantidade);
break;

case 2:
 echo "Informe o código do produto que deseja vender: ";
$codigoVenda = trim(fgets(STDIN));
echo "Informe a quantidade a vender: ";
$qtdVenda = (int) trim(fgets(STDIN));
venderProduto($Estoque, $codigoVenda, $qtdVenda);
break;

case 3:
 echo "Informe o código do produto que deseja verificar: ";
$codigoVerificar = trim(fgets(STDIN));
verificarEstoque($Estoque, $codigoVerificar);
break;

case 4:
listarEstoque($Estoque);
break;

case 5:
echo "Saindo do sistema.\n";
exit;

default:
echo "Opção inválida!\n";
}
}
