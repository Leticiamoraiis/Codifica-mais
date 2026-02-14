CREATE TABLE exclusao_produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    data_exclusao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);


USE gestao_estoque;



-- TESTE ADICIONANDO PRODUTO;
INSERT INTO produtos (nome, descricao, quantidade, preco) VALUES
('Camisa do Bruxo 10', 'A melhor camisa que você pode ter', 15, 85.80);
