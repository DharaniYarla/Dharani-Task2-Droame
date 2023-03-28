CREATE TABLE customers (
  customer_id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  phone_number VARCHAR(20) NOT NULL
);

CREATE TABLE bookings (
  booking_id INT PRIMARY KEY AUTO_INCREMENT,
  customer_id INT NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  room_type VARCHAR(20) NOT NULL,
  FOREIGN KEY (customer_id) REFERENCES customers (customer_id) ON DELETE CASCADE
);
