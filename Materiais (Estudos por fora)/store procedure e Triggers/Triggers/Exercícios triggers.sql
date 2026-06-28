-- EX 01
USE TREINO;

DELIMITER #
CREATE TRIGGER tr_grande
BEFORE INSERT 
ON cliente 
FOR EACH ROW 
	BEGIN 
    SET NEW.nome = 
    END#
    DELIMITER ;
    
INSERT INTO cliente(nome)
VALUES ('joao');