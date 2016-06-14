CREATE DATABASE necroparty
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

CREATE TABLE `necroparty`.`groups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL DEFAULT 'default' COMMENT 'Nombre del grupo de usuario',
  `permissions` TINYINT(1) NOT NULL DEFAULT 15 COMMENT 'Nivel de permisos que tienen el grupo a nivel de bits.\n0 = sin permisos\n1= lectura\n2 = crear\n4 = editar\n8 = eliminar',
  `isDelete` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla que almacena los grupos de usuario';

INSERT INTO `necroparty`.`groups` (`name`) VALUES ('default');
INSERT INTO `necroparty`.`groups` (`name`) VALUES ('admin');

CREATE TABLE `necroparty`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'ID del usuario',
  `email` VARCHAR(40) NOT NULL COMMENT 'Email del usuario',
  `user` VARCHAR(35) NOT NULL COMMENT 'Nombre de usuario',
  `password` VARCHAR(250) NOT NULL COMMENT 'Password del usuario',
  `facebook` VARCHAR(40) NULL COMMENT 'Facebook del usuario',
  `permissions` TINYINT(1) NOT NULL DEFAULT 16 COMMENT 'Permisos que tienen el usuario bit a bit\n0 = sin permisos\n1= lectura\n2 = crear\n4 = editar\n8 = eliminar',
  `idGroup` INT NULL DEFAULT 2 COMMENT 'Id del grupo al que pertenece el usuario. Los grupos estan en la tabla groups',
  `created_at` DATETIME NULL COMMENT 'Fecha de alta del usuario',
  `isDelete` VARCHAR(45) NULL DEFAULT 0 COMMENT 'Indica si el usuario está dado de baja',
  PRIMARY KEY (`id`),
  FOREIGN KEY(`idGroup`) REFERENCES groups(`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla que almacena a los usuarios registrados';


CREATE TABLE `necroparty`.`articles` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador del artículo',
  `title` VARCHAR(50) NOT NULL COMMENT 'Título del artículo.',
  `content` VARCHAR(45) NULL COMMENT 'Contenido del artículo.',
  `imgName` VARCHAR(50) NULL COMMENT 'Nombre de la imagen del artículo con extensión.',
  `imgPath` VARCHAR(150) NULL COMMENT 'Path de la imagen del artículo.',
  `section_id` INT NOT NULL COMMENT 'Sección del artículo.',
  `user_id` INT NOT NULL COMMENT 'Usuario que creó el artículo.',
  `created_at` DATETIME NOT NULL COMMENT 'Fecha de creación del artículo.',
  `isDelete` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Indica si el artículo está eliminado o no.',
  PRIMARY KEY (`id`),
  FOREIGN KEY(`section_id`) REFERENCES sections(`id`),
  FOREIGN KEY(`user_id`) REFERENCES users(`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tabla donde se guardan los artículos de la web.';


CREATE TABLE `necroparty`.`tags` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `created_at` DATETIME NULL,
  `isDelete` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT 'Tabla que almacena los tags';


CREATE TABLE `necroparty`.`article_tag` (
  `id` INT NOT NULL,
  `article_id` INT NOT NULL,
  `tag_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT 'Tabla pivote para la relacion de los artículos y los tags';


CREATE TABLE `necroparty`.`sections` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `created_at` DATETIME NULL,
  `isDelete` VARCHAR(45) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT 'Tabla que guarda las secciones';


CREATE TABLE `necroparty`.`comments` (
  `id` INT NOT NULL,
  `parent` INT NULL DEFAULT 0,
  `comment` VARCHAR(45) NOT NULL,
  `likes` INT NULL DEFAULT 0,
  `dislikes` INT NULL DEFAULT 0,
  `user_id` INT NOT NULL,
  `article_id` VARCHAR(45) NULL COMMENT 'El artículo no es obligatorio ya que se podría hacer un comentario desde la página home la cual no pertenece a ningun artículo',
  `section_id` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NULL,
  `isDelete` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


