# TaxAid Africa - Platform Overview

## Project Summary
TaxAid Africa is a comprehensive digital platform for a non-profit organization dedicated to tax education, advocacy, and support across Africa. The platform connects donors (Adopters) with beneficiaries (Taxpayers in need) and coordinates professional volunteers to provide expert tax assistance.

## Technology Stack
- **Frontend**: HTML5, Tailwind CSS (via CDN), Vanilla JavaScript.
- **Backend**: PHP (8.2+) with session management and PDO.
- **Database**: 
  - **Production (Replit)**: PostgreSQL (Managed).
  - **Local (Laragon)**: MySQL 8.0+ (InnoDB engine).
- **Payment Integration**: Paystack API for donations.
- **Design System**: 
  - Primary: #2D8CD5 (Blue)
  - Secondary: #F2BC1C (Yellow)
  - Accent: #E64249 (Red)
  - Fonts: DM Sans (Sans-serif) & Architects Daughter (Handwritten).

## Project Structure
```
/                      - Root (Public index.html, license, docs)
├── admin/             - Administrative Dashboard
│   ├── includes/      - Admin logic (Matchmaker system)
│   ├── adoptions.php  - Donor-Beneficiary matching interface
│   ├── login.php      - Secure admin authentication
│   └── ...            - Other management modules
├── api/               - Backend API endpoints (Form processing)
├── assets/            - Static assets (CSS, Images, Hero slides)
├── database/          - Database artifacts (MySQL/PostgreSQL schema)
├── includes/          - Shared backend utilities (DB connection)
└── page/              - Public sub-pages (About, Donate, Volunteer, etc.)
```

## Core Features & Functionality

### 1. Matchmaking System
- **Logic**: A sophisticated ranking algorithm that scores matches based on:
  - **Status Match**: Linking Individual/SME donors to corresponding beneficiaries.
  - **Sector Alignment**: Matching by industry (e.g., Retail, Manufacturing).
  - **Geographic Match**: Connecting based on location/state.
  - **Priority Boost**: Surfacing high-priority assistance requests.
- **Admin Interface**: Dedicated UI for manual review and "One-Click Linking" of donors to beneficiaries.

### 2. Adoption & Assistance Flow
- **Adopt A Taxpayer**: Multi-step flow for donors to express interest in supporting specific taxpayer groups.
- **Request Tax Assistance**: Specialized portal for financially vulnerable individuals and SMEs to request professional tax aid.

### 3. Volunteer Coordination
- **Individual Path**: For tax professionals, accountants, and legal practitioners.
- **Firm Path**: For professional services firms offering corporate social responsibility (CSR) support.

### 4. Administrative Portal
- **Secure Access**: Session-based auth with hashed passwords and last-login tracking.
- **Demo Credentials**: `taxadmininfo` / `taxaidafrica247247` (For demonstration purposes).
- **Responsive Dashboard**: Fully mobile-optimized interface with a slide-out sidebar for on-the-go management.
- **Data Export**: Integrated "Export to Excel" functionality for all data tables.

## Deployment & Setup

### Local Setup (Laragon)
1. Clone the project into Laragon's `www` directory.
2. Create a MySQL database named `taxaid_africa`.
3. Import `database/schema.sql`.
4. The system automatically detects the local environment and uses standard `root` credentials.

### Production (Replit)
1. Provision a PostgreSQL database via Replit tools.
2. Apply the PostgreSQL-optimized schema.
3. Configure `PAYSTACK_SECRET_KEY` and `PAYSTACK_PUBLIC_KEY` as Secrets.

## Recent Architectural Decisions (Jan 2026)
- **Removed Legacy Modules**: General Settings, Admin User management, and System Logs were removed to streamline the MVP.
- **Responsiveness**: Rebuilt the admin sidebar and header layout to handle mobile viewport constraints.
- **Database Portability**: Implemented a dual-compatible schema and a flexible connection handler for easy local-to-cloud migration.
