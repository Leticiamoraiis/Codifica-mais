# Sistema de Gestão de Estoque (PHP + MySQL)

Este projeto foi desenvolvido em PHP com MySQL utilizando PDO para conexão com o banco de dados. Todo o desenvolvimento foi feito dentro do XAMPP, no meu computador, na pasta padrão de projetos (C:\xampp\htdocs), garantindo que o ambiente XAMPP, com Apache e MySQL, funcione corretamente. Outros usuários podem salvar o projeto em outra pasta de sua preferência, mas devem ajustar o caminho do PHP e a URL de acesso conforme a localização escolhida.

Para rodar o projeto, primeiro é necessário criar o banco de dados chamado "gestao_estoque" e executar os scripts SQL fornecidos para criar as tabelas e inserir os dados iniciais. A configuração de conexão está no arquivo "database.php", onde o usuário deve ajustar apenas a senha do MySQL na variável "$pass".

O projeto pode ser executado de duas formas: com XAMPP, abrindo o painel, iniciando Apache e MySQL e acessando no navegador a URL correspondente à pasta do projeto;

ou sem XAMPP, utilizando o terminal do VS Code ou outro terminal, indo na pasta do projeto e executando o comando "C:\xampp\php\php.exe -S localhost:8000" (ou, de forma genérica, "php -S localhost:8000"), após o qual basta abrir "http://localhost:8000/" no navegador. Para funcionar corretamente, o PHP deve ter habilitadas as extensões "pdo" e "pdo_mysql", o que normalmente é feito ao habilitar o XAMPP ou manualmente no arquivo "php.ini".
