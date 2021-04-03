-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema question_generator
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema question_generator
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `question_generator` DEFAULT CHARACTER SET latin1 ;
USE `question_generator` ;

-- -----------------------------------------------------
-- Table `question_generator`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`admin` (
  `admin_id` INT(10) NOT NULL AUTO_INCREMENT,
  `admin_name` VARCHAR(20) NOT NULL,
  `admin_surname` VARCHAR(20) NOT NULL,
  `admin_email` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`admin_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`lecture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`lecture` (
  `lecture_id` INT(10) NOT NULL AUTO_INCREMENT,
  `lecture_name` VARCHAR(20) NOT NULL,
  `lecture_surname` VARCHAR(20) NOT NULL,
  `lecture_emai` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`lecture_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`subject` (
  `subject_code` VARCHAR(10) NOT NULL,
  `Subject_name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`subject_code`),
  UNIQUE INDEX `subject_code_UNIQUE` (`subject_code` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`lecture_subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`lecture_subject` (
  `lecture_id` INT(10) NOT NULL,
  `subject_code` VARCHAR(10) NOT NULL,
  INDEX `lecture_id` (`lecture_id` ASC) VISIBLE,
  INDEX `subject_code` (`subject_code` ASC) VISIBLE,
  CONSTRAINT `lecture_subject_ibfk_1`
    FOREIGN KEY (`subject_code`)
    REFERENCES `question_generator`.`subject` (`subject_code`),
  CONSTRAINT `lecture_subject_ibfk_2`
    FOREIGN KEY (`lecture_id`)
    REFERENCES `question_generator`.`lecture` (`lecture_id`))
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
    REFERENCES `question_generator`.`subject` (`subject_code`))
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
    REFERENCES `question_generator`.`subject` (`subject_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`one_word`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`one_word` (
  `id` INT(10) NOT NULL,
  `question` VARCHAR(200) NOT NULL,
  `answer` VARCHAR(50) NOT NULL,
  `marks` INT(10) NOT NULL,
  `subj_code` VARCHAR(10) NOT NULL,
  INDEX `subj_code` (`subj_code` ASC) VISIBLE,
  CONSTRAINT `one_word_ibfk_1`
    FOREIGN KEY (`subj_code`)
    REFERENCES `question_generator`.`subject` (`subject_code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`question_paper`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`question_paper` (
  `question_id` INT(10) NOT NULL AUTO_INCREMENT,
  `question_total` INT(100) NOT NULL,
  `question_examiner` VARCHAR(25) NOT NULL,
  `subject_code` VARCHAR(10) NOT NULL,
  `filename` VARCHAR(50) NOT NULL,
  `date` VARCHAR(10) NOT NULL,
  `time` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`question_id`),
  INDEX `subject_code` (`subject_code` ASC) VISIBLE,
  CONSTRAINT `question_paper_ibfk_1`
    FOREIGN KEY (`subject_code`)
    REFERENCES `question_generator`.`subject` (`subject_code`))
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `question_generator`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `question_generator`.`users` (
  `email` VARCHAR(30) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `role` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
