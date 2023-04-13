-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_banco_digital
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_banco_digital
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_banco_digital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `db_banco_digital` ;

-- -----------------------------------------------------
-- Table `db_banco_digital`.`correntista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_banco_digital`.`correntista` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `cpf` INT NOT NULL,
  `data_nasc` DATE NOT NULL,
  `senha` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf` (`cpf` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_banco_digital`.`conta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_banco_digital`.`conta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) NOT NULL,
  `saldo` DOUBLE NOT NULL,
  `limite` DOUBLE NOT NULL,
  `id_correntista` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_correntista` (`id_correntista` ASC) VISIBLE,
  CONSTRAINT `fk_conta`
    FOREIGN KEY (`id_correntista`)
    REFERENCES `db_banco_digital`.`correntista` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_banco_digital`.`chave_pix`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_banco_digital`.`chave_pix` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(50) NOT NULL,
  `chave` VARCHAR(50) NOT NULL,
  `id_conta` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `chave` (`chave` ASC) VISIBLE,
  INDEX `id_conta` (`id_conta` ASC) VISIBLE,
  CONSTRAINT `fk_chave_pix`
    FOREIGN KEY (`id_conta`)
    REFERENCES `db_banco_digital`.`conta` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_banco_digital`.`transacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_banco_digital`.`transacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `valor` DOUBLE NOT NULL,
  `data_hora` DATETIME NOT NULL,
  `id_conta_enviou` INT NOT NULL,
  `id_conta_recebeu` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_transa_conta_idx` (`id_conta_enviou` ASC, `id_conta_recebeu` ASC) VISIBLE,
  CONSTRAINT `fk_transa_conta`
    FOREIGN KEY (`id_conta_enviou` , `id_conta_recebeu`)
    REFERENCES `db_banco_digital`.`conta` (`id` , `id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
