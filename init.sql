-- Erstellen der Testdatenbank (wird beim Start geladen)
CREATE DATABASE IF NOT EXISTS testdb;

-- Wechsel in die Testdatenbank
USE testdb;

-- Tabelle `users` erstellen
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL UNIQUE,
    zip VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Testdaten in die Tabelle `users` einfügen
INSERT INTO users (name, lastname, username, zip) VALUES
('John', 'Doe', 'johndoe', '12345'),
('Jane', 'Smith', 'janesmith', '54321'),
('Alice', 'Johnson', 'alicej', '11111'),
('Bob', 'Brown', 'bobbrown', '22222'),
('Charlie', 'Davis', 'charlied', '33333');

-- Tabelle `buttons` erstellen
CREATE TABLE IF NOT EXISTS buttons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(100) NOT NULL,
    color VARCHAR(50) NOT NULL,
    mode VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Testdaten in die Tabelle `buttons` einfügen
INSERT INTO buttons (label, color, mode) VALUES
('Submit', 'Green', 'Active'),
('Cancel', 'Red', 'Inactive'),
('Help', 'Blue', 'Active'),
('Settings', 'Yellow', 'Inactive'),
('Search', 'Grey', 'Active');
