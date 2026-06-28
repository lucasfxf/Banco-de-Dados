CREATE DATABASE IF NOT exists TREINO;
USE TREINO;

DELIMITER #
CREATE PROCEDURE SP_MENSAGEM()
	BEGIN 
		SELECT 'BEM-VINDO AO BANCO DE DADOS!';
    END #
    DELIMITER ;
    
    CALL SP_MENSAGEM();
    
    -- ---------------------------------------------------------------
    
    -- EX 02
    
DELIMITER #

CREATE PROCEDURE sp_boas_vindas(
    IN p_nome VARCHAR(50)
)
BEGIN

    SELECT CONCAT(
        'OLÁ ',
        p_nome,
        ', SEJA BEM-VINDO!'
    );

END#

DELIMITER ;

	-- EX 03
    CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50)
);

DELIMITER #
CREATE PROCEDURE sp_inserir_cliente(
    IN nome VARCHAR(50)
)
BEGIN

    INSERT INTO cliente(nome)
    VALUES (nome);

END#
DELIMITER ;
    
CALL sp_inserir_cliente('Maria');

-- ----------------------------------------------------------------

-- EX 04

DELIMITER #

CREATE PROCEDURE sp_total_clientes(
    OUT total INT
)
BEGIN

    SELECT COUNT(*)
    INTO total
    FROM cliente;

END#

DELIMITER ;









