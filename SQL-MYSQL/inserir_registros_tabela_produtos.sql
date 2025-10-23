-- Inserindo 10 produtos aleatórios
INSERT INTO produtos (id, nome, descricao, categoria, preco, peso, quantidade, fornecedor, criado_em, atualizado_em, deletado_em) VALUES
(1, 'Café Torrado Premium', 'Café 100% arábica, sabor intenso e aroma marcante.', 'Alimentos', 10.50, 0.5, 100, 'Café Joana', CURDATE(), CURDATE(), NULL),
(2, 'Leite Integral 1L', 'Leite integral pasteurizado de alta qualidade.', 'Laticínios', 20.00, 1.0, 50, 'Laticínios Beta', CURDATE(), CURDATE(), NULL),
(3, 'Arroz Branco Tipo 1', 'Arroz longo fino, ideal para o dia a dia.', 'Alimentos', 15.75, 0.8, 200, 'Alimentos Gama', CURDATE(), CURDATE(), NULL),
(4, 'Detergente Limão 500ml', 'Detergente líquido com fragrância de limão.', 'Limpeza', 5.99, 0.2, 500, 'Higiene Delta', CURDATE(), CURDATE(), NULL),
(5, 'Açúcar Refinado 1kg', 'Açúcar branco refinado de alta pureza.', 'Alimentos', 12.30, 0.6, 150, 'Doces Epsilon', CURDATE(), CURDATE(), NULL),
(6, 'Sabonete Neutro 90g', 'Sabonete hidratante com fórmula suave.', 'Higiene', 7.45, 0.3, 300, 'Beleza Zeta', CURDATE(), CURDATE(), NULL),
(7, 'Shampoo Anticaspa 400ml', 'Shampoo com ação refrescante e controle de oleosidade.', 'Higiene', 25.99, 1.2, 80, 'Cosméticos Eta', CURDATE(), CURDATE(), NULL),
(8, 'Feijão Carioca 1kg', 'Feijão selecionado e empacotado a vácuo.', 'Alimentos', 18.50, 0.9, 60, 'Leguminosas Theta', CURDATE(), CURDATE(), NULL),
(9, 'Desinfetante Floral 2L', 'Desinfetante concentrado com fragrância floral.', 'Limpeza', 9.99, 0.4, 400, 'Produtos Iota', CURDATE(), CURDATE(), NULL),
(10, 'Macarrão Espaguete 500g', 'Massa tradicional italiana feita com trigo especial.', 'Massas', 30.00, 1.5, 70, 'Massas Kappa', CURDATE(), CURDATE(), NULL);

