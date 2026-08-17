# Bismark Price Node React Rewrite

## Goal
Replace Laravel architecture with a Docker-first Node.js and React stack.

## New Stack

- Frontend: Next.js 16 + React + TypeScript
- Backend: NestJS + Prisma
- Database: PostgreSQL
- Cache: Redis
- Infrastructure: Docker Compose

## Migration Strategy

1. Keep Laravel main branch stable.
2. Build new architecture in rewrite-node-react-docker branch.
3. Migrate modules gradually.
4. Remove Laravel only after feature parity.

## Modules

- Authentication
- Users and permissions
- Products
- Parts warehouse
- Warranty
- CRM
- Reports
- AI integrations
