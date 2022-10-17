CREATE TABLE usuarios (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  usuario varchar(45) NOT NULL,
  clave varchar(255) NOT NULL,
  nombre varchar(200) NOT NULL,
  apellido varchar(200) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY usuario (usuario)
) ENGINE=InnoDB AUTO_INCREMENT=1;

INSERT INTO usuarios (usuario, clave, nombre, apellido)
VALUES (1,'ejemplo','1234','Javier','Kainer');

CREATE TABLE carros (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  marca varchar(45) NOT NULL,
  modelo varchar(255) NOT NULL,
  año varchar(200) NOT NULL,
  color varchar(200) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY usuario (usuario)
) ENGINE=InnoDB AUTO_INCREMENT=1;

INSERT INTO carros VALUES (1,'Toyota','Corolla','2018','Gris'),(2,'Ford','Focus','2014','Negro'),(3,'Fiat','Cronos','2022','Rojo'),(4,'Chevrolet','Cruze','2017','Blanco');