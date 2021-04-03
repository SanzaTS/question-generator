-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema question_generator
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema question_generator
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `question_generator` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `question_generator`.`lecturer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`lecturer` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `surname` VARCHAR(20) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `telephone` INT UNSIGNED NULL,
  `address-id` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `street_number` VARCHAR(45) NOT NULL,
  `surbub` VARCHAR(35) NOT NULL,
  `city` VARCHAR(25) BINARY NOT NULL,
  `province` VARCHAR(15) BINARY NOT NULL,
  `postal_code` INT(4) NOT NULL,
  `lecturer_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`, `lecturer_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_address_lecturer_idx` (`lecturer_id` ASC) VISIBLE,
  CONSTRAINT `fk_address_lecturer`
    FOREIGN KEY (`lecturer_id`)
    REFERENCES `question_generator`.`lecturer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `question_generator`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`subject` (
  `code` VARCHAR(10) NOT NULL,
  `Subject_name` VARCHAR(30) NOT NULL,
  `department` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE INDEX `subject_code_UNIQUE` (`code` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`question_paper`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`question_paper` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `total_mark` INT(100) NOT NULL,
  `question_examiner` VARCHAR(25) NOT NULL,
  `subject_code` VARCHAR(10) NOT NULL,
  `filename` VARCHAR(50) NOT NULL,
  `date` DATE NOT NULL,
  `time` VARCHAR(10) NOT NULL,
  `number_of_questions` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `subject_code` (`subject_code` ASC) VISIBLE,
  CONSTRAINT `question_paper_ibfk_1`
    FOREIGN KEY (`subject_code`)
    REFERENCES `question_generator`.`subject` (`code`))
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`memorandum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`memorandum` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question_paper_id` INT(10) NULL,
  `question_paper_id1` INT(10) NOT NULL,
  PRIMARY KEY (`id`, `question_paper_id1`),
  INDEX `fk_memorandum_question_paper1_idx` (`question_paper_id1` ASC) VISIBLE,
  CONSTRAINT `fk_memorandum_question_paper1`
    FOREIGN KEY (`question_paper_id1`)
    REFERENCES `question_generator`.`question_paper` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `question_generator` ;

-- -----------------------------------------------------
-- Table `question_generator`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`role` (
  `id` VARCHAR(10) NOT NULL,
  `name` VARCHAR(20) NOT NULL,
  `description` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`lecturer_subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`lecturer_subject` (
  `lecture_id` INT(10) NOT NULL,
  `subject_code` VARCHAR(10) NOT NULL,
  INDEX `lecture_id` (`lecture_id` ASC) VISIBLE,
  INDEX `subject_code` (`subject_code` ASC) VISIBLE,
  PRIMARY KEY (`lecture_id`, `subject_code`),
  CONSTRAINT `lecture_subject_ibfk_1`
    FOREIGN KEY (`subject_code`)
    REFERENCES `question_generator`.`subject` (`code`),
  CONSTRAINT `lecture_subject_ibfk_2`
    FOREIGN KEY (`lecture_id`)
    REFERENCES `question_generator`.`lecturer` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`long_question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`long_question` (
  `id` INT(10) NOT NULL,
  `question` VARCHAR(200) NOT NULL,
  `answer` VARCHAR(100) NOT NULL,
  `marks` INT(10) NOT NULL,
  `subj_code` VARCHAR(10) NOT NULL,
  INDEX `subj_code` (`subj_code` ASC) VISIBLE,
  CONSTRAINT `long_question_ibfk_1`
    FOREIGN KEY (`subj_code`)
    REFERENCES `question_generator`.`subject` (`code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`multiple_choice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`multiple_choice` (
  `id` INT(10) NOT NULL,
  `question` VARCHAR(200) NOT NULL,
  `option1` VARCHAR(50) NOT NULL,
  `option2` VARCHAR(50) NOT NULL,
  `option3` VARCHAR(50) NOT NULL,
  `option4` VARCHAR(50) NOT NULL,
  `marks` INT(10) NOT NULL,
  `subj_code` VARCHAR(10) NOT NULL,
  INDEX `subj_code` (`subj_code` ASC) VISIBLE,
  CONSTRAINT `multiple_choice_ibfk_1`
    FOREIGN KEY (`subj_code`)
    REFERENCES `question_generator`.`subject` (`code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`missing_word_question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`missing_word_question` (
  `id` INT(10) NOT NULL,
  `question` VARCHAR(200) NOT NULL,
  `answer` VARCHAR(50) NOT NULL,
  `marks` INT(10) NOT NULL,
  `subj_code` VARCHAR(10) NOT NULL,
  INDEX `subj_code` (`subj_code` ASC) VISIBLE,
  CONSTRAINT `one_word_ibfk_1`
    FOREIGN KEY (`subj_code`)
    REFERENCES `question_generator`.`subject` (`code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`user` (
  `role_id` VARCHAR(10) NOT NULL,
  `password` VARCHAR(45) NULL,
  `role_id1` VARCHAR(10) NOT NULL,
  `lecturer_id` INT(10) NOT NULL,
  PRIMARY KEY (`role_id1`, `lecturer_id`),
  INDEX `fk_user_lecturer1_idx` (`lecturer_id` ASC) VISIBLE,
  CONSTRAINT `fk_user_role1`
    FOREIGN KEY (`role_id1`)
    REFERENCES `question_generator`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_lecturer1`
    FOREIGN KEY (`lecturer_id`)
    REFERENCES `question_generator`.`lecturer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
