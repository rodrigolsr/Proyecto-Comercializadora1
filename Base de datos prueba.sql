-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS prueba;

-- Seleccionar la base de datos
USE prueba;

-- Crear la tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

-- Insertar datos de ejemplo
INSERT INTO productos (nombre, descripcion, cantidad, precio)
VALUES
    ('Producto 1', 'Descripción del Producto 1', 10, 29.99),
    ('Producto 2', 'Descripción del Producto 2', 5, 19.99),
    ('Producto 3', 'Descripción del Producto 3', 8, 39.99);

-- Eliminar la restricción AUTO_INCREMENT de la columna id
ALTER TABLE productos
MODIFY id INT NOT NULL;

-- Ahora puedes insertar datos sin que la columna id sea autoincrementable
INSERT INTO productos (id, nombre, descripcion, cantidad, precio)
VALUES
    (1, 'Producto 1', 'Descripción del Producto 1', 10, 29.99),
    (2, 'Producto 2', 'Descripción del Producto 2', 5, 19.99),
    (3, 'Producto 3', 'Descripción del Producto 3', 8, 39.99);


-- Modificar la tabla productos para agregar nuevas columnas
ALTER TABLE productos
ADD COLUMN total_vendidos INT NOT NULL,
ADD COLUMN periodo_venta INT NOT NULL,
ADD COLUMN stock_minimo INT,
ADD COLUMN stock_ideal INT;
