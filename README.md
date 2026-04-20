# Agency Skillmind

A starter platform for a salary-based AI workforce marketplace.

## Stack
- Frontend: Vue 3 + Vite
- Backend: PHP 8.3
- Workflows: n8n

## Product scope
- Predefined AI job agents (Receptionist, Data Entry Clerk, HR Assistant, OCR Agent)
- Dedicated agents per client
- Salary-based token allocation
- Overtime billing beyond included token limits
- Custom premium job-description onboarding

## Repository structure
- `frontend/` Vue 3 app
- `backend/` PHP API starter
- `n8n/` workflow templates
- `docs/` scoping and architecture notes

## Run locally
### Frontend
```bash
cd frontend
npm install
npm run dev
```

### Backend
```bash
cd backend
php -S localhost:8000 -t public
```

## Next build steps
1. Add authentication and tenancy
2. Add usage metering and billing
3. Connect n8n webhooks for onboarding and task orchestration
4. Integrate WhatsApp, calendar, and CRM channels
