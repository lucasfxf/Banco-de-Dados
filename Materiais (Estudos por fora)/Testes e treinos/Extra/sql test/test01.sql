
CREATE DATABASE TESTE;
USE TESTE;

CREATE TABLE Clientes (
    cliente_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100)
);

CREATE TABLE Pedidos (
    pedido_id INT AUTO_INCREMENT PRIMARY KEY,
    data_pedido DATE NOT NULL,
    cliente_id INT,
    FOREIGN KEY (cliente_id) REFERENCES Clientes(cliente_id)
);
pedidos
