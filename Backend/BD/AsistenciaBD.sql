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
CREATE TABLE Alumno (
    alumn_DNI INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    asistencias INT DEFAULT 0,
    fecha_nac DATE
);
CREATE TABLE Asistencia (
    alumno_FK INT,
    fecha DATE,
    FOREIGN KEY(alumno_FK) REFERENCES Alumno(alumn_DNI) ON UPDATE CASCADE ON DELETE CASCADE
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
VALUES (42070085, 'Maria Pia', 'Melgarejo', '1999-01-01');
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
VALUES (38570361, 'Marcos', 'Reynoso', '1999-01-01');
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (
        39255959,
        'Franco Antonio',
        'Robles',
        '1999-01-01'
    );
INSERT INTO Alumno (alumn_DNI, nombre, apellido, fecha_nac)
VALUES (43414566, 'Maximiliano', 'Weyler', '1999-01-01');