<?php

class Produto {

    public $nome;
    public $descricao;
    public $preco;
    public $quantidade;
    public $imagem;

    public function __construct($nome, $descricao, $preco, $quantidade, $imagem = null) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->imagem = $imagem;
    }

    public static function processarImagem($imagem) {

        if (!$imagem || empty($imagem['name'])) {
            return null;
        }

        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        $nomeImagem = uniqid() . '-' . basename($imagem['name']);

        move_uploaded_file(
            $imagem['tmp_name'],
            'uploads/' . $nomeImagem
        );

        return $nomeImagem;
    }
}

