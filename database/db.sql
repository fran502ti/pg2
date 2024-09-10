
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


