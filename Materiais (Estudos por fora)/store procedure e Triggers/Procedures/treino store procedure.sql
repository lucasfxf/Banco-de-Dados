CREATE DATABASE lojaDB;

USE lojaDB;

-- CLIENTES
CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    idade INT,
    cidade VARCHAR(100)
);

-- PRODUTOS
CREATE TABLE produto (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(100),
    preco DECIMAL(10,2),
    estoque INT
);

-- PEDIDOS
CREATE TABLE pedido (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    data_pedido DATE,

    FOREIGN KEY (id_cliente)
    REFERENCES cliente(id_cliente)
);

-- ITENS DO PEDIDO
CREATE TABLE item_pedido (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_produto INT,
    quantidade INT,

    FOREIGN KEY (id_pedido)
    REFERENCES pedido(id_pedido),

    FOREIGN KEY (id_produto)
    REFERENCES produto(id_produto)
);

-- CLIENTES
INSERT INTO cliente(nome, idade, cidade)
VALUES
('Lucas', 19, 'São Paulo'),
('Marcos', 25, 'Campinas'),
('Ana', 30, 'Rio de Janeiro'),
('Julia', 22, 'Belo Horizonte');

-- PRODUTOS
INSERT INTO produto(nome_produto, preco, estoque)
VALUES
('Mouse Gamer', 150.00, 10),
('Teclado Mecânico', 300.00, 5),
('Monitor 240hz', 1200.00, 3),
('Headset', 200.00, 8);

-- PEDIDOS
INSERT INTO pedido(id_cliente, data_pedido)
VALUES
(1, '2026-05-20'),
(2, '2026-05-21');

-- ITENS
INSERT INTO item_pedido(id_pedido, id_produto, quantidade)
VALUES
(1, 1, 2),
(1, 4, 1),
(2, 2, 1);

