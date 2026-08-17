# Bismark Price Control System

سیستم مدیریت و کنترل قیمت محصولات بیسمارک.

## Architecture

- Node.js 22+
- Express 5
- MySQL 8
- Docker Compose
- HTML/CSS/JavaScript

**Laravel is no longer used.**

## Local Development: One Database Source

The development environment uses **MySQL inside Docker** as the single source of truth.

Do **not** run the Bismark database from XAMPP at the same time. XAMPP MySQL is not required for this project.

Inside Docker:

- Node app: `bismark_app`
- MySQL: `bismark_mysql`
- Application port: `3000`
- MySQL host port: `3307`
- MySQL container port: `3306`
- Database: `bismark_price`
- Persistent Docker volume: `bismark_mysql_data`

The Node container connects to MySQL using `DB_HOST=mysql` and port `3306`. From Windows tools outside Docker, use `127.0.0.1:3307`.

## First-time Setup on Windows

Clone the repository into your local working directory, for example:

```powershell
cd D:\ai

git clone https://github.com/atarahinze/Bismark-Price.git
cd Bismark-Price
```

If the repository is already cloned:

```powershell
cd D:\ai\Bismark-Price
git pull origin main
```

Create the local environment file:

```powershell
Copy-Item .env.example .env
```

Edit `.env` and set a private `SESSION_SECRET` and local admin password.

## Start Everything

Make sure Docker Desktop is running, then:

```powershell
docker compose up --build -d
```

Check containers:

```powershell
docker compose ps
```

Check application health:

```powershell
curl http://localhost:3000/health
```

Open:

- Application: `http://localhost:3000`
- Admin login: `http://localhost:3000/admin/login`
- Health: `http://localhost:3000/health`

## Database

The initial schema is stored in `database/init/001_schema.sql` and is automatically executed by MySQL **only when the Docker MySQL data volume is initialized for the first time**.

If you intentionally want a completely fresh local database:

```powershell
docker compose down -v
docker compose up --build -d
```

**Warning:** `docker compose down -v` deletes the local Docker database volume and all data inside it.

To open a MySQL shell inside Docker:

```powershell
docker exec -it bismark_mysql mysql -u bismark -p bismark_price
```

For Windows applications such as MySQL Workbench, connect to:

- Host: `127.0.0.1`
- Port: `3307`
- Database: `bismark_price`
- User: `bismark`
- Password: the value of `DB_PASSWORD` in `.env`

## Local Source Synchronization

GitHub and the local folder are separate copies. A change made through ChatGPT/GitHub does **not** automatically modify your `D:` drive.

After changes are pushed to GitHub, synchronize your local checkout with:

```powershell
cd D:\ai\Bismark-Price
git pull origin main
```

Then rebuild/restart Docker when dependencies or Docker configuration changed:

```powershell
docker compose up --build -d
```

For source-only changes, the development bind mount exposes the local files directly to the container.

## Useful Commands

```powershell
# View application logs
docker compose logs -f app

# View MySQL logs
docker compose logs -f mysql

# Restart
docker compose restart

# Stop without deleting database data
docker compose down

# Rebuild application
docker compose up --build -d
```

## Important Rules

1. Use Docker MySQL for this project; do not switch between XAMPP MySQL and Docker MySQL.
2. Never commit `.env` or real passwords to GitHub.
3. Keep `DB_HOST=mysql` inside Docker.
4. Use `127.0.0.1:3307` only for database connections from Windows/host tools.
5. Pull GitHub changes before running the local project.
6. Rebuild Docker after changing `package.json`, `Dockerfile`, or `docker-compose.yml`.

## Current Module

### Admin Authentication

- Admin login
- Session-based authentication
- Protected admin dashboard
- Logout
- MySQL-backed users
- Login activity logging

## Planned Modules

- Product Price Management
- Price History
- User Management
- Reports
- System Settings
