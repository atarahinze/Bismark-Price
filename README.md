# Bismark Price Control System

سیستم مدیریت و کنترل قیمت محصولات بیسمارک.

## Technology Stack

- Node.js 22+
- Express 5
- MySQL 8
- Docker / Docker Compose
- HTML/CSS/JavaScript

## Current Module

### Admin Authentication

- Admin login
- Session-based authentication
- Protected admin dashboard
- Logout
- MySQL-backed users

## Run with Docker

```bash
docker compose up --build
```

Application: `http://localhost:3000`

Admin login: `http://localhost:3000/admin/login`

Health check: `http://localhost:3000/health`

## Development

```bash
npm install
npm run dev
```

## Project Direction

Laravel has been removed from the application. Node.js is now the backend runtime and Express is the web framework.

Planned modules:

- Product Price Management
- Price History
- User Management
- Reports
- System Settings
