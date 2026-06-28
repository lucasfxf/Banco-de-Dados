/* Atividade 1
Hello World!
*/
DELIMITER //
CREATE PROCEDURE sp_hello()
BEGIN
	SELECT 'o famoso Hello World!' as mensagem;
END//
DELIMITER ;

call sp_hello();

/* Atividade 2
Criar uma procedure que apresente uma listagem 
das contas e os dados dos clientes destas contas.
*/

DELIMITER //
CREATE PROCEDURE sp_lista_contas_cliente ()
BEGIN
	SELECT 
		cliente.nome, 
		cliente.cpf, 
		cliente.telefone, 
		conta.idconta, 
		conta.tipo, 
		conta.saldo 
	FROM 
		cliente, 
		conta, 
		contavinculada
	WHERE contavinculada.conta_idconta = conta.idconta
	AND contavinculada.cliente_idcliente = cliente.idcliente;
END//
DELIMITER ;

call sp_lista_contas_cliente();

/* Atividade 3
Criar uma procedure para inserir os campos 
obrigatórios de um Cliente no Banco.
*/

DELIMITER //
CREATE PROCEDURE sp_inserir_cliente (
	IN p_nome VARCHAR(150),
    IN p_cpf VARCHAR(45),
    IN p_nascimento DATE)
BEGIN
	INSERT INTO cliente 
		(nome, cpf, dataNascimento) 
	VALUES 
		(p_nome, p_cpf, p_nascimento);
END//
DELIMITER ;

call sp_inserir_cliente('Fabio','123','1981-05-06');