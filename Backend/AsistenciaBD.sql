CREATE DATABASE Asistencia; 

USE Asistencia; 


CREATE TABLE Profesor {
prof_DNI INT PRIMARY KEY,
telefono INT,
apellido  VARCHAR(100) NOT NULL,
nombre VARCHAR(100) NOT NULL
};

CREATE TABLE Materia {
materia_ID INT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
dias VARCHAR(100) NOT NULL,
profesor_FK INT,
FOREIGN KEY (profesor_FK) REFERENCES Profesor(prof_DNI)
};

CREATE TABLE Alumno {
alumn_DNI INT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
apellido VARCHAR(100) NOT NULL,
fecha_nac DATE 
};

CREATE TABLE Parciales {
parcial_ID INT PRIMARY KEY,
fecha DATE,
FOREIGN KEY (materia_FK) REFERENCES Materia(materia_ID)
};

CREATE TABLE Hacen {
nota INT,
alum_FK INT,
parcial_FK INT,
FOREIGN KEY (alum_FK) REFERENCES Alumno(dni_Alumn),
FOREIGN KEY (parcial_FK) REFERENCES Parciales(parcial_ID)
};

CREATE TABLE Trabajos {
trabajo_ID INT PRIMARY KEY,
fecha_Entrega DATE,
fecha_Inicio DATE,
nombre VARCHAR(100) NOT NULL,
FOREIGN KEY(materia_FK) REFERENCES Materia(materia_ID)
};

CREATE TABLE Realiza {
alumno_FK INT,
trabajo_FK INT,
FOREIGN KEY(alumno_FK) REFERENCES Alumno(alumn_DNI),
FOREIGN KEY(trabajo_FK) REFERENCES Trabajos(trabajo_ID)
};

CREATE TABLE Asistencia {
fecha DATE,
estado VARCHAR(50) NOT NULL,
materia_FK INT,
alumno_FK INT,
FOREIGN KEY(materia_FK) REFERENCES Materia(materia_ID),
FOREIGN KEY(alumno_FK) REFERENCES Alumno(alumn_DNI)
};

