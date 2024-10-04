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
    rol_id INT (11) NOT NULL,
    email VARCHAR (255) NOT NULL UNIQUE KEY,
    password TEXT NOT NULL,

    fyh_creacion  DATETIME NOT NULL,
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR (11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB; 

INSERT INTO usuarios (rol_id,email,password,fyh_creacion,estado)
VALUES ('1','admin@admin.com','$2a$12$hCPYB4fB5fXD1njZJ6a03uyDHnWnhpMYGWZTe/WeomvqDjmHJeqAC','2023-08-16 22:39:00','1');
INSERT INTO usuarios (rol_id,email,password,fyh_creacion,estado)
VALUES ('3','joseti@eorm2.com','$2a$12$hCPYB4fB5fXD1njZJ6a03uyDHnWnhpMYGWZTe/WeomvqDjmHJeqAC','2023-08-16 22:39:00','1');


CREATE TABLE personas (
    id_persona       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id       INT (11) NOT NULL,
    nombres          VARCHAR (50) NOT NULL,
    apellidos        VARCHAR (50) NOT NULL,
    cui              VARCHAR (13) NOT NULL,
    fecha_nacimiento VARCHAR (20) NOT NULL,
    profesion        VARCHAR (50) NOT NULL,
    direccion        VARCHAR (255) NOT NULL,
    celular          VARCHAR (10) NOT NULL,

    fyh_creacion  DATETIME NOT NULL, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR (11),

    FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB; 

INSERT INTO personas (usuario_id,nombres,apellidos,cui,fecha_nacimiento,profesion,direccion,celular,fyh_creacion,estado)
VALUES ('1','Abner Adonias Francisco','Tian Ixtan','3083675291406','25-10-1999','Ingeniero','Canton Chulumal III, Chichicastenango, El Quiche','39056626','2024-09-24 22:39:00','1');
INSERT INTO personas (usuario_id,nombres,apellidos,cui,fecha_nacimiento,profesion,direccion,celular,fyh_creacion,estado)
VALUES ('1','Josefa','Tiriquiz Morales','1234123451234','25-10-1987','Maestra de Educacion Primaria','Canton Chulumal IV, Chichicastenango, El Quiche','12345678','2024-09-24 22:39:00','1');

CREATE TABLE docentes (
    id_docente       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id       INT (11) NOT NULL,
    antiguedad       VARCHAR (255) NOT NULL,

    fyh_creacion  DATETIME NOT NULL,
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB; 

INSERT INTO docentes (persona_id,fyh_creacion,estado)
VALUES ('2','2024-09-24 22:39:00','1');

CREATE TABLE estudiantes (
    id_estudiante    INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id       INT (11) NOT NULL,
    grado_id         INT (11) NOT NULL,


    fyh_creacion  DATETIME NOT NULL, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (grado_id) REFERENCES grados (id_grado) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;


CREATE TABLE ppffs (
    id_ppff          INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estudiante_id    INT (11) NOT NULL,
    nombres_apellidos_ppff    VARCHAR (50) NOT NULL,
    cui_ppff         VARCHAR (15) NOT NULL,
    celular_ppff     VARCHAR (8) NOT NULL,
    ocupacion_ppff   VARCHAR (50) NOT NULL,
    ref_nombre       VARCHAR (50) NOT NULL,
    ref_parentesco   VARCHAR (50) NOT NULL,
    ref_celular      VARCHAR (11) NOT NULL,

    fyh_creacion  DATETIME NOT NULL, 
    fyh_actualizacion DATETIME NULL, 
    estado VARCHAR (11),

    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;


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

CREATE TABLE grados (
    id_grado      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    curso         VARCHAR (255) NOT NULL,
    seccion       VARCHAR (255) NOT NULL,

    fyh_creacion  DATETIME NOT NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)
)ENGINE=InnoDB;

INSERT INTO grados (nivel_id,curso,seccion,fyh_creacion,estado)
VALUES ('1','PRIMERO','A','2024-09-15 20:50:00','1');

CREATE TABLE materias (
    id_materia      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_materia  VARCHAR (255) NOT NULL,

    fyh_creacion  DATETIME NOT NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)
)ENGINE=InnoDB;

INSERT INTO materias (nombre_materia,fyh_creacion,estado)
VALUES ('MATEMATICAS','2024-09-15 20:50:00','1');


CREATE TABLE asignaciones (

  id_asignacion   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  docente_id      INT (11) NOT NULL,
  nivel_id        INT (11) NOT NULL,
  grado_id        INT (11) NOT NULL,
  materia_id      INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

   FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) on delete no action on update cascade,
   FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade,
   FOREIGN KEY (materia_id) REFERENCES materias (id_materia) on delete no action on update cascade,
   FOREIGN KEY (grado_id) REFERENCES grados(id_grado) on delete no action on update cascade

)ENGINE=InnoDB;


CREATE TABLE calificaciones (
    id_calificaciones         INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id                INT(11) NOT NULL,
    estudiante_id             INT(11) NOT NULL,
    materia_id                INT(11) NOT NULL,

    nota1                      VARCHAR(5) NOT NULL, 
    nota2                      VARCHAR(5) NOT NULL,  
    nota3                      VARCHAR(5) NOT NULL,   
    nota4                      VARCHAR(5) NOT NULL,   

    fyh_creacion              DATETIME NOT NULL,     
    fyh_actualizacion         DATETIME NULL,       
    estado                    VARCHAR(11) NOT NULL,  

    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id_estudiante) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (materia_id) REFERENCES materias(id_materia) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (docente_id) REFERENCES docentes(id_docente) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;