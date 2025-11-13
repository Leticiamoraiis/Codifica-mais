USE hospeda_brasil;

SELECT h.nome_completo AS nome_hospede, a.nome_completo AS nome_anfitriao, hd.titulo, r.deletado_em
FROM reservas AS r
JOIN hospedes AS h ON h.id_hospede = r.id_hospede
JOIN hospedagens AS hd ON hd.id_hospedagem = r.id_hospedagem
JOIN anfitrioes AS a ON a.id_anfitriao = hd.id_anfitriao
WHERE status_id = 4;

 
