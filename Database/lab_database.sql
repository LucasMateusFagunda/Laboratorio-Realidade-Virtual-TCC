-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema laboratorio
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema laboratorio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `laboratorio` DEFAULT CHARACTER SET utf8 ;
USE `laboratorio` ;

-- -----------------------------------------------------
-- Table `laboratorio`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laboratorio`.`turma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `turma` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `laboratorio`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laboratorio`.`login` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acesso` INT NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `matricula` VARCHAR(45) NOT NULL,
  `turma_idturma` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_login_turma1_idx` (`turma_idturma` ASC) VISIBLE,
  CONSTRAINT `fk_login_turma1`
    FOREIGN KEY (`turma_idturma`)
    REFERENCES `laboratorio`.`turma` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `laboratorio`.`notas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laboratorio`.`notas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login_idlogin` INT NOT NULL,
  `nota` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notas_login1_idx` (`login_idlogin` ASC) VISIBLE,
  CONSTRAINT `fk_notas_login1`
    FOREIGN KEY (`login_idlogin`)
    REFERENCES `laboratorio`.`login` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `laboratorio`.`questionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laboratorio`.`questionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `laboratorio`.`perguntas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laboratorio`.`perguntas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login_idlogin` INT NOT NULL,
  `turma` VARCHAR(255) NOT NULL,
  `pergunta` VARCHAR(255) NOT NULL,
  `resposta1` VARCHAR(255) NOT NULL,
  `resposta2` VARCHAR(255) NOT NULL,
  `resposta3` VARCHAR(255) NOT NULL,
  `resposta4` VARCHAR(255) NOT NULL,
  `questionario_idquestionario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_perguntas_login_idx` (`login_idlogin` ASC) VISIBLE,
  INDEX `fk_perguntas_questionario1_idx` (`questionario_idquestionario` ASC) VISIBLE,
  CONSTRAINT `fk_perguntas_login`
    FOREIGN KEY (`login_idlogin`)
    REFERENCES `laboratorio`.`login` (`id`),
  CONSTRAINT `fk_perguntas_questionario1`
    FOREIGN KEY (`questionario_idquestionario`)
    REFERENCES `laboratorio`.`questionario` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `laboratorio`.`respostas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laboratorio`.`respostas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login_idlogin` INT NOT NULL,
  `perguntas_idperguntas` INT NOT NULL,
  `resposta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_respostas_login1_idx` (`login_idlogin` ASC) VISIBLE,
  INDEX `fk_respostas_perguntas1_idx` (`perguntas_idperguntas` ASC) VISIBLE,
  CONSTRAINT `fk_respostas_login1`
    FOREIGN KEY (`login_idlogin`)
    REFERENCES `laboratorio`.`login` (`id`),
  CONSTRAINT `fk_respostas_perguntas1`
    FOREIGN KEY (`perguntas_idperguntas`)
    REFERENCES `laboratorio`.`perguntas` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
