DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) NOT NULL DEFAULT '0',
  `password` varchar(191) NOT NULL DEFAULT '0',
  `email` varchar(512) NOT NULL DEFAULT '0',
  `activationKey` varchar(8) DEFAULT NULL,
  `userRights` enum('USER','ADMIN') DEFAULT 'USER',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
