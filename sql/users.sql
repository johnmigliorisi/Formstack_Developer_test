

CREATE DATABASE IF NOT EXISTS `formstack_exercise`;

USE `formstack_exercise`;

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int unsigned NOT NULL AUTO_INCREMENT,
`email` VARCHAR(255) NOT NULL,
`first_name` VARCHAR(255) NOT NULL,
`last_name` VARCHAR(255) NOT NULL,
`password` VARCHAR(255) NOT NULL,
PRIMARY KEY (`user_id`),
UNIQUE INDEX `email_unique_index` (`email`)
) ENGINE = InnoDB;