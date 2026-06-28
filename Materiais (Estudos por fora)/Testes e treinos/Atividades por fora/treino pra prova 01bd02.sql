-- =========================
-- GERENCIAMENTO DE USUÁRIOS
-- =========================

-- criar usuário
CREATE USER IF NOT EXISTS 'analista'@'localhost' IDENTIFIED BY '1234';

-- dar permissão de leitura na VIEW (recomendado)
GRANT SELECT ON banco_teste.vw_resumo_clientes TO 'analista'@'localhost';

-- dar permissão de leitura na tabela clientes
GRANT SELECT ON banco_teste.clientes TO 'analista'@'localhost';

-- (opcional) permitir ver contas também
GRANT SELECT ON banco_teste.contas TO 'analista'@'localhost';

-- revogar acesso da tabela clientes
REVOKE SELECT ON banco_teste.clientes FROM 'analista'@'localhost';