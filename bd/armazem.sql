
--
-- Banco de dados: `armazem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `quantidade` int NOT NULL,
  `validade` date DEFAULT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`nome`, `categoria`, `quantidade`, `validade`) VALUES
('Arroz', 'pereciveis', 200, '2023-12-12'),
('Feijão', 'limpeza', 20, '2024-12-20'),
('Amaciante', 'limpeza', 20, '2024-12-20'),
('Sabão em barra', 'limpeza', 20, '2024-12-20'),
('Sabonete', 'limpeza', 140, '2029-12-10'),
('Pasta de dente', 'higiene', 200, '2024-04-10'),
('Açucar', 'pereciveis', 150, '2023-10-03'),
('Oléo', 'limpeza', 400, '2024-09-28'),
('Alface', 'hortifruti', 300, '2023-12-15'),
('Pimentão', 'hortifruti', 155, '2023-12-20'),
('Farinha de trigo', 'pereciveis', 1024, '2024-07-19'),
('Farofa', 'pereciveis', 200, '2024-12-19');
