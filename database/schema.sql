-- TaxAid Africa Database Schema

-- 1. Donations (Powered by Paystack integration)
CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_name VARCHAR(255) NOT NULL,
    donor_email VARCHAR(255) NOT NULL,
    amount DECIMAL(15, 2) NOT NULL,
    currency VARCHAR(10) DEFAULT 'NGN',
    status VARCHAR(50) DEFAULT 'pending', -- pending, success, failed
    paystack_reference VARCHAR(100) UNIQUE,
    is_anonymous BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Volunteers (Individuals and Firms)
CREATE TABLE IF NOT EXISTS volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    volunteer_type ENUM('individual', 'firm') NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    state VARCHAR(100),
    qualification VARCHAR(255), -- For individuals
    firm_name VARCHAR(255), -- For firms
    firm_reg_no VARCHAR(100), -- For firms
    specialization TEXT,
    status ENUM('pending', 'active', 'inactive') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Support Requests (Beneficiaries)
CREATE TABLE IF NOT EXISTS support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requester_name VARCHAR(255) NOT NULL,
    requester_email VARCHAR(255) NOT NULL,
    requester_phone VARCHAR(20),
    business_type ENUM('individual', 'sme') NOT NULL,
    industry_category VARCHAR(100),
    location VARCHAR(100),
    description TEXT NOT NULL,
    priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
    status ENUM('pending', 'matched', 'resolved', 'closed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Adoption Interests (Donors looking to adopt)
CREATE TABLE IF NOT EXISTS adoption_interests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_id INT NULL, -- Link to donations table if applicable
    donor_name VARCHAR(255) NOT NULL,
    donor_email VARCHAR(255) NOT NULL,
    preferred_type ENUM('individual', 'sme', 'both') DEFAULT 'both',
    preferred_category VARCHAR(100),
    preferred_location VARCHAR(100),
    status ENUM('open', 'matched', 'completed') DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (donor_id) REFERENCES donations(id) ON DELETE SET NULL
);

-- 5. Adoptions (Links Donor Interest to Support Request)
CREATE TABLE IF NOT EXISTS adoptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    interest_id INT NOT NULL,
    request_id INT NOT NULL,
    matched_by_admin_id INT, -- To track which admin did the matching
    match_score INT, -- Store the logic score at the time of matching
    status ENUM('proposed', 'active', 'completed', 'cancelled') DEFAULT 'proposed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (interest_id) REFERENCES adoption_interests(id) ON DELETE CASCADE,
    FOREIGN KEY (request_id) REFERENCES support_requests(id) ON DELETE CASCADE
);

-- 6. Admin Users
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(255),
    role ENUM('super_admin', 'editor') DEFAULT 'editor',
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
