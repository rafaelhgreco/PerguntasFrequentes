CREATE DATABASE IF NOT EXISTS FAQ;
USE FAQ;

CREATE TABLE tb_adm (
    adm_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    adm_nome VARCHAR(255) NOT NULL,
    adm_email VARCHAR(100) UNIQUE NOT NULL,
    usuario VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(50) NOT NULL
);

CREATE TABLE tb_perguntas (
    id_pergunta INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pergunta TEXT,
    resposta TEXT,
    nome_solicitante VARCHAR(255) NOT NULL,
    email_solicitante VARCHAR(100) NOT NULL,
    situacao ENUM('aluno','exaluno','visitante'),
    data_pergunta DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    data_resposta DATETIME,
    adm_id_resposta INT,
    CONSTRAINT fk_tb_adm_adm_id FOREIGN KEY (adm_id_resposta) REFERENCES tb_adm(adm_id),

    status_pergunta ENUM('NR','RES','EXC') DEFAULT 'NR',
    view INT
);

CREATE TABLE tb_perguntas_excluidas (
    id_pergunta_excluida INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    id_pergunta INT NOT NULL,
    pergunta TEXT,
    resposta TEXT,
    nome_solicitante VARCHAR(255) NOT NULL,
    email_solicitante VARCHAR(100) NOT NULL,
    situacao ENUM('aluno','exaluno','visitante'),
    data_pergunta DATETIME NOT NULL,
    data_resposta DATETIME,
    adm_id_resposta INT,
    adm_id_exclusao INT,
    data_exclusao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    status_pergunta ENUM('EXC') DEFAULT 'EXC'
);


CREATE TRIGGER update_resposta_tb_perguntas
BEFORE UPDATE ON tb_perguntas FOR EACH ROW
SET NEW.data_resposta = CURRENT_TIMESTAMP();


INSERT INTO tb_adm (adm_nome, adm_email, usuario, senha)
VALUES ('Renan', 'renan@example.com', 'renan', '1234'),('Rodrigo', 'rodrigo@example.com', 'rodrigo', '1234'),('Rafael', 'rafael@example.com', 'rafael', '1234'),('Victor', 'victor@example.com', 'victor', '1234');


-- Pergunta 1
INSERT INTO tb_perguntas (pergunta, nome_solicitante, email_solicitante, situacao, status_pergunta)
VALUES ('Como faço para realizar a matrícula no curso de DSM?', 'João Silva', 'joao.silva@example.com', 'aluno', 'NR');

-- Pergunta 2
INSERT INTO tb_perguntas (pergunta, nome_solicitante, email_solicitante, situacao, status_pergunta)
VALUES ('Poderiam fornecer a grade curricular do curso de GPI?', 'Maria Oliveira', 'maria.oliveira@example.com', 'visitante', 'NR');

-- Pergunta 3
INSERT INTO tb_perguntas (pergunta, nome_solicitante, email_solicitante, situacao, status_pergunta)
VALUES ('Quais são os requisitos para participar do vestibular de GE?', 'Carlos Santos', 'carlos.santos@example.com', 'visitante', 'NR');

-- Pergunta 4
INSERT INTO tb_perguntas (pergunta, nome_solicitante, email_solicitante, situacao, status_pergunta)
VALUES ('Gostaria de saber mais sobre o Projeto Integrador no curso de GTI.', 'Ana Pereira', 'ana.pereira@example.com', 'aluno', 'NR');

-- Pergunta 5
INSERT INTO tb_perguntas (pergunta, nome_solicitante, email_solicitante, situacao, status_pergunta)
VALUES ('Existem oportunidades de estágio para alunos do curso de DSM?', 'Lucas Oliveira', 'lucas.oliveira@example.com', 'exaluno', 'NR');

