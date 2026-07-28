CREATE TABLE IF NOT EXISTS reservations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  telephone VARCHAR(30) NOT NULL,
  date_reservation DATE NOT NULL,
  heure_reservation TIME NOT NULL,
  nombre_personnes INT NOT NULL,
  message TEXT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(60) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Compte admin par défaut : identifiant "admin", mot de passe "ChezDelice2026!"
-- ⚠️ À changer dès que possible (voir message de fin de projet).
INSERT INTO admins (username, password_hash)
VALUES ('admin', '$2y$10$KhlBWgT8M7862mJBxldwuO/9szDtxLofWX.kT3S9DNXbN5vE2VrVu')
ON DUPLICATE KEY UPDATE username = username;
