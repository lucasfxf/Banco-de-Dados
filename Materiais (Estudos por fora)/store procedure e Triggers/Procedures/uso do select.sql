-- ! numero 2 --
DELIMITER #
create procedure sp_listar_clientes()
BEGIN
	select * from cliente;
END#
DELIMITER ;

call sp_listar_clientes();