-- TaxAid Africa Database Schema (PostgreSQL)

-- 1. Donations
CREATE TABLE IF NOT EXISTS donations (
    id SERIAL PRIMARY KEY,
    donor_name VARCHAR(255) NOT NULL,
    donor_email VARCHAR(255) NOT NULL,
    amount DECIMAL(15, 2) NOT NULL,
    currency VARCHAR(10) DEFAULT 'NGN',
    status VARCHAR(50) DEFAULT 'pending',
    paystack_reference VARCHAR(100) UNIQUE,
    is_anonymous BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Volunteers
CREATE TABLE IF NOT EXISTS volunteers (
    id SERIAL PRIMARY KEY,
    volunteer_type VARCHAR(20) CHECK (volunteer_type IN ('individual', 'firm')) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    state VARCHAR(100),
    qualification VARCHAR(255),
    firm_name VARCHAR(255),
    firm_reg_no VARCHAR(100),
    specialization TEXT,
    status VARCHAR(20) CHECK (status IN ('pending', 'active', 'inactive')) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Support Requests
CREATE TABLE IF NOT EXISTS support_requests (
    id SERIAL PRIMARY KEY,
    requester_name VARCHAR(255) NOT NULL,
    requester_email VARCHAR(255) NOT NULL,
    requester_phone VARCHAR(20),
    business_type VARCHAR(20) CHECK (business_type IN ('individual', 'sme')) NOT NULL,
    industry_category VARCHAR(100),
    location VARCHAR(100),
    description TEXT NOT NULL,
    priority VARCHAR(20) CHECK (priority IN ('low', 'medium', 'high')) DEFAULT 'medium',
    status VARCHAR(20) CHECK (status IN ('pending', 'matched', 'resolved', 'closed')) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Adoption Interests
CREATE TABLE IF NOT EXISTS adoption_interests (
    id SERIAL PRIMARY KEY,
    donor_id INT NULL,
    donor_name VARCHAR(255) NOT NULL,
    donor_email VARCHAR(255) NOT NULL,
    preferred_type VARCHAR(20) CHECK (preferred_type IN ('individual', 'sme', 'both')) DEFAULT 'both',
    preferred_category VARCHAR(100),
    preferred_location VARCHAR(100),
    status VARCHAR(20) CHECK (status IN ('open', 'matched', 'completed')) DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (donor_id) REFERENCES donations(id) ON DELETE SET NULL
);

-- 5. Adoptions
CREATE TABLE IF NOT EXISTS adoptions (
    id SERIAL PRIMARY KEY,
    interest_id INT NOT NULL,
    request_id INT NOT NULL,
    matched_by_admin_id INT,
    match_score INT,
    status VARCHAR(20) CHECK (status IN ('proposed', 'active', 'completed', 'cancelled')) DEFAULT 'proposed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (interest_id) REFERENCES adoption_interests(id) ON DELETE CASCADE,
    FOREIGN KEY (request_id) REFERENCES support_requests(id) ON DELETE CASCADE
);

-- 6. Admin Users
CREATE TABLE IF NOT EXISTS admins (
    id SERIAL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(255),
    role VARCHAR(20) CHECK (role IN ('super_admin', 'editor')) DEFAULT 'editor',
    last_login TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
