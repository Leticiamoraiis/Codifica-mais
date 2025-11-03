SELECT r.status_id, r.data_checkin
FROM reservas AS r
JOIN status_reservas AS s ON r.status_id = s.id_status
WHERE s.status_nome = 'Confirmada'
AND r.data_checkin > '2025-05-31'
AND r.deletado_em IS NULL;


