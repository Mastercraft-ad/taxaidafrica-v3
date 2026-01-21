# TaxAid Africa

## Overview
A website for TaxAid Africa, a non-profit organization dedicated to tax education and support in Africa. The site features volunteer signup, tax education resources, SME support services, request forms, a tax calculator tool, and an "Adopt A Tax Payer" donation system powered by Paystack.

## Running the Application
The application runs using a PHP built-in server on port 5000:
```bash
php -S 0.0.0.0:5000
```

## Project Structure
```
index.html                 - Main HTML page (all sections)
assets/
  css/style.css           - Main stylesheet
  images/                 - Stock images for sections
page/
  about.html              - About Us page
  contact.html            - Contact page
  donate.html             - Donations page
  gethelp.html            - Get Help page
  resources.html          - Resources page
  services.html           - Services page
  volunteer-individual.html - Individual volunteer registration form
  volunteer-firm.html     - Professional firm volunteer registration form
server/
  index.js                - Express backend with Paystack integration
api/                      - Legacy PHP API files (not in use)
includes/                 - Legacy PHP includes (not in use)
```

## Key Features
- Hero Section with worker image and CTAs
- "Adopt A Tax Payer" multi-step modal with Individual and Corporate paths
- Volunteer Signup with dedicated registration forms
- Tax Calculator (PAYE/Income Tax and VAT)
- Responsive mobile-friendly design

## Environment Variables
- `PAYSTACK_SECRET_KEY` - Required for payment processing
- `PAYSTACK_PUBLIC_KEY` - Required for Paystack frontend integration

## Design System
- Primary Color: #208D71 (Teal)
- Secondary Color: #F2BC1C (Yellow/Gold)
- Accent Color: #E64249 (Pink/Red)
- Fonts: DM Sans (sans-serif) + Architects Daughter (handwritten)
