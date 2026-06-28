🔵 Views — Parte 1 (Base)
📘 Ideia principal

View =
👉 uma “tabela virtual” baseada em um SELECT

🧠 Pensa assim

Você faz uma consulta grande:

SELECT name, cpf FROM clientes;

👉 em vez de escrever isso toda hora, você salva como uma view.

✅ Criando uma view
CREATE VIEW vw_clientes AS
SELECT name, cpf
FROM clientes;
🔎 Usando a view
SELECT * FROM vw_clientes;

👉 como se fosse uma tabela normal

⚠️ Importante (cai em prova)

👉 View NÃO armazena dados

ela só guarda o SELECT
os dados são buscados na hora
🎯 Vantagens
evita repetir código
simplifica consultas
ajuda na segurança
esconde complexidade

-- EXercicios 
🔵 Exercício 1 (básico)
👉 Crie uma view chamada:

vw_clientes
Que mostre:
nome (name)
cpf
Da tabela:
clientes

-- respostas 
CREATE VIEW vw_clientes AS
SELECT name, cpf
FROM clientes;


🔵 Exercício 2
Agora um pouco mais próximo da prova:
👉 Crie uma view chamada:
vw_clientes_ordenados
Que mostre:
name
cpf
👉 ordenados em ordem alfabética (crescente)

-- teste 
CREATE VIEW vw_clientes_ordenados as 
SELECT name, cpf
FROM clientes 
ORDER BY ASC;

-- CORREÇÃO
Boa! Tá quase lá — só caiu numa pegadinha clássica do ORDER BY 👀
❌ Seu SQL:
ORDER BY ASC;
👉 Problema:
faltou dizer QUAL coluna vai ordenar
✅ Forma correta:
CREATE VIEW vw_clientes_ordenados ASSELECT name, cpfFROM clientesORDER BY name ASC;

🧠 Regra importante
👉 ORDER BY sempre precisa de uma coluna:
ORDER BY coluna ASC | DESC

💡 Dica de prova
Se pedir:
ordem alfabética → usa name
crescente → ASC (padrão)
decrescente → DESC


🔵 Exercício 3
Agora um pouco mais “real”:

👉 Crie uma view chamada:
vw_contasclientes

Que mostre:
nome do cliente (name)
código da conta (account_id)
tipo da conta (type)
saldo (balance)

-- Teste 
CREATE VIEW vw_contasclientes AS 
SELECT name, account_id, type, balance
FROM clientes 

🧠 Por quê?

Porque os dados estão em tabelas diferentes:

clientes → name
contas (ou algo assim) → account_id, type, balance

👉 então não dá pra pegar tudo de uma tabela só

❌ Seu SQL (problema):
FROM clientes

👉 aqui você só acessa uma tabela
👉 mas precisa de várias

✅ Forma correta (estrutura):
CREATE VIEW vw_contasclientes AS
SELECT c.name, a.account_id, a.type, a.balance
FROM clientes c
JOIN contas a ON c.cliente_id = a.cliente_id;
🧠 Entendimento

👉 JOIN = juntar tabelas

clientes c
JOIN contas a ON c.cliente_id = a.cliente_id

👉 significa:
“ligar cliente com conta pelo ID”

💡 Dica de prova
Se o enunciado pede:
dados de mais de uma tabela
👉 quase sempre precisa de JOIN


🔵 Exercício 4 (último 🎯)
👉 Crie uma view chamada:
vw_contatosTelefonicos

Que mostre:

name
telefone
👉 apenas clientes que possuem telefone
👉 ordenado em ordem decrescente
💡 aqui tem um detalhe importante (filtro 👀)

-- teste (perfect)
CREATE VIEW vw_contatosTelefonicos AS 
SELECT name, telefone
FROM clientes 
WHERE telefone IS NOT NULL
ORDER BY telefone DESC;
