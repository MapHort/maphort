-- MySQL Script generated by MySQL Workbench
-- 07/03/17 22:43:12
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema maphort
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema maphort
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `maphort` DEFAULT CHARACTER SET utf8 ;
USE `maphort` ;

-- -----------------------------------------------------
-- Table `maphort`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `maphort`.`USUARIO` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sexo` CHAR(1) NOT NULL,
  `rua` VARCHAR(100) NOT NULL,
  `bairro` VARCHAR(100) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `numero` INT NOT NULL,
  `telefone` VARCHAR(9) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `telefone_UNIQUE` (`telefone` ASC),
  UNIQUE INDEX `numero_UNIQUE` (`numero` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maphort`.`HORTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `maphort`.`HORTA` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `categoria` CHAR(1) NOT NULL DEFAULT 'X',
  `tamanho` CHAR(1) NOT NULL DEFAULT 'P',
  `telefone` VARCHAR(9) NOT NULL,
  `USUARIO_id` INT NOT NULL,
  PRIMARY KEY (`id`, `USUARIO_id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC),
  UNIQUE INDEX `telefone_UNIQUE` (`telefone` ASC),
  INDEX `fk_HORTA_USUARIO_idx` (`USUARIO_id` ASC),
  CONSTRAINT `fk_HORTA_USUARIO`
    FOREIGN KEY (`USUARIO_id`)
    REFERENCES `maphort`.`USUARIO` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `maphort`.`DISTANCIA_HORTAS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `maphort`.`DISTANCIA_HORTAS` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `distancia` FLOAT NOT NULL,
  `HORTA_id` INT NOT NULL,
  `HORTA_USUARIO_id` INT NOT NULL,
  `HORTA_id1` INT NOT NULL,
  `HORTA_USUARIO_id1` INT NOT NULL,
  PRIMARY KEY (`id`, `HORTA_id`, `HORTA_USUARIO_id`, `HORTA_id1`, `HORTA_USUARIO_id1`),
  INDEX `fk_DISTANCIA_HORTAS_HORTA1_idx` (`HORTA_id` ASC, `HORTA_USUARIO_id` ASC),
  INDEX `fk_DISTANCIA_HORTAS_HORTA2_idx` (`HORTA_id1` ASC, `HORTA_USUARIO_id1` ASC),
  CONSTRAINT `fk_DISTANCIA_HORTAS_HORTA1`
    FOREIGN KEY (`HORTA_id` , `HORTA_USUARIO_id`)
    REFERENCES `maphort`.`HORTA` (`id` , `USUARIO_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DISTANCIA_HORTAS_HORTA2`
    FOREIGN KEY (`HORTA_id1` , `HORTA_USUARIO_id1`)
    REFERENCES `maphort`.`HORTA` (`id` , `USUARIO_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;