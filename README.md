# Bismark Price Control System

بازطراحی سیستم مدیریت قیمت بیسمارک با معماری جدید.

## Current Goal

ساخت یک سیستم ساده و قابل توسعه:

1. نمایش صفحه Login
2. احراز هویت کاربر
3. انتقال موفق به Dashboard
4. حذف هر قابلیت اضافه تا قبل از تکمیل هسته اصلی

## New Architecture

- Frontend: Next.js + React + TypeScript
- Backend: NestJS + Prisma
- Database: PostgreSQL (Docker Volume)
- Cache: Redis
- Runtime: Docker Compose

## Docker Services

- bismark_frontend
- bismark_backend
- bismark_postgres
- bismark_redis

## Authentication Flow

```
Login Page
    |
    | username/password
    v
Backend API
    |
    | JWT validation
    v
Dashboard
```

## Development Rules

- No unnecessary modules before core flow is complete.
- Laravel remains isolated in the old branch.
- New development continues only in rewrite-node-react-docker.

## Test Checklist

- [ ] Docker containers start successfully
- [ ] Frontend loads
- [ ] Login page works
- [ ] Authentication API works
- [ ] Dashboard route protection works
- [ ] Database connection works
