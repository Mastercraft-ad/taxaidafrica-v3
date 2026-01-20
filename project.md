# TaxAid Africa - Website with Paystack Donations

## Overview
A website for TaxAid Africa, a non-profit organization dedicated to tax education and support in Africa. The site features volunteer signup, tax education resources, SME support services, request forms, a tax calculator tool, and an "Adopt A Tax Payer" donation system powered by Paystack.

## Project Structure
```
index.html                 - Main HTML page (all sections)
assets/
  css/style.css           - Main stylesheet (Tailwind-inspired)
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
```

## Key Features
- **Hero Section**: Full-width with worker image and CTAs
- **Adopt A Tax Payer**: Multi-step modal popup for adopting/supporting taxpayers
  - Individual path: Country → State → People list with sample data
  - Corporate path: Industry → Business list with sample data
  - Countries: Nigeria, Ghana, Kenya, South Africa with states/regions
  - Industries: Retail, Agriculture, Manufacturing, Services, Technology
- **Volunteer Signup**: Modal-based volunteer type selection with dedicated registration forms
  - Individual Volunteer Form: Personal info, professional background, skills, availability
  - Professional Firm Form: Organization info, services offered, geographic coverage
- **Support Request Form**: Client-side form handling with JavaScript
- **Tax Calculator**: PAYE/Income Tax and VAT calculation with JavaScript
- **Responsive Design**: Mobile-friendly with custom CSS

## Design System
- **Primary Color**: #208D71 (Teal)
- **Secondary Color**: #F2BC1C (Yellow/Gold)
- **Accent Color**: #E64249 (Pink/Red)
- **Fonts**: DM Sans (sans-serif) + Architects Daughter (handwritten)

## Running the Application
The application runs using Node.js/Express server on port 5000 with Stripe integration.

```bash
node server/index.js
```

## Paystack Integration
- **Paystack Checkout**: Secure payment processing via Paystack transaction initialization
- **Donation Flow**: Users select a taxpayer → choose amount (₦5,000, ₦10,000, ₦25,000) → redirect to Paystack → return on success
- **Environment Variables Required**: PAYSTACK_SECRET_KEY, PAYSTACK_PUBLIC_KEY

## Form Handling
Forms are processed entirely client-side with JavaScript:
- **Support Request Form**: Shows success message after submission
- **Tax Calculator**: Calculates and displays results in real-time

## Tax Calculation Logic
### Personal Income Tax (PAYE)
- Consolidated Relief Allowance (CRA): Max(200,000, 1% of income) + 20% of income
- First 300,000 of taxable income: 7%
- Remainder: 20%

### VAT
- Standard rate: 7.5%

## Recent Changes
- December 9, 2025: Added Stripe donation flow to "Adopt A Tax Payer" feature
  - Integrated Stripe Checkout for secure payment processing
  - Added donation step with preset amounts ($25, $50, $100) and custom amount option
  - Created Express backend (server/index.js) with Stripe API integration
  - Added success/cancel handling for Stripe redirects
- December 9, 2025: Added "Adopt A Tax Payer" feature
  - Changed hero button from "I need help with tax" to "Adopt A Tax Payer"
  - Created multi-step modal popup with Individual and Corporate taxpayer paths
  - Individual flow: Country → State → List of people requesting support
  - Corporate flow: Industry → List of businesses requesting support
  - Sample data for 4 African countries and 5 industries
- December 8, 2025: Major design update aligned with TAX-AID profile document
  - Redesigned About section with Mission & Vision split layout + CAC registration badge
  - Replaced Services with 9 Activities grid (Educate/Support/Advocate themes)
  - Enhanced I-VOLUNTEER section with professional volunteer categories
  - Added Governance section with Advisory Board and Executive Council
  - Added Donate section with Individual, Corporate, and Tax-Deductible options
- December 8, 2025: Converted from PHP backend to frontend-only static site
- All PHP includes combined into single index.html
- Tax calculator now uses client-side JavaScript
- Support form uses JavaScript for client-side handling
- Static file server replaces PHP development server
