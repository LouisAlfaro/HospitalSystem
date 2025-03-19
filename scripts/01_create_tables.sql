-- Creación de tablas


CREATE TABLE IF NOT EXISTS gerente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS condicion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS distrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS sede (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);


CREATE TABLE IF NOT EXISTS provincia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);


-- No se insertan datos iniciales en esta tabla, ya que se utilizará para el CRUD

CREATE TABLE IF NOT EXISTS hospital (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gerente VARCHAR(255) NOT NULL,
    condicion VARCHAR(255) NOT NULL,
    sede VARCHAR(255) NOT NULL,
    distrito VARCHAR(255) NOT NULL
);
