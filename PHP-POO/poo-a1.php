<?php

class ContaBancaria
{
    public int $numeroDaConta;
    public string $nomeDoTitular;
    public float $saldo = 0;

    public function __construct(int $numeroDaConta, string $nomeDoTitular, $saldo = 0)
    {
//        throw new \InvalidArgumentException("Objeto não inicializado.");

        $this->numeroDaConta = $numeroDaConta;
        $this->nomeDoTitular = $nomeDoTitular;
        $this->saldo = $saldo;

        if ($saldo < 0) {
            $this->saldo = 0;
        }
    }

    public static function criarConta($conta, $titular, $valor) {
        if($valor < 1500) {
            echo "Não foi possível criar conta\n";
            return null;
        }

        return new self($conta, $titular, $valor);
    }
    public function depositar(float $quantia)
    {
        if ($quantia <= 0) {
            echo "Digite uma quantia válida/positiva\n";
            return;
        }

        $this->saldo = $this->saldo + $quantia;
        $quantiaFormatada = number_format($quantia, 2, ',', '.');

        echo "Depósito de R$ {$quantiaFormatada} realizado com sucesso na conta {$this->numeroDaConta}\n";
        return;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getNumeroDaConta()
    {
        return $this->numeroDaConta;
    }

    public function sacar(float $quantia)
    {
        if ($quantia > $this->saldo) {
            echo "Saldo insuficiente para realizar o saque\n";
            return;
        }

        $this->saldo = $this->saldo - $quantia;
        $quantiaFormatada = number_format($quantia, 2, ',', '.');

        echo "Saque de R$ {$quantiaFormatada} realizado com sucesso na conta {$this->numeroDaConta}\n";
        return;
    }

    public function exibirSaldo()
    {
        $saldoFormatado = number_format($this->saldo, 2, ',', '.');
        echo "O saldo da conta {$this->numeroDaConta}, do titular {$this->nomeDoTitular} é: R$ {$saldoFormatado}\n";
        return;
    }
}

$conta = ContaBancaria::criarConta(1000019, 'Gabriel', 2000);
var_dump($conta);

$contaDoGabriel = new ContaBancaria(1000019, 'Gabriel', -10);
var_dump($contaDoGabriel);

// Instanciando conta
$contaDoGabriel->exibirSaldo();

// Deposito
$contaDoGabriel->depositar(50000);
$contaDoGabriel->exibirSaldo();

// Forçar um saque maior do que o saldo
$contaDoGabriel->sacar(1000000);

// Saque válido
$contaDoGabriel->sacar(50);
$contaDoGabriel->exibirSaldo();

// Quero comprar um avião
$aviaoCusta = 10000000;

// Posso comprar?
if ($contaDoGabriel->getSaldo() >= $aviaoCusta) {
    echo "Posso comprar!\n";
} else {
    echo "Não posso comprar!\n";
}

$arrayDeContas = [
    $contaDoGabriel->getNumeroDaconta() => $contaDoGabriel
];

$arrayDeContasDoIan[] = new ContaBancaria(1000020, 'Ian', 500000);


var_dump($arrayDeContas);