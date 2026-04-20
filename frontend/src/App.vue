<template>
  <div class="page">
    <aside class="sidebar">
      <div>
        <p class="eyebrow">AI Workforce Platform</p>
        <h1>Agency Skillmind</h1>
      </div>
      <nav>
        <a v-for="item in navItems" :key="item" href="#">{{ item }}</a>
      </nav>
      <div class="card dark">
        <p class="muted">Plan status</p>
        <h3>12,400 / 20,000 tokens</h3>
        <p class="small">Overtime starts after the monthly salary allocation is exhausted.</p>
      </div>
    </aside>

    <main class="main">
      <section class="hero card">
        <p class="pill">Salary-based AI Workforce</p>
        <h2>Hire ready-made AI agents that work from job descriptions, not prompts.</h2>
        <p class="lead">Dedicated Receptionists, Data Entry Clerks, HR Assistants, and custom premium agents with salary and overtime billing.</p>
        <textarea v-model="prompt" placeholder="Describe the role you want to hire..."></textarea>
        <div class="actions">
          <button>Generate Agent Plan</button>
          <button class="secondary">Import Job Description</button>
        </div>
      </section>

      <section>
        <div class="section-head">
          <div>
            <h3>Marketplace</h3>
            <p class="muted">Predefined agents optimized for common business roles</p>
          </div>
        </div>
        <div class="grid">
          <article v-for="agent in agents" :key="agent.name" class="card">
            <p class="eyebrow">{{ agent.category }}</p>
            <h4>{{ agent.name }}</h4>
            <p class="muted">{{ agent.summary }}</p>
            <div class="stats">
              <div>
                <span>Salary</span>
                <strong>{{ agent.salary }}</strong>
              </div>
              <div>
                <span>Tokens</span>
                <strong>{{ agent.tokens }}</strong>
              </div>
            </div>
          </article>
        </div>
      </section>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const prompt = ref('')
const navItems = ['Workspace', 'Marketplace', 'My Agents', 'Analytics', 'Billing', 'Integrations']
const agents = ref([
  { name: 'Receptionist Agent', category: 'Front Office', summary: 'Handles customer inquiries, booking, and lead qualification.', salary: 'KES 15,000 / mo', tokens: '120,000' },
  { name: 'Data Entry Clerk', category: 'Operations', summary: 'Processes forms, updates records, and validates repetitive data workflows.', salary: 'KES 22,000 / mo', tokens: '180,000' },
  { name: 'HR Assistant', category: 'People Ops', summary: 'Answers policy questions, schedules interviews, and manages onboarding checklists.', salary: 'KES 30,000 / mo', tokens: '220,000' },
  { name: 'OCR Agent', category: 'Back Office', summary: 'Extracts structured data from invoices, receipts, and operational documents.', salary: 'KES 50,000 / mo', tokens: '400,000' }
])
</script>

<style scoped>
.page { display: grid; grid-template-columns: 280px 1fr; min-height: 100vh; }
.sidebar { background: rgba(255,255,255,.88); border-right: 1px solid #e2e8f0; padding: 24px; display: flex; flex-direction: column; gap: 24px; }
.main { padding: 28px; display: grid; gap: 24px; }
.card { background: white; border: 1px solid #e2e8f0; border-radius: 28px; padding: 24px; box-shadow: 0 6px 20px rgba(15,23,42,.05); }
.dark { background: #0f172a; color: white; }
.eyebrow, .pill, .muted, .small, span { color: #64748b; }
.dark .muted, .dark .small { color: #cbd5e1; }
.pill { display: inline-block; padding: 6px 12px; background: #f1f5f9; border-radius: 999px; font-size: 12px; }
.hero h2 { font-size: 44px; line-height: 1.05; margin: 12px 0; max-width: 900px; }
.lead { font-size: 18px; color: #475569; max-width: 900px; }
textarea { width: 100%; min-height: 120px; margin-top: 16px; border: 1px solid #cbd5e1; border-radius: 18px; padding: 14px; font: inherit; }
.actions { display: flex; gap: 12px; margin-top: 14px; }
button { border: 0; background: #0f172a; color: white; padding: 12px 18px; border-radius: 18px; cursor: pointer; }
button.secondary { background: white; color: #0f172a; border: 1px solid #cbd5e1; }
nav { display: grid; gap: 8px; }
nav a { text-decoration: none; color: #0f172a; padding: 10px 12px; border-radius: 14px; }
nav a:hover { background: #f8fafc; }
.grid { display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 16px; }
.stats { display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 12px; margin-top: 16px; }
.stats div { background: #f8fafc; border-radius: 18px; padding: 12px; }
.stats strong { display: block; margin-top: 6px; }
@media (max-width: 900px) {
  .page { grid-template-columns: 1fr; }
  .sidebar { display: none; }
  .grid { grid-template-columns: 1fr; }
  .hero h2 { font-size: 32px; }
}
</style>
