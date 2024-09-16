
CREATE TABLE roles (
    id_rol INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR (255) NOT NULL UNIQUE KEY,

    fyh_creacion  DATETIME NOT NULL, /*HORARIO EN EL QUE SE EMITE EL REGISTRO*/
    fyh_actualizacion DATETIME NULL, /*HORARIO EN EL QUE SE ACTUALIZA EL REGISTRO*/
    estado VARCHAR (11)
)ENGINE=InnoDB; /*InnoDB es para crear relaciones*/

INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('ADMINISTRADOR','2024-08-27 21:31:21','1');
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('DIRECTOR','2024-08-27 21:31:21','1');
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('DOCENTE','2024-08-27 21:31:21','1');
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('SECRETARI@','2024-08-27 21:31:21','1');


CREATE TABLE usuarios (
    id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR (255) NOT NULL,
    dpi VARCHAR (20) NOT NULL,
    rol_id INT (11) NOT NULL,
    email VARCHAR (255) NOT NULL UNIQUE KEY,
    password TEXT NOT NULL, /*es text porque sale encriptado*/

    fyh_creacion  DATETIME NOT NULL, /*HORARIO EN EL QUE SE EMITE EL REGISTRO*/
    fyh_actualizacion DATETIME NULL, /*HORARIO EN EL QUE SE ACTUALIZA EL REGISTRO*/
    estado VARCHAR (11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB; /*InnoDB es para crear relaciones*/

INSERT INTO usuarios ( nombres,dpi,rol_id,email,password,fyh_creacion,estado)
VALUES ('Werner Morales','1234123451234','1','admin@admin.com','$2a$12$hCPYB4fB5fXD1njZJ6a03uyDHnWnhpMYGWZTe/WeomvqDjmHJeqAC','2023-08-16 22:39:00','1');


CREATE TABLE configuracion_institucion (
    id_config_institucion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_institucion VARCHAR (255) NOT NULL,
    logo VARCHAR (255) NULL,
    direccion VARCHAR (255) NOT NULL,
    telefono VARCHAR (100) NULL,
    correo VARCHAR (255) NULL, 

    fyh_creacion  DATETIME NOT NULL, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR (11)
)ENGINE=InnoDB; 

INSERT INTO configuracion_institucion ( nombre_institucion,logo,direccion,telefono,correo,fyh_creacion,estado)
VALUES ('EORM Chulumal II','logo.jpg','Canton Chulumal II, Chichicastenango, El Quiche','77592125','eormch2@eorm2.edu','2024-09-09 21:28:59','1');

CREATE TABLE gestiones (
    id_gestion  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion     VARCHAR (255) NOT NULL,

    fyh_creacion        DATETIME NULL, 
    fyh_actualizacion   DATETIME NULL, 
    estado              VARCHAR (11)
)ENGINE=InnoDB; 

INSERT INTO gestiones ( gestion, fyh_creacion, estado)
VALUES ('PERIODO 2024','2024-09-14 12:50:59','1');

CREATE TABLE niveles (
    id_niveles      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion_id      INT (11) NOT NULL,
    nivel           VARCHAR (255) NOT NULL,

    fyh_creacion  DATETIME NOT NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;

INSERT INTO niveles (gestion_id,nivel,fyh_creacion,estado)
VALUES ('1','PRE-PRIMARIA','2024-09-15 22:39:00','1');