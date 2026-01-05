SELECT * FROM produtos
LEFT JOIN fornecedores
ON produtos.fornecedor = fornecedores.razao_social;