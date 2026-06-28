🔵 Estrutura básica de uma Stored Procedure
DELIMITER //

CREATE PROCEDURE nome_da_procedure()
BEGIN

    -- comandos SQL

END//

DELIMITER ;
Exemplo
DELIMITER //

CREATE PROCEDURE sp_hello()
BEGIN
    SELECT 'Hello World!';
END//

DELIMITER ;

Executar:

CALL sp_hello();