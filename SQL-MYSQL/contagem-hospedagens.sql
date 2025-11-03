SELECT a.nome_completo, COUNT(h.id_hospedagem) AS total_hospedagens
FROM anfitrioes AS a
JOIN hospedagens AS h ON a.id_anfitriao = h.id_anfitriao
GROUP BY a.nome_completo;
