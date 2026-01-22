-- TaxAid Africa Database Schema (MySQL Compatible)

-- 1. Donations
CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_name VARCHAR(255) NOT NULL,
    donor_email VARCHAR(255) NOT NULL,
    amount DECIMAL(15, 2) NOT NULL,
    currency VARCHAR(10) DEFAULT 'NGN',
    status VARCHAR(50) DEFAULT 'pending',
    paystack_reference VARCHAR(100) UNIQUE,
    is_anonymous BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Volunteers
CREATE TABLE IF NOT EXISTS volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    volunteer_type VARCHAR(20) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    state VARCHAR(100),
    qualification VARCHAR(255),
    firm_name VARCHAR(255),
    firm_reg_no VARCHAR(100),
    specialization TEXT,
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_volunteer_type CHECK (volunteer_type IN ('individual', 'firm')),
    CONSTRAINT chk_volunteer_status CHECK (status IN ('pending', 'active', 'inactive'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Support Requests
CREATE TABLE IF NOT EXISTS support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    requester_name VARCHAR(255) NOT NULL,
    requester_email VARCHAR(255) NOT NULL,
    requester_phone VARCHAR(20),
    business_type VARCHAR(20) NOT NULL,
    industry_category VARCHAR(100),
    location VARCHAR(100),
    description TEXT NOT NULL,
    priority VARCHAR(20) DEFAULT 'medium',
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_business_type CHECK (business_type IN ('individual', 'sme')),
    CONSTRAINT chk_support_priority CHECK (priority IN ('low', 'medium', 'high')),
    CONSTRAINT chk_support_status CHECK (status IN ('pending', 'matched', 'resolved', 'closed'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Adoption Interests
CREATE TABLE IF NOT EXISTS adoption_interests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donor_id INT NULL,
    donor_name VARCHAR(255) NOT NULL,
    donor_email VARCHAR(255) NOT NULL,
    preferred_type VARCHAR(20) DEFAULT 'both',
    preferred_category VARCHAR(100),
    preferred_location VARCHAR(100),
    status VARCHAR(20) DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (donor_id) REFERENCES donations(id) ON DELETE SET NULL,
    CONSTRAINT chk_preferred_type CHECK (preferred_type IN ('individual', 'sme', 'both')),
    CONSTRAINT chk_interest_status CHECK (status IN ('open', 'matched', 'completed'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Adoptions
CREATE TABLE IF NOT EXISTS adoptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    interest_id INT NOT NULL,
    request_id INT NOT NULL,
    matched_by_admin_id INT,
    match_score INT,
    status VARCHAR(20) DEFAULT 'proposed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (interest_id) REFERENCES adoption_interests(id) ON DELETE CASCADE,
    FOREIGN KEY (request_id) REFERENCES support_requests(id) ON DELETE CASCADE,
    CONSTRAINT chk_adoption_status CHECK (status IN ('proposed', 'active', 'completed', 'cancelled'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6. Admin Users
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(255),
    role VARCHAR(20) DEFAULT 'editor',
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_admin_role CHECK (role IN ('super_admin', 'editor'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
