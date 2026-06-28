create database Fazenda;
use Fazenda;

CREATE TABLE Proprietario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    idade INT,
    contato VARCHAR(100)
);

CREATE TABLE Fazenda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    tamanho DECIMAL(10,2),
    localizacao VARCHAR(150),
    id_proprietario INT,
    FOREIGN KEY (id_proprietario) REFERENCES Proprietario(id)
);

CREATE TABLE Talhao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tamanho DECIMAL(10,2),
    tipo_solo VARCHAR(100),
    id_fazenda INT,
    FOREIGN KEY (id_fazenda) REFERENCES Fazenda(id)
);

CREATE TABLE Cultura (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100)
);

CREATE TABLE Cultivo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_plantio DATE,
    data_colheita DATE,
    id_talhao INT,
    id_cultura INT,
    FOREIGN KEY (id_talhao) REFERENCES Talhao(id),
    FOREIGN KEY (id_cultura) REFERENCES Cultura(id)
);

CREATE TABLE Insumo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    tipo VARCHAR(50),
    custo_unitario DECIMAL(10,2)
);

CREATE TABLE UsoInsumo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quantidade DECIMAL(10,2),
    custo DECIMAL(10,2),
    id_cultivo INT,
    id_insumo INT,
    FOREIGN KEY (id_cultivo) REFERENCES Cultivo(id),
    FOREIGN KEY (id_insumo) REFERENCES Insumo(id)
);

CREATE TABLE Funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    idade INT,
    salario DECIMAL(10,2),
    funcao VARCHAR(50)
);

CREATE TABLE Maquina (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(100),
    estado VARCHAR(50),
    horas_uso INT
);

CREATE TABLE Atividade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(100),
    data DATE,
    id_funcionario INT,
    id_maquina INT,
    id_talhao INT,
    FOREIGN KEY (id_funcionario) REFERENCES Funcionario(id),
    FOREIGN KEY (id_maquina) REFERENCES Maquina(id),
    FOREIGN KEY (id_talhao) REFERENCES Talhao(id)
);

INSERT INTO Proprietario (nome, idade, contato)
VALUES ('Lucas Felipe', 20, '35 999096535');

INSERT INTO Fazenda (nome, tamanho, localizacao, id_proprietario)
VALUES ('Fazenda de Serra Talhada', 500.50, 'Interior MG', 1),
('Fazenda Rancho Feliz', 200.0, 'Rio Grande do Sul', 1);

INSERT INTO Talhao (tamanho, tipo_solo, id_fazenda) VALUES
(50.0, 'Argiloso', 1),
(100.5, 'Arenoso', 1),
(80.0, 'Misto', 2);

INSERT INTO Cultura (nome) VALUES
('Soja'),
('Milho'),
('Café');

INSERT INTO Cultivo (data_plantio, data_colheita, id_talhao, id_cultura) VALUES
('2026-01-19', '2025-05-29', 1, 1),
('2026-02-24', '2025-06-11', 2, 2),
('2026-05-02', '2025-09-14', 3, 3);

INSERT INTO Insumo (nome, tipo, custo_unitario) VALUES
('Adubo NPK', 'Fertilizante', 120.50),
('Semente Soja Premium', 'Semente', 200.00),
('Herbicida X', 'Defensivo', 75.30);

INSERT INTO UsoInsumo (quantidade, custo, id_cultivo, id_insumo) VALUES
(10, 1205.00, 1, 1),
(5, 1000.00, 1, 2),
(8, 602.40, 2, 3);

INSERT INTO Funcionario (nome, idade, salario, funcao) VALUES
('João Gabriel', 14, 2500.00, 'Operador'),
('Wagner Santos', 38, 3000.00, 'Agrônoma');

INSERT INTO Maquina (tipo, estado, horas_uso) VALUES
('Trator', 'Ativo', 1200),
('Colheitadeira', 'Manutenção', 800);

INSERT INTO Atividade (tipo, data, id_funcionario, id_maquina, id_talhao) VALUES
('Plantio', '2026-01-10', 1, 1, 1),
('Colheita', '2026-05-20', 2, 2, 1),
('Pulverização', '2026-02-20', 1, 1, 2);

-- Adicionar novos funcionarios(campos)
ALTER TABLE Funcionario
ADD telefone VARCHAR(20),
ADD data_admissao DATE;

-- nova tabela 
CREATE TABLE Venda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(100),
    quantidade DECIMAL(10,2),
    valor_total DECIMAL(10,2),
    data_venda DATE,
    id_cultivo INT,
    FOREIGN KEY (id_cultivo) REFERENCES Cultivo(id)
);

-- Alter e Delete
update Funcionario
set salario = 3500
where id = 1;

-- 1. ver cultivos ligados ao talhão
SELECT * FROM Cultivo
WHERE id_talhao = 2;

-- 2. apagar uso de insumos desses cultivos
DELETE FROM UsoInsumo
WHERE id_cultivo IN (
    SELECT id FROM Cultivo WHERE id_talhao = 2
);

-- 3. apagar cultivos
DELETE FROM Cultivo
WHERE id_talhao = 2;

-- 4. apagar atividades
DELETE FROM Atividade
WHERE id_talhao = 2;

-- 5. agora apagar o talhão
DELETE FROM Talhao
WHERE id = 2;

-- Views 
-- View que exibe os cultivos com suas respectivas culturas,
-- permitindo identificar o que foi plantado em cada período.
CREATE VIEW vw_cultivo_com_cultura AS
SELECT 
    co.id AS cultivo,
    ca.nome AS cultura,
    co.data_plantio,
    co.data_colheita
FROM Cultivo co
JOIN Cultura ca ON co.id_cultura = ca.id;


-- View que calcula o custo total de insumos por cultivo,
-- auxiliando na análise financeira da produção agrícola.
CREATE VIEW vw_custo_por_cultivo AS
SELECT 
    co.id AS cultivo,
    ca.nome AS cultura,
    SUM(ui.custo) AS custo_total
FROM Cultivo co
JOIN Cultura ca ON co.id_cultura = ca.id
JOIN UsoInsumo ui ON co.id = ui.id_cultivo
GROUP BY co.id, ca.nome;


-- View que apresenta detalhes das atividades realizadas,
-- incluindo o funcionário responsável e a máquina utilizada.
CREATE VIEW vw_atividade_detalhada AS
SELECT 
    a.id AS atividade,
    f.nome AS funcionario,
    m.tipo AS maquina,
    a.data
FROM Atividade a
JOIN Funcionario f ON a.id_funcionario = f.id
JOIN Maquina m ON a.id_maquina = m.id;


-- View que mostra as atividades realizadas por funcionário em cada talhão,
-- incluindo a fazenda onde a atividade ocorreu.
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


-- View que exibe as atividades realizadas por máquina,
-- permitindo o acompanhamento do uso dos equipamentos.
CREATE VIEW vw_atvd_das_maquinas AS
SELECT 
    m.tipo AS maquina,
    a.tipo AS atividade,
    a.data AS data_atividade
FROM Atividade a 
JOIN Maquina m ON a.id_maquina = m.id;

-- =========================================
-- VIEWS
-- =========================================

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

