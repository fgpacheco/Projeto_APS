SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`predios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`predios` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`predios` (
  `id` INT NOT NULL ,
  `descricao` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`salas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`salas` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`salas` (
  `id` INT NOT NULL ,
  `descricao` VARCHAR(45) NULL ,
  `ramal` VARCHAR(45) NULL ,
  `predio_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `predio_id`
    FOREIGN KEY (`predio_id` )
    REFERENCES `mydb`.`predios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_predio_id` ON `mydb`.`salas` (`predio_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`cursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`cursos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`cursos` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`departamentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`departamentos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`departamentos` (
  `id` INT NOT NULL ,
  `departamento` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `id` INT NOT NULL ,
  `apelido` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `senha` VARCHAR(45) NULL ,
  `departamento_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `departamento_id`
    FOREIGN KEY (`departamento_id` )
    REFERENCES `mydb`.`departamentos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_departamento_id` ON `mydb`.`usuarios` (`departamento_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`servidores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`servidores` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`servidores` (
  `id` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `cargo` VARCHAR(45) NULL ,
  `matricula` VARCHAR(45) NULL ,
  `usuario_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `usuario_id`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `mydb`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_usuario_id` ON `mydb`.`servidores` (`usuario_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`setores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`setores` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`setores` (
  `id` INT NOT NULL ,
  `descricao` VARCHAR(45) NULL ,
  `sala_id` INT NULL ,
  `curso_id` INT NULL ,
  `servidor_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `sala_id`
    FOREIGN KEY (`sala_id` )
    REFERENCES `mydb`.`salas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `curso_id`
    FOREIGN KEY (`curso_id` )
    REFERENCES `mydb`.`cursos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `servidor_id`
    FOREIGN KEY (`servidor_id` )
    REFERENCES `mydb`.`servidores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_sala_id` ON `mydb`.`setores` (`sala_id` ASC) ;

CREATE INDEX `fk_curso_id` ON `mydb`.`setores` (`curso_id` ASC) ;

CREATE INDEX `fk_servidor_id` ON `mydb`.`setores` (`servidor_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`modulos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`modulos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`modulos` (
  `id` INT NOT NULL ,
  `modulo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`permissaos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`permissaos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`permissaos` (
  `id` INT NOT NULL ,
  `permissao` VARCHAR(45) NULL ,
  `modulo_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `modulo_id`
    FOREIGN KEY (`modulo_id` )
    REFERENCES `mydb`.`modulos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_modulo_id` ON `mydb`.`permissaos` (`modulo_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`tipousuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tipousuarios` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`tipousuarios` (
  `id` INT NOT NULL ,
  `tipousuario` VARCHAR(45) NULL ,
  `modulo_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `modulo_id`
    FOREIGN KEY (`modulo_id` )
    REFERENCES `mydb`.`modulos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_modulo_id` ON `mydb`.`tipousuarios` (`modulo_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`permissao_tipousuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`permissao_tipousuario` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`permissao_tipousuario` (
  `tipousuario_id` INT NOT NULL ,
  `permissao_id` INT NOT NULL ,
  PRIMARY KEY (`tipousuario_id`, `permissao_id`) ,
  CONSTRAINT `tipousuario_id`
    FOREIGN KEY (`tipousuario_id` )
    REFERENCES `mydb`.`tipousuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `permissao_id`
    FOREIGN KEY (`permissao_id` )
    REFERENCES `mydb`.`permissaos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_premissao_id` ON `mydb`.`permissao_tipousuario` (`permissao_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`tipousuario_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tipousuario_usuario` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`tipousuario_usuario` (
  `tipousuario_id` INT NOT NULL ,
  `usuario_id` INT NOT NULL ,
  PRIMARY KEY (`tipousuario_id`, `usuario_id`) ,
  CONSTRAINT `tipousuario_id`
    FOREIGN KEY (`tipousuario_id` )
    REFERENCES `mydb`.`tipousuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usuario_id`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `mydb`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `usuario_id_idx` ON `mydb`.`tipousuario_usuario` (`usuario_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`solicitacaoaquisicaos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`solicitacaoaquisicaos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`solicitacaoaquisicaos` (
  `id` INT NOT NULL ,
  `data` DATE NULL ,
  `status` VARCHAR(45) NULL ,
  `setor_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `setor_id`
    FOREIGN KEY (`setor_id` )
    REFERENCES `mydb`.`setores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `setor_id_idx` ON `mydb`.`solicitacaoaquisicaos` (`setor_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`grupos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`grupos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`grupos` (
  `id` INT NOT NULL ,
  `descricao` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`subgrupos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`subgrupos` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`subgrupos` (
  `id` INT NOT NULL ,
  `descricao` VARCHAR(45) NULL ,
  `grupo_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `grupo_id`
    FOREIGN KEY (`grupo_id` )
    REFERENCES `mydb`.`grupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `grupo_id_idx` ON `mydb`.`subgrupos` (`grupo_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`motivodescartes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`motivodescartes` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`motivodescartes` (
  `id` INT NOT NULL ,
  `motivo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`marcas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`marcas` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`marcas` (
  `id` INT NOT NULL ,
  `descricao` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`patrimonios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`patrimonios` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`patrimonios` (
  `id` INT NOT NULL ,
  `motivodescarte_id` INT NULL ,
  `subgrupo_id` INT NULL ,
  `marca_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `motivodescarte_id`
    FOREIGN KEY (`motivodescarte_id` )
    REFERENCES `mydb`.`motivodescartes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `marca_id`
    FOREIGN KEY (`marca_id` )
    REFERENCES `mydb`.`marcas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `subgrupo_id`
    FOREIGN KEY (`subgrupo_id` )
    REFERENCES `mydb`.`subgrupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `motivodescarte_id_idx` ON `mydb`.`patrimonios` (`motivodescarte_id` ASC) ;

CREATE INDEX `marca_id_idx` ON `mydb`.`patrimonios` (`marca_id` ASC) ;

CREATE INDEX `subgrupo_id_idx` ON `mydb`.`patrimonios` (`subgrupo_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`solicitacaoaquisicao_subgrupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`solicitacaoaquisicao_subgrupo` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`solicitacaoaquisicao_subgrupo` (
  `solicitacaoaquisicao_id` INT NOT NULL ,
  `subgrupo_id` INT NOT NULL ,
  PRIMARY KEY (`solicitacaoaquisicao_id`, `subgrupo_id`) ,
  CONSTRAINT `subgrupo_id`
    FOREIGN KEY (`subgrupo_id` )
    REFERENCES `mydb`.`subgrupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `solicitacaoaquisicao_id`
    FOREIGN KEY (`solicitacaoaquisicao_id` )
    REFERENCES `mydb`.`solicitacaoaquisicaos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `subgrupo_id_idx` ON `mydb`.`solicitacaoaquisicao_subgrupo` (`subgrupo_id` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`historico_patrimonio_setor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`historico_patrimonio_setor` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`historico_patrimonio_setor` (
  `patrimonio_id` INT NOT NULL ,
  `setor_id` INT NOT NULL ,
  `data_aquisicao` DATE NULL ,
  `data_devolucao` DATE NULL ,
  PRIMARY KEY (`patrimonio_id`, `setor_id`) ,
  CONSTRAINT `setor_id`
    FOREIGN KEY (`setor_id` )
    REFERENCES `mydb`.`setores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `patrimonio_id`
    FOREIGN KEY (`patrimonio_id` )
    REFERENCES `mydb`.`patrimonios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `setor_id_idx` ON `mydb`.`historico_patrimonio_setor` (`setor_id` ASC) ;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
