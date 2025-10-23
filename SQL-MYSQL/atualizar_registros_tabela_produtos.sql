-- Para atualizar produtos
UPDATE produtos
SET descricao = 'Açúcar branco refinado.',
    preco = 10.30,
    peso = 1.6,
    quantidade = 130,
    fornecedor = 'Doces Epsilon',
    atualizado_em = CURDATE()
WHERE id = 5;

UPDATE produtos
SET descricao = 'Sabonete hidratante suave.',
    preco = 5.40,
    peso = 0.5,
    quantidade = 200,
    fornecedor = 'Beleza Zeta',
    atualizado_em = CURDATE()
WHERE id = 6;

UPDATE produtos
SET descricao = 'Shampoo de controle de oleosidade.',
    preco = 30.99,
    peso = 1.5,
    quantidade = 60,
    fornecedor = 'Cosméticos Eta',
    atualizado_em = CURDATE()
WHERE id = 7;
