-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS TuBaseDeDatos;
USE TuBaseDeDatos;

-- Crear la tabla de productos
CREATE TABLE IF NOT EXISTS Productos (	
    id INT AUTO_INCREMENT PRIMARY KEY,
    ModeloProducto VARCHAR(255) NOT NULL,
    ModeloFabricante VARCHAR(255) NOT NULL, 
    Descripción VARCHAR(255) NOT NULL,
    UNIQUE KEY unique_modelo (ModeloProducto, ModeloFabricante)
);

-- Crear la tabla de compras
CREATE TABLE IF NOT EXISTS Compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ModeloProducto VARCHAR(255) NOT NULL,
    ModeloFabricante VARCHAR(255) NOT NULL,
    OrdenCompra VARCHAR(255) NOT NULL, 
    Alias VARCHAR(255) NOT NULL,
    CantidadPedida INT(255) NOT NULL,
    CantidadLlegada INT(255),
    FechaPedido DATE NOT NULL,
    FechaLlegada DATE,
    INDEX idx_modelo (ModeloProducto, ModeloFabricante),
    FOREIGN KEY(ModeloProducto, ModeloFabricante) REFERENCES Productos(ModeloProducto, ModeloFabricante)
);

-- Crear la tabla de salidas de productos
CREATE TABLE IF NOT EXISTS SalidasProductos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ModeloProducto VARCHAR(255) NOT NULL,
    CantidadPiezas INT(255) NOT NULL, 
    ModeloFabricante VARCHAR(255) NOT NULL,
    NoVenta INT(255) NOT NULL, 
    Vendedor VARCHAR(255) NOT NULL, 
    Almacen VARCHAR(255) NOT NULL, 
    FechaSalida DATE,
    INDEX idx_modelo (ModeloProducto, ModeloFabricante),
    FOREIGN KEY(ModeloProducto, ModeloFabricante) REFERENCES Productos(ModeloProducto, ModeloFabricante)
);

-- Crear la tabla de nuevo pedido
CREATE TABLE IF NOT EXISTS NuevoPedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ModeloProducto VARCHAR(255) NOT NULL,
    CantidadVendidos INT(255) NOT NULL, 
    CantidadExistencias INT(255) NOT NULL, 
    StockIdeal INT(255),
    FechaSalida DATE,
    INDEX idx_modelo (ModeloProducto),
    FOREIGN KEY(ModeloProducto) REFERENCES Productos(ModeloProducto)
);

