CREATE DATABASE gestao_produtos;

#Tudo que for executado dentro de USE irá salvar no banco de gestão produtos.
USE gestao_produtos;

#Comando para criar tabela'Produtos".
CREATE TABLE produtos ( 
 id INT PRIMARY KEY,
 nome VARCHAR(100) NOT NULL UNIQUE,
 descricao VARCHAR(250),
 categoria VARCHAR(100),
 preco FLOAT,
 peso FLOAT,
 quantidade INT,
 fornecedor VARCHAR(100),
 criado_em DATE,
 atualizado_em DATE,
 deletado_em DATE
 );
 
 CREATE TABLE fornecedores (
 id INT PRIMARY KEY,
 razao_social VARCHAR(200),
 cnpj VARCHAR(14),
 criado_em DATE,
 atualizado_em DATE,
 deletado_em DATE
 );
 DROP TABLE fornecedores;