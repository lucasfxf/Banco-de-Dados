create USER aluno identified by '1234';
create user dev@localhost identified by 'abcd';

-- dar permissão
GRANT SELECT ON empresa.clientes TO 'aluno';
-- 💡 Em alguns casos (principalmente MySQL), o ideal mesmo é:
GRANT SELECT ON empresa.clientes TO 'aluno'@'%'; -- pegadinha aqui igual do dev@localhost hein (especificar a origem)

-- dar total permissão
GRANT ALL ON empresa.* TO 'dev'@'localhost';

-- 💡 Entendimento importante
SELECT → só leitura
ALL → tudo (SELECT, INSERT, UPDATE, DELETE, etc)
🧠 Outro ponto importante
empresa.* = todas as tabelas do banco empresa
✔️ você acertou isso

-- retirar permissões 
REVOKE DELETE ON empresa.* FROM 'dev'@'localhost';

🧠 Regra de ouro (cai MUITO em prova)
Comando	Palavra
GRANT	TO
REVOKE	FROM

-- 📘 Como ver permissões de um usuário

Você usa:

SHOW GRANTS FOR 'dev'@'localhost';
🧠 O que isso faz?

👉 Mostra tudo que o usuário pode fazer:

Exemplo de saída:

GRANT SELECT, INSERT ON empresa.* TO 'dev'@'localhost';
⚠️ Pegadinha

De novo aparece:
👉 'usuario'@'host'

Se esquecer isso → pode dar erro ou não mostrar nada
😄

-- 📘 Como remover um usuário

Você usa:

DROP USER 'dev'@'localhost';
🧠 Explicação
DROP USER = apaga o usuário do sistema
'dev'@'localhost' = precisa indicar exatamente qual usuário
⚠️ Pegadinha de prova

Se você fizer só:

DROP USER dev;

👉 pode dar erro ou não remover, porque faltou o '@localhost'