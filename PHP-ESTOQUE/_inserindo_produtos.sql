CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    quantidade INT DEFAULT 0,
    preco DECIMAL(10,2) NOT NULL
);

INSERT INTO produtos (nome, descricao, quantidade, preco) VALUES
('Camisa do Bruxo 10', 'A melhor camisa que você pode ter', 15, 85.80),
('Bermuda do Bruxo', 'Para formar o par perfeito junto com a camisa', 18, 58.00),
('Meião do Bruxo', 'Combo perfeito', 18, 38.00);

UPDATE produtos SET imagem = 'camisa.jpg' WHERE id = 1;
UPDATE produtos SET imagem = 'bermuda.jpg' WHERE id = 2;
UPDATE produtos SET imagem = 'meiao.jpg' WHERE id = 4;

