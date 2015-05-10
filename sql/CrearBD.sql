drop schema public cascade;
create schema public;

Create table if not exists universidad(
nombre varchar(50) primary key,
ciudad varchar(30) 
);
Create table if not exists carrera(
nombre varchar(80) primary key,
universidad varchar(50) references universidad(nombre));
Create table if not exists usuarios(
	login varchar(20) primary key,
	correo varchar(70),
	pass varchar(32),
	nombre varchar(60),
	apellido varchar(30),
	apellido2 varchar(30),
	sexo varchar(30),
	universidad varchar(50) references universidad(nombre),
	identificacion varchar(20),
	tipoid varchar(2),
	carrera varchar(80) references carrera(nombre));

Create table if not exists admins(
login varchar(20) primary key references usuarios(login));
insert into universidad values('Universidad del Valle','Cali'),('Universidad Santiago de Cali','Cali');
insert into carrera values('Ingenieria de sistemas e informacion','Universidad del Valle'),('Ingenieria Electronica','Universidad Santiago de Cali'); 
insert into usuarios values('Root1', 'camilog777@hotmail.es', 'Root1', 'Camilo Andres', 'Gonzalez', 'Rodriguez','Masculino','Universidad del Valle','1151953353','CC','Ingenieria de sistemas e informacion'),('nya','stephanya.casanova@correounivalle.edu.co','nya','Stephanya','Casanova','Marroqui','Femenino','Universidad del Valle','123456789','CC','Ingenieria Electronica');
insert into admins values('Root1');