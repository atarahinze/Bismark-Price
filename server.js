require('dotenv').config();

const express = require('express');
const session = require('express-session');
const path = require('path');
const bcrypt = require('bcryptjs');
const mysql = require('mysql2/promise');

const app = express();
const PORT = Number(process.env.PORT || 3000);
const pool = mysql.createPool({
  host: process.env.DB_HOST || 'mysql', port: Number(process.env.DB_PORT || 3306),
  user: process.env.DB_USER || 'bismark', password: process.env.DB_PASSWORD || 'root',
  database: process.env.DB_NAME || 'bismark_price', waitForConnections: true, connectionLimit: 10
});

app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.use(express.static(path.join(__dirname, 'public')));
app.use(session({ secret: process.env.SESSION_SECRET || 'change-this-secret', resave: false, saveUninitialized: false, cookie: { httpOnly: true, sameSite: 'lax' } }));

app.get('/', (req, res) => res.redirect(req.session.user ? '/admin/dashboard' : '/admin/login'));
app.get('/health', (_req, res) => res.json({ status: 'ok', service: 'bismark-price-control' }));
app.get('/admin/login', (_req, res) => res.sendFile(path.join(__dirname, 'public', 'admin', 'login.html')));

app.post('/admin/login', async (req, res) => {
  const { email, password } = req.body;
  if (!email || !password) return res.redirect('/admin/login?error=1');
  try {
    const [rows] = await pool.execute('SELECT id, name, email, password, role FROM users WHERE email = ? LIMIT 1', [email]);
    const user = rows[0];
    if (!user || !(await bcrypt.compare(password, user.password))) return res.redirect('/admin/login?error=1');
    req.session.user = { id: user.id, name: user.name, email: user.email, role: user.role };
    req.session.save(() => res.redirect('/admin/dashboard'));
  } catch (error) {
    console.error(error);
    res.status(500).send('Database connection error');
  }
});

app.get('/admin/dashboard', (req, res) => {
  if (!req.session.user) return res.redirect('/admin/login');
  res.sendFile(path.join(__dirname, 'public', 'admin', 'dashboard.html'));
});
app.post('/admin/logout', (req, res) => req.session.destroy(() => res.redirect('/admin/login')));
app.listen(PORT, () => console.log(`Bismark Price Control running on http://localhost:${PORT}`));
