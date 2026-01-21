-- TaxAid Africa Database Schema

-- Volunteers Table
CREATE TABLE IF NOT EXISTS volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    type ENUM('individual', 'professional') NOT NULL,
    qualification VARCHAR(255),
    state VARCHAR(100) NOT NULL,
    experience_years INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Support Requests Table (Get Help)
CREATE TABLE IF NOT EXISTS support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    state VARCHAR(100) NOT NULL,
    taxpayer_type ENUM('individual', 'corporate') NOT NULL,
    help_type VARCHAR(255) NOT NULL,
    employment_status VARCHAR(100),
    business_type VARCHAR(255),
    reason TEXT NOT NULL,
    status ENUM('pending', 'matched', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Donations Table
CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_name VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    amount DECIMAL(15, 2) NOT NULL,
    reference VARCHAR(100) UNIQUE,
    status ENUM('pending', 'success', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Adoption Matches Table
CREATE TABLE IF NOT EXISTS adoption_matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    adopter_id INT, -- Link to a user or donor
    request_id INT NOT NULL,
    status ENUM('pending', 'active', 'closed') DEFAULT 'pending',
    matched_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (request_id) REFERENCES support_requests(id)
);

-- Admin Users Table
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'super_admin') DEFAULT 'admin',
    last_login TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- System Logs Table
CREATE TABLE IF NOT EXISTS system_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action VARCHAR(255) NOT NULL,
    details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
