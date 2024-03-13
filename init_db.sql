CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price) VALUES
('Laptop', 'High-performance laptop for gaming and professional work.', 1200.00),
('Smartphone', 'Latest model with high-resolution camera and long-lasting battery.', 800.00),
('Headphones', 'Noise-cancelling headphones with superior sound quality.', 150.00),
('Smart Watch', 'Waterproof smartwatch with heart rate and sleep monitor.', 250.00),
('Backpack', 'Durable backpack with laptop compartment and waterproof material.', 70.00);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
