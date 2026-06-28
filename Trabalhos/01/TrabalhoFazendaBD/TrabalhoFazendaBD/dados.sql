USE Fazenda;

INSERT INTO Proprietario (nome, idade, contato)
VALUES ('Lucas Felipe', 20, '35 999096535');

INSERT INTO Fazenda (nome, tamanho, localizacao, id_proprietario)
VALUES ('Fazenda Serra Talhada', 500.50, 'MG', 1),
('Fazenda Rancho Feliz', 200.0, 'RS', 1);

INSERT INTO Talhao (tamanho, tipo_solo, id_fazenda) VALUES
(50.0, 'Argiloso', 1),
(100.5, 'Arenoso', 1),
(80.0, 'Misto', 2);

INSERT INTO Cultura (nome) VALUES ('Soja'), ('Milho'), ('Café');

INSERT INTO Cultivo (data_plantio, data_colheita, id_talhao, id_cultura) VALUES
('2026-01-19', '2025-05-29', 1, 1),
('2026-02-24', '2025-06-11', 2, 2),
('2026-05-02', '2025-09-14', 3, 3);

INSERT INTO Insumo (nome, tipo, custo_unitario) VALUES
('Adubo', 'Fertilizante', 120.50),
('Semente', 'Semente', 200.00),
('Herbicida', 'Defensivo', 75.30);

INSERT INTO UsoInsumo (quantidade, custo, id_cultivo, id_insumo) VALUES
(10, 1205.00, 1, 1),
(5, 1000.00, 1, 2),
(8, 602.40, 2, 3);

INSERT INTO Funcionario (nome, idade, salario, funcao) VALUES
('João Gabriel', 20, 2500.00, 'Operador'),
('Wagner Santos', 38, 3000.00, 'Agrônomo');

INSERT INTO Maquina (tipo, estado, horas_uso) VALUES
('Trator', 'Ativo', 1200),
('Colheitadeira', 'Manutenção', 800);

INSERT INTO Atividade (tipo, data, id_funcionario, id_maquina, id_talhao) VALUES
('Plantio', '2026-01-10', 1, 1, 1),
('Colheita', '2026-05-20', 2, 2, 1),
('Pulverização', '2026-02-20', 1, 1, 2);