SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `engine_car` (
  `id` int NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `tax` int NOT NULL,
  `discount` int NOT NULL,
  `serial` varchar(45) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
INSERT INTO `engine_car` (
    `id`,
    `manufacturer`,
    `model`,
    `engine`,
    `price`,
    `tax`,
    `discount`,
    `serial`
  )
VALUES (
    1,
    'Toyota',
    'Aygo X',
    '2.0',
    15405.8,
    12,
    18,
    '62f5640901f31'
  ),
  (
    2,
    'Toyota',
    'Yaris',
    '2.0',
    21460,
    12,
    2,
    '62f564099800f'
  ),
  (
    3,
    'Toyota',
    'Corolla Touring Sports',
    '2.0',
    30945,
    17,
    18,
    '62f5640a28194'
  ),
  (
    4,
    'Toyota',
    'Mirai',
    '2.0',
    49995,
    13,
    16,
    '62f5640a956d8'
  ),
  (
    5,
    'Toyota',
    'GR Supra',
    '2.0',
    49495,
    12,
    15,
    '62f564368e92c'
  ),
  (
    6,
    'Toyota',
    'Land Cruiser',
    '2.0',
    46235,
    16,
    13,
    '62f5643933080'
  );
ALTER TABLE `engine_car`
ADD PRIMARY KEY (`id`);
ALTER TABLE `engine_car`
MODIFY `id` int NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
COMMIT;