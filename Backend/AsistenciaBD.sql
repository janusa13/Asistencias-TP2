
CREATE DATABASE Asistencia;

USE Asistencia;

CREATE TABLE Profesor (
    prof_DNI INT PRIMARY KEY,
    telefono INT,
    apellido VARCHAR(100) NOT NULL,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE Materia ( 
    materia_ID INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    profesor_FK INT,
    FOREIGN KEY (profesor_FK) REFERENCES Profesor(prof_DNI)
);

CREATE TABLE DIAS_MATERIAS(
	dias_fk INT,
	FOREIGN KEY (dias_fk) REFERENCES dias(dias_id),
	materia_fk INT,
	FOREIGN KEY (materia_fk) REFERENCES materia(materia_ID)
	);


CREATE TABLE Dias (
	dias_id INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(100)
);

INSERT INTO Dias (nombre) VALUES
    ('Lunes'),
    ('Martes'),
    ('Miércoles'),
    ('Jueves'),
    ('Viernes');



CREATE TABLE Horarios (
    hora_Desde TIME,
    hora_Hasta TIME,
    materia_FK INT,
    FOREIGN KEY(materia_FK) REFERENCES Materia(materia_ID)
);

CREATE TABLE Alumno (
    alumn_DNI INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nac DATE
);

CREATE TABLE Parciales (
    parcial_ID INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    fecha DATE,
    materia_FK INT,
    FOREIGN KEY (materia_FK) REFERENCES Materia(materia_ID)
);

CREATE TABLE hacen_Parciales(
    nota INT,
    alum_FK INT,
    parcial_FK INT,
    FOREIGN KEY (alum_FK) REFERENCES Alumno(alumn_DNI),
    FOREIGN KEY (parcial_FK) REFERENCES Parciales(parcial_ID)
);

CREATE TABLE Trabajos (
    trabajo_ID INT PRIMARY KEY,
    fecha_Entrega DATE,
    fecha_Inicio DATE,
    nombre VARCHAR(100) NOT NULL,
    materia_FK INT,
    FOREIGN KEY(materia_FK) REFERENCES Materia(materia_ID)
);

CREATE TABLE realiza_Trabajo (
    alumno_FK INT,
    trabajo_FK INT,
    FOREIGN KEY(alumno_FK) REFERENCES Alumno(alumn_DNI),
    FOREIGN KEY(trabajo_FK) REFERENCES Trabajos(trabajo_ID)
);

CREATE TABLE Asistencia (
    fecha DATE,
    estado VARCHAR(50) NOT NULL,
    materia_FK INT,
    alumno_FK INT,
    FOREIGN KEY(materia_FK) REFERENCES Materia(materia_ID),
    FOREIGN KEY(alumno_FK) REFERENCES Alumno(alumn_DNI)
);
