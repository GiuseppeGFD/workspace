para que funcione debo crear la base de datos sencilla esta


Correo electrónico: admin@fardel.com

Contraseña: admin123

CREATE DATABASE IF NOT EXISTS fardel_db;
USE fardel_db;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS expenses, subscriptions, categories, household_members, households, users;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE users (
  id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
  email VARCHAR(100) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  display_name VARCHAR(80) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE households (
  id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
  name VARCHAR(100) NOT NULL,
  currency CHAR(3) NOT NULL DEFAULT 'EUR',
  created_by VARCHAR(36) NOT NULL REFERENCES users(id),
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE household_members (
  household_id VARCHAR(36) NOT NULL REFERENCES households(id) ON DELETE CASCADE,
  user_id VARCHAR(36) NOT NULL REFERENCES users(id) ON DELETE CASCADE,
  role ENUM('owner', 'admin', 'member') NOT NULL DEFAULT 'member',
  joined_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (household_id, user_id)
);

CREATE TABLE categories (
  id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
  household_id VARCHAR(36) NOT NULL REFERENCES households(id) ON DELETE CASCADE,
  name VARCHAR(60) NOT NULL,
  icon VARCHAR(40)
);

CREATE TABLE expenses (
  id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
  household_id VARCHAR(36) NOT NULL REFERENCES households(id) ON DELETE CASCADE,
  category_id VARCHAR(36) NOT NULL REFERENCES categories(id),
  paid_by VARCHAR(36) NOT NULL REFERENCES household_members(user_id),
  amount DECIMAL(12,2) NOT NULL CHECK (amount > 0),
  description VARCHAR(200),
  expense_date DATE NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE subscriptions (
  id VARCHAR(36) PRIMARY KEY DEFAULT (UUID()),
  household_id VARCHAR(36) NOT NULL REFERENCES households(id) ON DELETE CASCADE,
  service VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  charge_day INT NOT NULL
);

-- Datos de prueba (Contraseña: admin123)
INSERT INTO users (id, email, password_hash, display_name) VALUES 
('usr-1', 'admin@fardel.com', '$2y$10$e.wX/U32.hP3LMyDMy7N/O3Z.a8D4/sN6d1T.9V4F8eC1C1C1C1C1', 'Giuseppe');

INSERT INTO households (id, name, created_by) VALUES ('hogar-1', 'Piso Compartido', 'usr-1');
INSERT INTO household_members (household_id, user_id, role) VALUES ('hogar-1', 'usr-1', 'owner');

INSERT INTO categories (id, household_id, name, icon) VALUES 
('cat-1', 'hogar-1', 'Vivienda', '🏠'), 
('cat-2', 'hogar-1', 'Alimentación', '🛒'),
('cat-3', 'hogar-1', 'Vehículos', '🚗'),
('cat-4', 'hogar-1', 'Mascotas', '🐶');

INSERT INTO subscriptions (household_id, service, price, charge_day) VALUES 
('hogar-1', 'Netflix', 12.99, 15), 
('hogar-1', 'Internet', 35.00, 1);