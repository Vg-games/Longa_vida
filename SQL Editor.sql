CREATE DATABASE Longa_vG_vida;

USE Longa_vG_vida;

CREATE TABLE Planos (
   Numero CHAR(2),
   Descricao CHAR(30),
   Valor DECIMAL(10, 2)
);

CREATE TABLE Associados (
   Plano CHAR(2),
   Nome CHAR(40),
   Endereco CHAR(35),
   Cidade CHAR(20),
   Estado CHAR(2),
   Cep CHAR(9)
);

INSERT INTO Planos (Numero, Descricao, Valor) 
VALUES 
    ('B1', 'Basico 1', 200.00),
    ('B2', 'Basico 2', 150.00),
    ('B3', 'Basico 3', 100.00),
    ('E1', 'Executivo 1', 350.00),
    ('E2', 'Executivo 2', 300.00),
    ('E3', 'Executivo 3', 250.00),
    ('M1', 'Master 1', 500.00),
    ('M2', 'Master 2', 450.00),
    ('M3', 'Master 3', 400.00);

INSERT INTO Associados (Nome, Endereco, Cidade, Estado, Cep, Plano) VALUES
('Vitor Gabriel', 'R. FELIPE DO AMARAL, 3450', 'COTIA', 'SP', '06700-011', 'M2'),
('MARIA', 'R. FELIPE DE JESUS, 1245', 'DIADEMA', 'SP', '09960-170', 'B1'),
('PEDRO', 'R. AGRIPINO DIAS, 155', 'COTIA', 'SP', NULL, 'B2'),
('Carmona', 'R. PE EZEQUIEL, 567', 'DIADEMA', 'SP', '09960-175', 'B2'),
('Ailto', 'R. INDIO TABAJARA, 55', 'GUARULHOS', 'SP', '07132-999', 'B3');

SELECT 
    A.Nome,
    A.Endereco,
    A.Cidade,
    A.Estado,
    A.Cep,
    P.Descricao AS Plano_Descricao,
    P.Valor AS Plano_Valor
FROM 
    Associados A
JOIN 
    Planos P ON A.Plano = P.Numero;