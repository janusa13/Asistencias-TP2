
CREATE DATABASE Asistencia;

USE Asistencia;

CREATE TABLE Profesor (
    prof_DNI INT PRIMARY KEY,
    telefono INT,
    apellido VARCHAR(100) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
     diasClases INT,
    porcentajeLibre INT,
    porcentajePromocion int
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
CREATE TABLE Alumno_cursan_materia(
    materia_fk INT,
FOREIGN KEY (materia_FK) REFERENCES materia(materia_ID),
alumno_fk INT,
FOREIGN key (alumno_fk) REFERENCES Alumno(alumno_DNI)
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
    asistencias INT DEFAULT 0,
    fecha_nac DATE
);

CREATE TABLE Alumno_Materia(
	alumno_FK INT,
	materia_FK INT,
	FOREIGN KEY (ALUMNO_FK) REFERENCES Alumno(alumn_DNI)
	FOREIGN KEY (materia_FK) REFERENCES Materia(materia_ID)

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
    materia_FK INT,
    alumno_FK INT,
    asistencias INT DEFAULT 0,
    FOREIGN KEY(materia_FK) REFERENCES Materia(materia_ID),
    FOREIGN KEY(alumno_FK) REFERENCES Alumno(alumn_DNI)
);
INSERT INTO Profesor (prof_DNI, telefono, apellido, nombre)
VALUES (
        123,
        312,
        'Parra',
        'Javier'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        45847922,
        'Franco',
        'Cabrera',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        43149316,
        'Franco Agustin',
        'Chappe',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        43632750,
        'Roman',
        'Coletti',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (40790201, 'Esteban', 'Copello', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        40790545,
        'Daian Exequiel',
        'Fernandez',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        44980999,
        'Nicolas Osvaldo',
        'Fernandez',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        44623314,
        'Facundo Geronimo',
        'Figun',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        45389325,
        'Lucas Jeremias',
        'Fiorotto',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (45048325, 'Felipe', 'Franco', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (43631803, 'Bruno', 'Godoy', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (42069298, 'Marcos Damian', 'Godoy', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (45385675, 'Teo', 'Hildt', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        41872676,
        'Facundo Ariel',
        'Janusa',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (45048950, 'Facundo Martin', 'Jara', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        45387761,
        'Santiago Nicolas',
        'Martinez Bender',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        45741185,
        'Pablo Federico',
        'Martinez',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        44981059,
        'Federico Jose',
        'Martinolich',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (45048325, 'Maria Pia', 'Melgarejo', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        43631710,
        'Thiago Jeremias',
        'Meseguer',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        44644523,
        'Ignacio Agustin',
        'Piter',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        44282007,
        'Bianca Ariana',
        'Quiroga',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        40018598,
        'Kevin Gustavo',
        'Quiroga',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (45048325, 'Marcos', 'Reynoso', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        39255959,
        'Franco Antonio',
        'Robles',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (43414566, 'Maximiliano', 'Weyler', '1999-01-01');