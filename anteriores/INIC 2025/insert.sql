INSERT INTO cadastro_usuario (Nome, Email, Senha_hash) VALUES
('João Silva', 'joao@example.com', 'hash123'),
('Maria Oliveira', 'maria@example.com', 'hash456');

INSERT INTO plantas (nome_comum, nome_cientifico, tipo, clima, regiao_origem, luminosidade, frequencia_rega, umidade_min, umidade_max, descricao) VALUES
('Espada de São Jorge', 'Sansevieria trifasciata', 'erva', 'tropical', 'África', 'meia sombra', 'Semanal', 20.00, 60.00, 'Planta resistente e purificadora de ar.'),
('Manjericão', 'Ocimum basilicum', 'erva', 'tropical', 'Índia', 'sol pleno', 'Diária', 50.00, 80.00, 'Muito usada como tempero e medicinal.');

INSERT INTO usuarioXplanta (ID_usuario, ID_planta) VALUES
(1, 1),
(2, 2);

INSERT INTO planta_usuario (ID_usuarioplanta, apelido, localizacao) VALUES
(1, 'Espadinha', 'Sala'),
(2, 'Temperinho', 'Varanda');

INSERT INTO condicoes_planta (ID_planta, umidade_atual) VALUES
(1, 45.5),
(2, 70.0);

INSERT INTO analise_planta (ID_planta_usuario, status_saude, status_umidade) VALUES
(1, 'Boa', 'Regular'),
(2, 'Regular', 'Alto');

INSERT INTO recomendacoes (titulo, descricao) VALUES
('Ajustar rega', 'Reduzir a frequência de rega para evitar excesso.'),
('Mover para mais luz', 'A planta precisa de mais luminosidade para se desenvolver.'),
('Trocar substrato', 'Substrato atual está retendo muita umidade.');

INSERT INTO analiseXrecomendacao (ID_analise, ID_recomendacao) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3);

-- SELECTS PARA TESTE

-- 1. Listar todas as plantas cadastradas por cada usuário com apelido e localização
SELECT 
    cu.Nome AS Usuario,
    p.nome_comum AS Planta,
    pu.apelido,
    pu.localizacao
FROM planta_usuario pu
JOIN usuarioXplanta ux ON pu.ID_usuarioplanta = ux.ID
JOIN cadastro_usuario cu ON ux.ID_usuario = cu.ID_usuario
JOIN plantas p ON ux.ID_planta = p.ID_planta;

-- 2. Ver status e recomendações de uma análise
SELECT 
    cu.Nome AS Usuario,
    pu.apelido AS Planta,
    ap.data_analise,
    ap.status_saude,
    ap.status_umidade,
    r.titulo AS Recomendacao,
    r.descricao
FROM analise_planta ap
JOIN planta_usuario pu ON ap.ID_planta_usuario = pu.ID
JOIN usuarioXplanta ux ON pu.ID_usuarioplanta = ux.ID
JOIN cadastro_usuario cu ON ux.ID_usuario = cu.ID_usuario
JOIN analiseXrecomendacao axr ON ap.ID = axr.ID_analise
JOIN recomendacoes r ON axr.ID_recomendacao = r.ID;

-- 3. Histórico de umidade das plantas
SELECT 
    cu.Nome AS Usuario,
    pu.apelido AS Planta,
    cp.data_registro,
    cp.umidade_atual
FROM condicoes_planta cp
JOIN planta_usuario pu ON cp.ID_planta = pu.ID
JOIN usuarioXplanta ux ON pu.ID_usuarioplanta = ux.ID
JOIN cadastro_usuario cu ON ux.ID_usuario = cu.ID_usuario
ORDER BY cp.data_registro DESC;