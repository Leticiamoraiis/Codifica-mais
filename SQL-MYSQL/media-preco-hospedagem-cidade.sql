USE hospeda_brasil;

SELECT h.cidade,
SUM(r.valor_noite * r.noites) / SUM(r.noites) AS media_valor_dia
FROM reservas r JOIN hospedagens h ON r.id_hospedagem = h.id_hospedagem
GROUP BY h.cidade;
