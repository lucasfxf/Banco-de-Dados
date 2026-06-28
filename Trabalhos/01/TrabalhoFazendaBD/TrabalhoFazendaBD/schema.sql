CREATE DATABASE IF NOT exists Fazenda;
USE Fazenda;

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

-- ALTER exigido
ALTER TABLE Funcionario
ADD telefone VARCHAR(20),
ADD data_admissao DATE;

-- Nova tabela exigida
CREATE TABLE Venda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(100),
    quantidade DECIMAL(10,2),
    valor_total DECIMAL(10,2),
    data_venda DATE,
    id_cultivo INT,
    FOREIGN KEY (id_cultivo) REFERENCES Cultivo(id)
);