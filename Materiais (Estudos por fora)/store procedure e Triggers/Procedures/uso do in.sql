-- use lojaDB;
-- drop procedure sp_listar_clientes;

DELIMITER #

CREATE PROCEDURE sp_buscar_cliente(
    IN p_id INT
)
BEGIN

    SELECT *
    FROM cliente
    WHERE id_cliente = p_id;

END#

DELIMITER ;
CALL sp_buscar_cliente(1);