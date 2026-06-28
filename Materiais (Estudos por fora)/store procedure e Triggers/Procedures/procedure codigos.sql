use lojaDB;

DELIMITER #
create procedure sp_hello()
BEGIN 
	SELECT 'OLA BANCO DE DADOS 2';
END#
DELIMITER ;

CALL sp_hello();

