/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  sankalp
 * Created: 20 Jul, 2017
 */
CREATE TABLE IF NOT EXISTS `employees`
(
    `id` INT NOT NULL auto_increment,
    `name` varchar(255) NOT NULL,
    `birthday` date NOT NULL,
    `code_ssn` varchar(11) NOT NULL,
    `is_current` boolean DEFAULT 1,
    `email` varchar(50) NOT NULL,
    `phone` INT(12),
    `address` text ,
    `is_admin` boolean DEFAULT '0',
    `created_by` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY fk_created_by(created_by) REFERENCES employees(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `language`(
    `code` char(2) NOT NULL,
    `name` varchar(20) NOT NULL,
    PRIMARY KEY ('code')
);

CREATE TABLE IF NOT EXISTS `employee_info`(
    `id` INT auto_increment, 
    `language_code` char(2) NOT NULL,
    `employee_id` INT NOT NULL,
    `field_id` INT NOT NULL,
    `field_data` text NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY fk_employee_info(employee_id) REFERENCES `employees` (id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY fk_language_info(language_code) REFERENCES `language` (code) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `details_to_fetch`(
    `id` INT auto_increment, 
    `field_name` VARCHAR(255) NOT NULL,
    `active` BOOLEAN DEFAULT 0,
    FOREIGN KEY fk_fileds_info(id) REFERENCES `employee_info` (field_id) ON UPDATE CASCADE ON DELETE CASCADE
);
