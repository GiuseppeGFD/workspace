-- Fardel · esquema (importar en phpMyAdmin). No incluye usuarios: crea tu cuenta desde la web.
CREATE DATABASE IF NOT EXISTS fardel_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE fardel_db;

CREATE TABLE IF NOT EXISTS users (
  id CHAR(32) PRIMARY KEY,
  email VARCHAR(120) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  display_name VARCHAR(80) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS households (
  id CHAR(32) PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  invite_code CHAR(8) NULL UNIQUE,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS household_members (
  household_id CHAR(32) NOT NULL,
  user_id CHAR(32) NOT NULL,
  role ENUM('owner','admin','member') NOT NULL DEFAULT 'member',
  PRIMARY KEY (household_id, user_id),
  FOREIGN KEY (household_id) REFERENCES households(id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS categories (
  id CHAR(32) PRIMARY KEY,
  household_id CHAR(32) NOT NULL,
  name VARCHAR(60) NOT NULL,
  icon VARCHAR(16) NOT NULL DEFAULT '🏷️',
  budget DECIMAL(12,2) NULL COMMENT 'presupuesto mensual',
  FOREIGN KEY (household_id) REFERENCES households(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS expenses (
  id CHAR(32) PRIMARY KEY,
  household_id CHAR(32) NOT NULL,
  category_id CHAR(32) NOT NULL,
  paid_by CHAR(32) NOT NULL,
  amount DECIMAL(12,2) NOT NULL CHECK (amount > 0),
  description VARCHAR(200) NOT NULL,
  note VARCHAR(500) NULL,
  receipt VARCHAR(80) NULL,
  expense_date DATE NOT NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_house_date (household_id, expense_date),
  FOREIGN KEY (household_id) REFERENCES households(id) ON DELETE CASCADE,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT,
  FOREIGN KEY (paid_by) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS subscriptions (
  id CHAR(32) PRIMARY KEY,
  household_id CHAR(32) NOT NULL,
  service VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  charge_day TINYINT NOT NULL,
  FOREIGN KEY (household_id) REFERENCES households(id) ON DELETE CASCADE
) ENGINE=InnoDB;
