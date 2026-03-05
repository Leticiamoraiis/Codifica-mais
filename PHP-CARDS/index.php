<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cards</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Cadastro de Cards</h1>

    <!-- Formulário de cadastro -->
    <form id="cardForm">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" required>

        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" required>

        <button type="submit">Cadastrar Card</button>
    </form>

    <!-- Controles -->
    <div class="controls">
        <label for="filtro">Filtrar por título:</label>
        <input type="text" id="filtro" placeholder="Digite para filtrar...">

        <label for="ordenar">Ordenar:</label>
        <select id="ordenar">
            <option value="nenhum">Sem ordenação</option>
            <option value="az">Título A-Z</option>
            <option value="za">Título Z-A</option>
        </select>

        <button class="clear" id="limparTudo">Limpar Todos os Cards</button>
    </div>

    <!-- Lista de Cards -->
    <div class="cards" id="listaCards"></div>

    <script>
        // Array em memória (sem banco e sem persistência)
        let cards = [];

        const form = document.getElementById("cardForm");
        const lista = document.getElementById("listaCards");
        const filtroInput = document.getElementById("filtro");
        const ordenarSelect = document.getElementById("ordenar");
        const limparBtn = document.getElementById("limparTudo");

        // Cadastrar card
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const titulo = document.getElementById("titulo").value;
            const descricao = document.getElementById("descricao").value;

            const novoCard = {
                id: Date.now(),
                titulo: titulo,
                descricao: descricao
            };

            cards.push(novoCard);
            form.reset();
            renderizarCards();
        });

        // Renderizar lista usando map()
        function renderizarCards() {
            let listaFiltrada = [...cards];

            // Filtro
            const filtroTexto = filtroInput.value.toLowerCase();
            if (filtroTexto) {
                listaFiltrada = listaFiltrada.filter(card =>
                    card.titulo.toLowerCase().includes(filtroTexto)
                );
            }

            // Ordenação
            const ordem = ordenarSelect.value;
            if (ordem === "az") {
                listaFiltrada.sort((a, b) => a.titulo.localeCompare(b.titulo));
            } else if (ordem === "za") {
                listaFiltrada.sort((a, b) => b.titulo.localeCompare(a.titulo));
            }

            // map() para renderização
            lista.innerHTML = listaFiltrada
                .map(card => `
                    <div class="card">
                        <button class="remove" onclick="removerCard(${card.id})">X</button>
                        <h3>${card.titulo}</h3>
                        <p>${card.descricao}</p>
                    </div>
                `)
                .join("");
        }

        // Remover card individual
        function removerCard(id) {
            cards = cards.filter(card => card.id !== id);
            renderizarCards();
        }

        // Limpar todos os cards
        limparBtn.addEventListener("click", function () {
            cards = [];
            renderizarCards();
        });

        // Eventos de filtro e ordenação
        filtroInput.addEventListener("input", renderizarCards);
        ordenarSelect.addEventListener("change", renderizarCards);
    </script>

</body>
</html>