
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- kra_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kra_user`;


CREATE TABLE `kra_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`fullname` VARCHAR(255)  NOT NULL,
	`email` VARCHAR(255),
	`username` VARCHAR(100)  NOT NULL,
	`password` VARCHAR(100)  NOT NULL,
	`admin` INTEGER  NOT NULL,
	`grade_id` INTEGER,
	`department_id` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `kra_user_FI_1` (`grade_id`),
	CONSTRAINT `kra_user_FK_1`
		FOREIGN KEY (`grade_id`)
		REFERENCES `kra_grade` (`id`),
	INDEX `kra_user_FI_2` (`department_id`),
	CONSTRAINT `kra_user_FK_2`
		FOREIGN KEY (`department_id`)
		REFERENCES `kra_department` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kra_department
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kra_department`;


CREATE TABLE `kra_department`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100)  NOT NULL,
	`user_id` VARCHAR(100)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kra_grade
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kra_grade`;


CREATE TABLE `kra_grade`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50)  NOT NULL,
	`description` VARCHAR(200)  NOT NULL,
	`department_id` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `kra_grade_FI_1` (`department_id`),
	CONSTRAINT `kra_grade_FK_1`
		FOREIGN KEY (`department_id`)
		REFERENCES `kra_department` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kra_level_preset
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kra_level_preset`;


CREATE TABLE `kra_level_preset`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`department_id` INTEGER,
	`grade_id` INTEGER,
	`level` INTEGER  NOT NULL,
	`question_no` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `kra_level_preset_FI_1` (`department_id`),
	CONSTRAINT `kra_level_preset_FK_1`
		FOREIGN KEY (`department_id`)
		REFERENCES `kra_department` (`id`),
	INDEX `kra_level_preset_FI_2` (`grade_id`),
	CONSTRAINT `kra_level_preset_FK_2`
		FOREIGN KEY (`grade_id`)
		REFERENCES `kra_grade` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kra_question
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kra_question`;


CREATE TABLE `kra_question`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` TEXT  NOT NULL,
	`answer_a` TEXT  NOT NULL,
	`answer_b` TEXT  NOT NULL,
	`answer_c` TEXT  NOT NULL,
	`answer_d` TEXT  NOT NULL,
	`answer_option_id` INTEGER,
	`department_id` INTEGER,
	`level` INTEGER  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `kra_question_FI_1` (`answer_option_id`),
	CONSTRAINT `kra_question_FK_1`
		FOREIGN KEY (`answer_option_id`)
		REFERENCES `kra_answer_option` (`id`),
	INDEX `kra_question_FI_2` (`department_id`),
	CONSTRAINT `kra_question_FK_2`
		FOREIGN KEY (`department_id`)
		REFERENCES `kra_department` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kra_answer_option
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kra_answer_option`;


CREATE TABLE `kra_answer_option`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(10)  NOT NULL,
	`option_name` INTEGER  NOT NULL,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- kra_question_generator
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `kra_question_generator`;


CREATE TABLE `kra_question_generator`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`question_id` INTEGER,
	`answer` INTEGER default 0 NOT NULL,
	`answer_option_id` INTEGER,
	`created_at` DATETIME,
	`answer_at` DATETIME  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `kra_question_generator_FI_1` (`user_id`),
	CONSTRAINT `kra_question_generator_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `kra_user` (`id`),
	INDEX `kra_question_generator_FI_2` (`question_id`),
	CONSTRAINT `kra_question_generator_FK_2`
		FOREIGN KEY (`question_id`)
		REFERENCES `kra_question` (`id`),
	INDEX `kra_question_generator_FI_3` (`answer_option_id`),
	CONSTRAINT `kra_question_generator_FK_3`
		FOREIGN KEY (`answer_option_id`)
		REFERENCES `kra_answer_option` (`id`)
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
