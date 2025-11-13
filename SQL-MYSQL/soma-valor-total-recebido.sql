

SELECT SUM(valor_noite * noites) AS valor_total_recebido
FROM reservas
WHERE status_id IN (1,2,3);
