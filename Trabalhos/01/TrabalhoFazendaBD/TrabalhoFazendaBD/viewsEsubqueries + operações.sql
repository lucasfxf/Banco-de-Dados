
-- VIEWS
-- View que exibe os cultivos com suas respectivas culturas
CREATE VIEW vw_cultivo_com_cultura AS
SELECT 
    co.id AS cultivo,
    ca.nome AS cultura,
    co.data_plantio,
    co.data_colheita
FROM Cultivo co
JOIN Cultura ca ON co.id_cultura = ca.id;


-- View que calcula o custo total de insumos por cultivo
CREATE VIEW vw_custo_por_cultivo AS
SELECT 
    co.id AS cultivo,
    ca.nome AS cultura,
    SUM(ui.custo) AS custo_total
FROM Cultivo co
JOIN Cultura ca ON co.id_cultura = ca.id
JOIN UsoInsumo ui ON co.id = ui.id_cultivo
GROUP BY co.id, ca.nome;


-- View com detalhes das atividades (funcionário + máquina)
CREATE VIEW vw_atividade_detalhada AS
SELECT 
    a.id AS atividade,
    f.nome AS funcionario,
    m.tipo AS maquina,
    a.data
FROM Atividade a
JOIN Funcionario f ON a.id_funcionario = f.id
JOIN Maquina m ON a.id_maquina = m.id;


-- View que mostra atividades por funcionário, talhão e fazenda
CREATE VIEW vw_atvd_funcionario_talhao AS
SELECT 
    a.id AS atividade,
    a.tipo AS tipo_atividade,
    f.nome AS funcionario,
    t.id AS talhao,
    fz.nome AS fazenda
FROM Atividade a
JOIN Funcionario f ON a.id_funcionario = f.id
JOIN Talhao t ON a.id_talhao = t.id
JOIN Fazenda fz ON t.id_fazenda = fz.id;


-- View que mostra atividades realizadas por máquina
CREATE VIEW vw_atvd_das_maquinas AS
SELECT 
    m.tipo AS maquina,
    a.tipo AS atividade,
    a.data AS data_atividade
FROM Atividade a 
JOIN Maquina m ON a.id_maquina = m.id;


-- SUBQUERIES
-- 1. Cultivos com custo acima da média
SELECT 
    co.id AS cultivo,
    ui.custo
FROM Cultivo co
JOIN UsoInsumo ui ON co.id = ui.id_cultivo
WHERE ui.custo > (
    SELECT AVG(custo) FROM UsoInsumo
);


-- 2. Funcionários com salário acima da média
SELECT f.nome, f.salario
FROM Funcionario f
WHERE f.salario > (
    SELECT AVG(salario) FROM Funcionario
);


-- 3. Cultivos que possuem insumos
SELECT *
FROM Cultivo
WHERE id IN (
    SELECT id_cultivo FROM UsoInsumo
);


-- 4. Cultivos que NÃO possuem insumos
SELECT *
FROM Cultivo
WHERE id NOT IN (
    SELECT id_cultivo FROM UsoInsumo
);


-- 5. Funcionários que participaram de atividades
SELECT *
FROM Funcionario
WHERE id IN (
    SELECT id_funcionario FROM Atividade
);


-- 6. Máquinas utilizadas em atividades
SELECT *
FROM Maquina
WHERE id IN (
    SELECT id_maquina FROM Atividade
);


-- 7. Talhões que possuem cultivos
SELECT *
FROM Talhao
WHERE id IN (
    SELECT id_talhao FROM Cultivo
);

USE Fazenda;

UPDATE Funcionario
SET salario = 3500
WHERE id = 1;

DELETE FROM UsoInsumo
WHERE id_cultivo IN (
    SELECT id FROM Cultivo WHERE id_talhao = 2
);

DELETE FROM Cultivo WHERE id_talhao = 2;
DELETE FROM Atividade WHERE id_talhao = 2;
DELETE FROM Talhao WHERE id = 2;