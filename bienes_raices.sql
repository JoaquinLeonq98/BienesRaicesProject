-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bienesraices_crud
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bienesraices_crud
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bienesraices_crud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `bienesraices_crud` ;

-- -----------------------------------------------------
-- Table `bienesraices_crud`.`vendedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienesraices_crud`.`vendedores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `bienesraices_crud`.`propiedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienesraices_crud`.`propiedades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL DEFAULT NULL,
  `precio` DECIMAL(10,2) NULL DEFAULT NULL,
  `imagen` VARCHAR(200) NULL DEFAULT NULL,
  `descripcion` LONGTEXT NULL DEFAULT NULL,
  `habitaciones` INT NULL DEFAULT NULL,
  `wc` INT NULL DEFAULT NULL,
  `estacionamiento` INT NULL DEFAULT NULL,
  `creado` DATE NULL DEFAULT NULL,
  `vendedorId` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_propiedades_vendedores_idx` (`vendedorId` ASC) VISIBLE,
  CONSTRAINT `fk_propiedades_vendedores`
    FOREIGN KEY (`vendedorId`)
    REFERENCES `bienesraices_crud`.`vendedores` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
