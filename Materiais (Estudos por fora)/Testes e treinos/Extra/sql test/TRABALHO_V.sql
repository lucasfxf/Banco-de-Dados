create database Trabalho_V;
use Trabalho_V;
create table Categoria (
   id int auto_increment primary key,
   nome varchar(50) not null
);

create table Titulo (
   id int auto_increment primary key,
   nome varchar(100) not null,
   ano_lancamento year,
   categoria_id int,
   foreign key (categoria_id) references Categoria(id)
);

CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

insert into Categoria (nome) values ('Filmes'), ('Séries'), ('Documentários');
insert into Titulo (nome, ano_lancamento, categoria_id) values ('Matrix', 1999, 1), ('Stranger Things', 2016, 2), ('Planeta Terra', 2006, 3);

CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO Usuario (nome, email)
VALUES ('Ana Silva', 'ana@email.com'),
       ('Carlos Souza', 'carlos@email.com');
       
CREATE TABLE Assistidos (
    usuario_id INT,
    titulo_id INT,
    data_assistido DATE,
    PRIMARY KEY (usuario_id, titulo_id),
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id),
    FOREIGN KEY (titulo_id) REFERENCES Titulo(id)
);



