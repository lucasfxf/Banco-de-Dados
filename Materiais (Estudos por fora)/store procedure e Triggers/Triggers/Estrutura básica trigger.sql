🔵 Estrutura básica de uma Trigger
DELIMITER //

CREATE TRIGGER nome_da_trigger
BEFORE|AFTER INSERT|UPDATE|DELETE
ON nome_da_tabela
FOR EACH ROW
BEGIN

    -- comandos SQL

END//

DELIMITER ;
Exemplo
DELIMITER //

CREATE TRIGGER tr_maiusculo
BEFORE INSERT
ON cliente
FOR EACH ROW
BEGIN

    SET NEW.nome = UPPER(NEW.nome);

END//

DELIMITER ;