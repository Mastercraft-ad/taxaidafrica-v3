const express = require('express');
const cors = require('cors');
const path = require('path');

const app = express();
const PORT = 5000;

const PAYSTACK_SECRET_KEY = process.env.PAYSTACK_SECRET_KEY;

const ALLOWED_AMOUNTS = [500000, 1000000, 2500000];

app.use(cors());
app.use(express.json());

app.use(express.static(path.join(__dirname, '..')));

app.get('/api/paystack/public-key', (req, res) => {
  const publicKey = process.env.PAYSTACK_PUBLIC_KEY;
  if (!publicKey) {
    return res.status(500).json({ error: 'Paystack public key not configured' });
  }
  res.json({ publicKey });
});

app.post('/api/create-donation-checkout', async (req, res) => {
  try {
    const { amount, email, taxpayerName, taxpayerType, description } = req.body;

    if (!PAYSTACK_SECRET_KEY) {
      return res.status(500).json({ error: 'Paystack not configured' });
    }

    if (!amount || !ALLOWED_AMOUNTS.includes(amount)) {
      return res.status(400).json({ 
        error: 'Invalid amount. Allowed amounts are: ₦5,000, ₦10,000, or ₦25,000',
        allowed_amounts: ALLOWED_AMOUNTS 
      });
    }

    if (!email) {
      return res.status(400).json({ error: 'Email is required for Paystack transactions' });
    }

    let baseUrl;
    if (process.env.REPLIT_DOMAINS) {
      baseUrl = `https://${process.env.REPLIT_DOMAINS.split(',')[0]}`;
    } else if (req.headers.origin) {
      baseUrl = req.headers.origin;
    } else {
      baseUrl = `${req.protocol}://${req.get('host')}`;
    }

    const paymentData = {
      email: email,
      amount: amount,
      currency: 'NGN',
      callback_url: `${baseUrl}?donation=success&name=${encodeURIComponent(taxpayerName)}`,
      metadata: {
        taxpayerName,
        taxpayerType,
        description,
        custom_fields: [
          {
            display_name: "Taxpayer Name",
            variable_name: "taxpayer_name",
            value: taxpayerName
          },
          {
            display_name: "Donation Purpose",
            variable_name: "purpose",
            value: description || `Support ${taxpayerType === 'individual' ? 'an individual taxpayer' : 'a small business'}`
          }
        ]
      }
    };

    const response = await fetch('https://api.paystack.co/transaction/initialize', {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${PAYSTACK_SECRET_KEY}`,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(paymentData)
    });

    const data = await response.json();

    if (data.status) {
      res.json({ 
        url: data.data.authorization_url, 
        reference: data.data.reference,
        access_code: data.data.access_code
      });
    } else {
      console.error('Paystack initialization failed:', data);
      res.status(400).json({ error: data.message || 'Failed to initialize payment' });
    }
  } catch (error) {
    console.error('Checkout error:', error);
    res.status(500).json({ error: 'Failed to create checkout session' });
  }
});

app.get('/api/payment/verify/:reference', async (req, res) => {
  try {
    const { reference } = req.params;

    if (!PAYSTACK_SECRET_KEY) {
      return res.status(500).json({ error: 'Paystack not configured' });
    }

    const response = await fetch(`https://api.paystack.co/transaction/verify/${reference}`, {
      headers: {
        'Authorization': `Bearer ${PAYSTACK_SECRET_KEY}`,
        'Content-Type': 'application/json'
      }
    });

    const data = await response.json();

    if (data.status && data.data.status === 'success') {
      res.json({
        status: 'success',
        message: 'Payment verified successfully',
        data: {
          reference: data.data.reference,
          amount: data.data.amount / 100,
          customer_email: data.data.customer.email,
          paid_at: data.data.paid_at
        }
      });
    } else {
      res.status(400).json({ 
        status: 'error', 
        message: 'Payment verification failed',
        transaction_status: data.data?.status
      });
    }
  } catch (error) {
    console.error('Verification error:', error);
    res.status(500).json({ error: 'Verification failed' });
  }
});

app.use((req, res) => {
  res.sendFile(path.join(__dirname, '..', 'index.html'));
});

app.listen(PORT, '0.0.0.0', () => {
  console.log(`Server running on http://0.0.0.0:${PORT}`);
  if (!PAYSTACK_SECRET_KEY) {
    console.warn('Warning: PAYSTACK_SECRET_KEY not set. Payment features will not work.');
  } else {
    console.log('Paystack integration ready');
  }
});
