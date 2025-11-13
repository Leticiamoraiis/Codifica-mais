SELECT h.nome_completo AS nome_hospede, hd.titulo AS titulo_hospedagem,s.status_nome AS status_reserva
FROM reservas AS r
JOIN hospedes AS h ON r.id_hospede = h.id_hospede
JOIN hospedagens AS hd ON r.id_hospedagem = hd.id_hospedagem
JOIN status_reservas AS s ON s.id_status = s.id_status
ORDER BY nome_hospede,titulo_hospedagem;
