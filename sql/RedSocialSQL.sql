drop schema public cascade;
create schema public;

CREATE TABLE Usuario(
login varchar(20) primary key,
correo varchar(70),
pass varchar(32),
nombre varchar(60),
apellido varchar(30),
apellido2 varchar(30),
sexo varchar(30),
universidad int,
identificacion varchar(20),
tipoid varchar(2),
carrera int,
estado boolean
);


CREATE TABLE Administrador (
admin_id VARCHAR(20) NOT NULL,
CONSTRAINT administrador_pk PRIMARY KEY (admin_id),
CONSTRAINT administrador_fk FOREIGN KEY (admin_id)
REFERENCES Usuario (login)
);


CREATE TABLE Universidad (
	universidad_id serial NOT NULL PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	ciudad varchar(40) not NULL,
	estado boolean NOT NULL,
	admin_id VARCHAR(20) NOT NULL references Administrador(admin_id));

	

CREATE TABLE Carrera (
	carrera_id serial NOT NULL primary key,
	nombre VARCHAR(50) NOT NULL,
	universidad INT references universidad(universidad_id),
	estado boolean NOT NULL,
	admin_id VARCHAR(20) NOT NULL,
CONSTRAINT usuario_fk FOREIGN KEY (admin_id)
REFERENCES Administrador (admin_id)
);


CREATE TABLE Usuario_Cliente(
	usuario_id VARCHAR(20) NOT NULL,
	universidad_id int NOT NULL,
	carrera_id VARCHAR(20) NOT NULL,
CONSTRAINT Usuario_cliente_pk PRIMARY KEY (usuario_id),
CONSTRAINT usuario_fk FOREIGN KEY (usuario_id)
REFERENCES Usuario (login),
CONSTRAINT universidad_fk FOREIGN KEY (universidad_id)
REFERENCES Universidad (universidad_id)
);

CREATE TABLE Estudio_Usuario(

	usuario_id VARCHAR(20) NOT NULL,
	estudio VARCHAR(100) NOT NULL,
	estado boolean NOT NULL,
CONSTRAINT estudio_usuario_pk PRIMARY KEY (usuario_id, estudio),
CONSTRAINT usuario_fk FOREIGN KEY (usuario_id)
REFERENCES Usuario (login)
);


CREATE TABLE Contacto (
	usuario_uno VARCHAR(20) NOT NULL,
	usuario_dos VARCHAR(20) NOT NULL,
	solicitud boolean NOT NULL,
	fecha date NOT NULL,

CONSTRAINT contacto_pk PRIMARY KEY (usuario_uno, usuario_dos),
CONSTRAINT usuario_uno_fk FOREIGN KEY (usuario_uno)
REFERENCES Usuario (login),
CONSTRAINT usuario_dos_fk FOREIGN KEY (usuario_dos)
REFERENCES Usuario (login)
	
);


CREATE TABLE Mensaje (
	usuario_uno VARCHAR(20) NOT NULL,
	usuario_dos VARCHAR(20) NOT NULL,
	fecha date NOT NULL,
	mensaje_enviado VARCHAR(500) NOT NULL,
	oculto boolean NOT NULL,
	posponer boolean NOT NULL,
	estado boolean NOT NULL,
	visto boolean NOT NULL,

	CONSTRAINT mensaje_pk PRIMARY KEY (usuario_uno, usuario_dos, fecha),
	CONSTRAINT usuario_uno_fk FOREIGN KEY (usuario_uno)
	REFERENCES Usuario (login),
	CONSTRAINT usuario_dos_fk FOREIGN KEY (usuario_dos)
	REFERENCES Usuario (login)

);


CREATE TABLE Evento (
	id_evento VARCHAR(20) NOT NULL PRIMARY KEY,
	nombre VARCHAR(50) NOT NULL,
	descripcion VARCHAR(300) NOT NULL,
	fecha date NOT NULL,
	lugar VARCHAR(50) NOT NULL,
	estado boolean NOT NULL,
	administrador VARCHAR(20) NOT NULL,

CONSTRAINT admin_fk FOREIGN KEY (administrador)
REFERENCES Usuario(login)
	
);


CREATE TABLE Invitacion_Evento (

	usuario_uno VARCHAR(20) NOT NULL,
	usuario_dos VARCHAR(20) NOT NULL,
	id_evento VARCHAR(20) NOT NULL,
	asistir boolean NOT NULL,

CONSTRAINT invita_evento_pk PRIMARY KEY (usuario_uno, usuario_dos, id_evento),
CONSTRAINT usuario_uno_fk FOREIGN KEY (usuario_uno)
REFERENCES Usuario (login),
CONSTRAINT usuario_dos_fk FOREIGN KEY (usuario_dos)
REFERENCES Usuario (login),
CONSTRAINT evento_fk FOREIGN KEY (id_evento)
REFERENCES Evento(id_evento)
);


CREATE TABLE Notificacion_Evento (
	id_evento VARCHAR(20) NOT NULL,
	usuario VARCHAR(20) NOT NULL,
	fecha date NOT NULL,
	mensaje_enviado VARCHAR(500) NOT NULL,
	oculto boolean NOT NULL,
	posponer boolean NOT NULL,
	estado boolean NOT NULL,
	visto boolean NOT NULL,

	CONSTRAINT noti_evento_pk PRIMARY KEY (id_evento, usuario, fecha),
	CONSTRAINT evento_fk FOREIGN KEY (id_evento)
	REFERENCES Evento (id_evento),
	CONSTRAINT usuario_fk FOREIGN KEY (usuario)
	REFERENCES Usuario (login)

);


CREATE SEQUENCE ACTIVIDAD_seq;

CREATE TABLE Usuario_Agenda (
	num_actividad INTEGER DEFAULT nextval ('actividad_seq'::regclass) NOT NULL PRIMARY KEY,
	usuario VARCHAR(20) NOT NULL,
	nombre VARCHAR(100) NOT NULL,
	fecha DATE NOT NULL,
	lugar VARCHAR(100) NOT NULL,
	descripcion VARCHAR(100) NOT NULL,

CONSTRAINT usuario_fk FOREIGN KEY (usuario)
REFERENCES Usuario(login)
);


CREATE TABLE Grupo (
	nombre VARCHAR(50) NOT NULL PRIMARY KEY,
	descripcion VARCHAR(300) NOT NULL,
	administrador VARCHAR(20) NOT NULL,
	fechacreacion DATE NOT NULL,

CONSTRAINT admin_fk FOREIGN KEY (administrador)
REFERENCES Usuario(login)
	
);

CREATE TABLE Invitacion_grupo (

	usuario_uno VARCHAR(20) NOT NULL,
	usuario_dos VARCHAR(20) NOT NULL,
	grupo VARCHAR(50) NOT NULL,
	asistir boolean NOT NULL,

CONSTRAINT invita_grupo_pk PRIMARY KEY (usuario_uno, usuario_dos, grupo),
CONSTRAINT usuario_uno_fk FOREIGN KEY (usuario_uno)
REFERENCES Usuario (login),
CONSTRAINT usuario_dos_fk FOREIGN KEY (usuario_dos)
REFERENCES Usuario (login),
CONSTRAINT grupo_fk FOREIGN KEY (grupo)
REFERENCES Grupo(nombre)
);





CREATE TABLE Notificacion_Grupo (
	grupo VARCHAR(50) NOT NULL,
	usuario VARCHAR(20) NOT NULL,
	fecha date NOT NULL,
	mensaje_enviado VARCHAR(500) NOT NULL,
	oculto boolean NOT NULL,
	posponer boolean NOT NULL,
	estado boolean NOT NULL,
	visto boolean NOT NULL,
	CONSTRAINT noti_grupo_pk PRIMARY KEY (grupo, usuario, fecha),
	CONSTRAINT grupo_fk FOREIGN KEY (grupo)
	REFERENCES Grupo (nombre),
	CONSTRAINT usuario_fk FOREIGN KEY (usuario)
	REFERENCES Usuario (login)
);



---las siguientes inserciones a excepcion del administrador son prouebas. Se conservaran mientras se terminan de implemantar el resto de funcionalidades.
--agregando ususario administrador ala base de datos
insert into usuario values('Root1', 'camilog777@hotmail.es','Root1','Camilo Andres', 'Gonzalez','Rodriguez','Masculino','1','1151953353','CC','1', true);
insert into administrador values('Root1');

--adicionando  universidades prueba
insert into universidad(nombre,ciudad,estado,admin_id) values('Universidad del Valle','Cali',true, 'Root1'),('Universidad Santiago de Cali','Cali',true, 'Root1'),
('Universidad Javeriana','Cali',true, 'Root1'),('Universidad Cooperativa de Colombia','Cali',true, 'Root1');	

--adicionando carreras prueba
insert into carrera (nombre,universidad,estado,admin_id)values('Ingenieria de sistemas e informacion','1',true,'Root1'),('Ingenieria Electronica','2', true,'Root1'),('Ingenieria industrial','2',true,'Root1'),('Ingenieria agricola','1', true,'Root1');


--agrgeando restricciones de llaves foranes a la tabla usuario
ALTER TABLE Usuario ADD CONSTRAINT usuarios_fk1 FOREIGN KEY (universidad)
REFERENCES universidad (universidad_id);

ALTER TABLE Usuario ADD CONSTRAINT usuario_fk2 FOREIGN KEY (carrera)
REFERENCES Carrera (carrera_id);


--adicionando usuarios prueba
insert into usuario values('jhon', 'jhon@hotmail.es','jhon','John freidy', 'Lourido','Astudillo','Masculino','1','1151953353','CC','1', true);	
insert into usuario values('kellys', 'jhon@hotmail.es','kellys','kellys', 'Santa','Castañeda','Femenino','1','1151953353','CC','1', true);
insert into usuario values('yaya', 'kellys@hotmail.es','kellys','kellys', 'Santa','Castañeda','Femenino','1','1151953353','CC','1', true);
insert into usuario values('casanova', 'casanova@hotmail.es','casanova','stefa', 'casanova','Castañeda','Femenino','3','1151953353','CC','1', true);

--adicionando eventos
insert into Evento values ('1','concierto babasonicos','rock, indie, electronica', '17-03-20015', 'cali', true, 'jhon');
insert into Evento values ('2','asamblea','comvocatoria al tropel estudiantil', '20-03-20015', 'cali', true, 'jhon');	
insert into Evento values ('3','El perol','comvocatoria al tropel estudiantil', '20-03-20015', 'cali', true, 'kellys');
insert into Evento values ('4','conversatorio','comvocatoria al tropel estudiantil', '20-03-20015', 'cali', true, 'jhon');
insert into Evento values ('5','torneo de futbol','comvocatoria al tropel estudiantil', '20-03-20015', 'cali', true, 'jhon');
insert into Evento values ('6','marcha','comvocatoria al tropel estudiantil', '20-03-20015', 'cali', true, 'casanova');
insert into Evento values ('7','la male','comvocatoria al tropel estudiantil', '20-03-20015', 'cali', true, 'kellys');	

--adiccionando invitaciones

INSERT INTO Invitacion_Evento VALUES ('kellys','jhon','3',true), ('kellys','casanova','3',true), ('jhon','kellys','2',true), ('jhon','casanova','2',true), ('jhon','kellys','4',false);
INSERT INTO Invitacion_Evento  VALUES ('casanova','kellys','3',true), ('kellys','casanova','4',true), ('jhon','kellys','6',true), ('jhon','casanova','4',true), ('jhon','kellys','5',true);
INSERT INTO Invitacion_Evento VALUES ('jhon','kellys','7',true), ('jhon','casanova','7',true), ('casanova','kellys','7',false), ('jhon','casanova','1',true), ('jhon','kellys','1',false);

--adicionando grupo
INSERT INTO Grupo VALUES ('grupo1','grupo1','jhon','11/08/2015'),
			('grupo2','grupo2','jhon','11/04/2015');
