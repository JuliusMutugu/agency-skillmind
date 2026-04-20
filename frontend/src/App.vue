<template>
  <div class="app-shell">
    <aside class="sidebar">
      <div class="brand-row">
        <div class="brand-mark">✦</div>
        <div class="brand-block">
          <div class="brand-text">skillmind</div>
          <div class="brand-subtext">AI workforce</div>
        </div>
      </div>

      <nav class="primary-nav">
        <button v-for="item in navItems" :key="item.label" class="nav-item" :class="{ active: item.active }">
          <span class="nav-icon">{{ item.icon }}</span>
          <span>{{ item.label }}</span>
          <span v-if="item.badge" class="nav-badge">{{ item.badge }}</span>
        </button>
      </nav>

      <div class="sidebar-section">
        <div class="section-row">
          <div class="section-label">Projects</div>
          <span class="section-plus">＋</span>
        </div>
        <button class="project-link">New project</button>
      </div>

      <div class="sidebar-section grow">
        <div class="section-row">
          <div class="section-label">All tasks</div>
          <span class="section-plus muted">⌁</span>
        </div>

        <div class="empty-state">
          <div class="empty-box">⌲</div>
          <p>Create a new task to get started</p>
        </div>
      </div>

      <div class="sidebar-footer">
        <div class="invite-card">
          <div>
            <div class="invite-title">Share Skillmind with a friend</div>
            <div class="invite-subtitle">Get 500 credits each</div>
          </div>
          <span>›</span>
        </div>

        <div class="footer-mini-nav">
          <span>⌂</span>
          <span>⌘</span>
          <span>◫</span>
        </div>
      </div>
    </aside>

    <main class="workspace">
      <header class="workspace-topbar">
        <div>
          <div class="page-title">Agent</div>
        </div>
        <div class="topbar-actions">
          <div class="usage-pill">12,400 / 20,000 tokens</div>
          <button class="ghost-btn" @click="showSettings = true">Settings</button>
        </div>
      </header>

      <section class="agent-stage" v-if="view === 'agent'">
        <div class="ambient ambient-left"></div>
        <div class="ambient ambient-right"></div>

        <div class="agent-illustration">
          <div class="bubble bubble-1">WA</div>
          <div class="bubble bubble-2">TG</div>
          <div class="bubble bubble-3">MS</div>
          <div class="bubble bubble-4">SL</div>

          <div class="device-frame">
            <div class="device-screen-glow"></div>
            <div class="device-card">
              <div class="device-avatar">✦</div>
              <div class="device-content">
                <div class="device-name">Skillmind <span class="verified">●</span></div>
                <div class="device-line"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="stage-copy">
          <div class="eyebrow-pill">Dedicated AI employees for business</div>
          <h1 class="headline">Deploy your agent for business</h1>
          <p class="subheadline">Run dedicated AI receptionists, data-entry clerks, assistants, and custom workflow agents inside messaging, operations, and client support channels.</p>
        </div>

        <div class="feature-grid">
          <article class="feature-card" v-for="feature in features" :key="feature.title">
            <div class="feature-icon-wrap">
              <div class="feature-icon">{{ feature.icon }}</div>
              <span class="feature-chip">{{ feature.tag }}</span>
            </div>
            <h3>{{ feature.title }}</h3>
            <p>{{ feature.description }}</p>
          </article>
        </div>

        <div class="cta-row">
          <button class="cta-btn">Get started</button>
          <button class="secondary-btn">View marketplace</button>
        </div>

        <div class="coming-soon">
          <span class="line"></span>
          <span class="coming-soon-label">Coming soon</span>
          <span class="line"></span>
        </div>

        <div class="channels">
          <span>WhatsApp</span>
          <span>Messenger</span>
          <span>Telegram</span>
        </div>
      </section>

      <div class="modal-backdrop" v-if="showSettings" @click.self="showSettings = false">
        <div class="settings-modal">
          <aside class="settings-sidebar">
            <div class="profile-block">
              <div class="avatar">J</div>
              <div>
                <div class="profile-name">Julius Ndai</div>
                <div class="profile-type">Personal</div>
              </div>
            </div>

            <div class="settings-links">
              <button v-for="item in settingsNav" :key="item" class="settings-link" :class="{ active: item === 'Settings' }">
                <span class="settings-icon">•</span>
                <span>{{ item }}</span>
              </button>
            </div>

            <div class="help-row">Get help ↗</div>
          </aside>

          <section class="settings-content">
            <div class="settings-header-row">
              <h2>Settings</h2>
              <button class="close-btn" @click="showSettings = false">×</button>
            </div>

            <div class="settings-section">
              <div class="settings-section-label">General</div>
              <label class="field-label">Language</label>
              <div class="select-field">English <span>⌄</span></div>
            </div>

            <div class="settings-section">
              <label class="field-label">Appearance</label>
              <div class="appearance-options">
                <button class="appearance-card active">
                  <div class="appearance-preview light"></div>
                  <span>Light</span>
                </button>
                <button class="appearance-card">
                  <div class="appearance-preview dark"></div>
                  <span>Dark</span>
                </button>
                <button class="appearance-card">
                  <div class="appearance-preview system"></div>
                  <span>Follow System</span>
                </button>
              </div>
            </div>

            <div class="settings-section">
              <div class="settings-section-label">Communication preferences</div>

              <div class="toggle-row">
                <div>
                  <div class="toggle-title">Receive product updates</div>
                  <div class="toggle-copy">Receive early access to feature releases and success stories to optimize your workflow.</div>
                </div>
                <button class="toggle-switch on"><span></span></button>
              </div>

              <div class="toggle-row">
                <div>
                  <div class="toggle-title">Email me when my queued task starts</div>
                  <div class="toggle-copy">When enabled, we will send a timely email once your task finishes queuing and begins processing.</div>
                </div>
                <button class="toggle-switch on"><span></span></button>
              </div>
            </div>

            <div class="settings-section cookies-row">
              <div class="toggle-title">Manage Cookies</div>
              <button class="manage-btn">Manage</button>
            </div>
          </section>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const showSettings = ref(true)
const view = ref('agent')

const navItems = [
  { label: 'New task', icon: '✎', active: false },
  { label: 'Agent', icon: '◉', active: true },
  { label: 'Search', icon: '⌕', active: false },
  { label: 'Library', icon: '▤', active: false, badge: '3' },
]

const features = [
  {
    icon: '◫',
    tag: 'Identity',
    title: 'Brand-consistent AI identity',
    description: 'Trained on your workflows, tone, escalation rules, and client-facing standards.',
  },
  {
    icon: '▭',
    tag: 'Memory',
    title: 'Persistent memory & computer',
    description: '24/7 cloud assistant that keeps context across tasks, channels, and operations.',
  },
  {
    icon: '✣',
    tag: 'Skills',
    title: 'Custom skills',
    description: 'Equip your assistant with expert knowledge for reception, support, operations, and admin work.',
  },
  {
    icon: '◌',
    tag: 'Channels',
    title: 'Works in your messenger',
    description: 'Available on Telegram, Line, Slack, WhatsApp, and more deployment channels soon.',
  },
]

const settingsNav = [
  'Account',
  'Settings',
  'Usage & Billing',
  'Scheduled tasks',
  'Mail Manus',
  'Data controls',
  'My Computer',
  'Cloud browser',
  'Personalization',
  'Skills',
  'Connectors',
  'Integrations',
]
</script>

<style scoped>
:global(body) {
  margin: 0;
  font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  background: #ececec;
  color: #272524;
}

:global(*) {
  box-sizing: border-box;
}

button {
  font: inherit;
}

.app-shell {
  display: grid;
  grid-template-columns: 258px 1fr;
  min-height: 100vh;
  background: #ededed;
}

.sidebar {
  background: linear-gradient(180deg, #ebebeb 0%, #e7e7e7 100%);
  border-right: 1px solid #d7d7d7;
  padding: 18px 12px 16px;
  display: flex;
  flex-direction: column;
}

.brand-row {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 20px;
  padding: 4px 8px 10px;
}

.brand-mark {
  width: 26px;
  height: 26px;
  border-radius: 999px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #111111, #2a2a2a);
  color: white;
  font-size: 12px;
  box-shadow: 0 8px 18px rgba(0,0,0,0.15);
}

.brand-text {
  font-size: 16px;
  font-weight: 700;
  letter-spacing: -0.02em;
}

.brand-subtext {
  font-size: 12px;
  color: #8c8a86;
  margin-top: 2px;
}

.primary-nav,
.settings-links {
  display: grid;
  gap: 6px;
}

.nav-item,
.settings-link,
.project-link,
.ghost-btn,
.close-btn,
.manage-btn,
.secondary-btn,
.cta-btn {
  border: 0;
  background: transparent;
  color: #3d3b38;
}

.nav-item {
  display: flex;
  align-items: center;
  gap: 12px;
  text-align: left;
  padding: 10px 12px;
  border-radius: 12px;
  cursor: pointer;
  transition: 0.2s ease;
}

.nav-item.active,
.settings-link.active {
  background: #dddddd;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.45);
}

.nav-badge {
  margin-left: auto;
  min-width: 18px;
  height: 18px;
  border-radius: 999px;
  background: #d1d1d1;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
}

.nav-icon {
  width: 16px;
  text-align: center;
  opacity: 0.85;
}

.sidebar-section {
  margin-top: 24px;
}

.section-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 6px;
  margin-bottom: 8px;
}

.section-label,
.section-plus {
  color: #999791;
  font-size: 13px;
}

.section-plus.muted {
  opacity: 0.7;
}

.project-link {
  width: 100%;
  text-align: left;
  padding: 10px 12px;
  border-radius: 12px;
  cursor: pointer;
  background: rgba(255,255,255,0.3);
}

.grow {
  flex: 1;
}

.empty-state {
  height: 100%;
  min-height: 220px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 14px;
  color: #a4a29d;
  text-align: center;
  padding: 12px;
}

.empty-box {
  width: 42px;
  height: 42px;
  border: 2px dashed #bdbbb7;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.empty-state p {
  margin: 0;
  font-size: 13px;
}

.sidebar-footer {
  padding-top: 16px;
  display: grid;
  gap: 12px;
}

.invite-card {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: linear-gradient(180deg, #e3e3e3, #dddddd);
  border-radius: 14px;
  padding: 14px;
  font-size: 13px;
}

.invite-title {
  font-weight: 600;
}

.invite-subtitle {
  color: #8c8a86;
  margin-top: 2px;
}

.footer-mini-nav {
  display: flex;
  gap: 16px;
  color: #6f6b67;
  padding: 0 4px;
}

.workspace {
  position: relative;
  background: radial-gradient(circle at top center, #f6f6f6 0%, #f1f1f1 44%, #efefef 100%);
  overflow: hidden;
}

.workspace-topbar {
  height: 76px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 28px;
  position: relative;
  z-index: 2;
}

.page-title {
  font-size: 17px;
  font-weight: 600;
}

.topbar-actions {
  display: flex;
  align-items: center;
  gap: 10px;
}

.usage-pill,
.eyebrow-pill {
  display: inline-flex;
  align-items: center;
  border-radius: 999px;
  padding: 8px 12px;
  font-size: 12px;
  color: #696663;
  background: rgba(255,255,255,0.72);
  border: 1px solid #e0e0e0;
  backdrop-filter: blur(10px);
}

.ghost-btn {
  padding: 10px 14px;
  border-radius: 12px;
  background: rgba(255,255,255,0.82);
  border: 1px solid #dfdfdf;
  cursor: pointer;
}

.agent-stage {
  min-height: calc(100vh - 76px);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px 24px 72px;
  position: relative;
}

.ambient {
  position: absolute;
  width: 380px;
  height: 380px;
  border-radius: 999px;
  filter: blur(60px);
  opacity: 0.55;
}

.ambient-left {
  left: 10%;
  top: 18%;
  background: rgba(86, 169, 255, 0.12);
}

.ambient-right {
  right: 12%;
  top: 22%;
  background: rgba(132, 101, 250, 0.12);
}

.agent-illustration {
  position: relative;
  width: 286px;
  height: 224px;
  margin-bottom: 10px;
  z-index: 1;
}

.device-frame {
  position: absolute;
  left: 50%;
  top: 18px;
  transform: translateX(-50%);
  width: 164px;
  height: 176px;
  border: 4px solid #d2d2d2;
  border-radius: 30px;
  background: linear-gradient(180deg, rgba(255,255,255,0.8), rgba(244,244,244,0.7));
}

.device-screen-glow {
  position: absolute;
  inset: 22px;
  border-radius: 24px;
  background: linear-gradient(180deg, rgba(255,255,255,0.6), rgba(240,240,240,0.1));
}

.device-card {
  position: absolute;
  left: 50%;
  top: 50px;
  transform: translateX(-50%);
  width: 206px;
  background: rgba(248,248,248,0.96);
  border: 1px solid #e5e5e5;
  box-shadow: 0 18px 34px rgba(0,0,0,0.1);
  border-radius: 17px;
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 14px;
}

.device-avatar {
  width: 26px;
  height: 26px;
  border-radius: 999px;
  background: linear-gradient(135deg, #f2f2f2, #e7e7e7);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
}

.device-name {
  font-size: 13px;
  font-weight: 700;
}

.verified {
  font-size: 8px;
  vertical-align: middle;
  color: #327dff;
}

.device-line {
  width: 104px;
  height: 4px;
  border-radius: 999px;
  background: #dddddd;
  margin-top: 7px;
}

.bubble {
  position: absolute;
  width: 40px;
  height: 40px;
  border-radius: 999px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 11px;
  font-weight: 700;
  box-shadow: 0 10px 22px rgba(0,0,0,0.1);
}

.bubble-1 { left: 18px; top: 84px; background: #2dcf74; }
.bubble-2 { left: 74px; top: 30px; background: #2d9cf2; }
.bubble-3 { right: 38px; top: 18px; background: #3f7ef7; }
.bubble-4 { right: 8px; top: 88px; background: #6bcf8e; color: #155f31; }

.stage-copy {
  display: grid;
  justify-items: center;
  text-align: center;
  gap: 12px;
  position: relative;
  z-index: 1;
}

.headline {
  margin: 0;
  font-family: Georgia, 'Times New Roman', serif;
  font-size: 32px;
  font-weight: 600;
  color: #34312e;
}

.subheadline {
  margin: 0;
  max-width: 760px;
  font-size: 15px;
  line-height: 1.6;
  color: #7c7974;
}

.feature-grid {
  margin-top: 28px;
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 14px;
  width: min(900px, 100%);
  position: relative;
  z-index: 1;
}

.feature-card {
  background: linear-gradient(180deg, rgba(248,248,248,0.95), rgba(244,244,244,0.94));
  border: 1px solid #dddddd;
  border-radius: 18px;
  padding: 18px 16px 16px;
  box-shadow: 0 10px 24px rgba(0,0,0,0.04);
}

.feature-icon-wrap {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.feature-icon {
  width: 30px;
  height: 30px;
  border-radius: 10px;
  background: #ededed;
  display: flex;
  align-items: center;
  justify-content: center;
}

.feature-chip {
  font-size: 11px;
  color: #77736f;
  background: #efefef;
  padding: 5px 8px;
  border-radius: 999px;
}

.feature-card h3 {
  margin: 14px 0 8px;
  font-size: 15px;
  font-weight: 600;
}

.feature-card p {
  margin: 0;
  color: #7d7974;
  font-size: 14px;
  line-height: 1.5;
}

.cta-row {
  margin-top: 28px;
  display: flex;
  gap: 12px;
  position: relative;
  z-index: 1;
}

.cta-btn {
  background: #171717;
  color: white;
  border-radius: 14px;
  padding: 12px 22px;
  cursor: pointer;
  box-shadow: 0 10px 22px rgba(0,0,0,0.12);
}

.secondary-btn {
  background: rgba(255,255,255,0.8);
  border: 1px solid #dcdcdc;
  color: #2b2a28;
  border-radius: 14px;
  padding: 12px 20px;
  cursor: pointer;
}

.coming-soon {
  margin-top: 88px;
  display: flex;
  align-items: center;
  gap: 14px;
  color: #a19f9b;
  font-size: 13px;
}

.line {
  width: 86px;
  height: 1px;
  background: #dddddd;
}

.channels {
  margin-top: 10px;
  display: flex;
  gap: 20px;
  color: #716d69;
  font-size: 14px;
}

.modal-backdrop {
  position: absolute;
  inset: 0;
  background: rgba(33,33,33,0.2);
  backdrop-filter: blur(4px);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 28px;
  z-index: 4;
}

.settings-modal {
  width: min(1240px, 100%);
  min-height: 720px;
  background: #f6f6f6;
  border-radius: 28px;
  box-shadow: 0 26px 60px rgba(0,0,0,0.2);
  display: grid;
  grid-template-columns: 190px 1fr;
  overflow: hidden;
  border: 1px solid rgba(255,255,255,0.55);
}

.settings-sidebar {
  border-right: 1px solid #dfdfdf;
  padding: 22px 16px;
  background: #f7f7f7;
  display: flex;
  flex-direction: column;
}

.profile-block {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 18px;
  padding: 0 6px;
}

.avatar {
  width: 30px;
  height: 30px;
  border-radius: 999px;
  background: #8f63d8;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
}

.profile-name {
  font-size: 14px;
  font-weight: 500;
}

.profile-type {
  color: #9b9995;
  font-size: 12px;
}

.settings-link {
  width: 100%;
  text-align: left;
  padding: 9px 12px;
  border-radius: 10px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 10px;
}

.settings-icon {
  color: #999791;
}

.help-row {
  margin-top: auto;
  padding: 14px 10px 4px;
  color: #65625f;
  font-size: 14px;
}

.settings-content {
  padding: 28px 46px;
}

.settings-header-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-bottom: 18px;
  border-bottom: 1px solid #e1e1e1;
}

.settings-header-row h2 {
  margin: 0;
  font-size: 18px;
  font-weight: 600;
}

.close-btn {
  font-size: 28px;
  line-height: 1;
  cursor: pointer;
}

.settings-section {
  padding: 22px 0;
  border-bottom: 1px solid #e7e7e7;
}

.settings-section-label {
  color: #9b9995;
  font-size: 13px;
  margin-bottom: 10px;
}

.field-label {
  display: block;
  margin-bottom: 10px;
  font-size: 14px;
}

.select-field {
  width: 180px;
  background: #ededed;
  border-radius: 10px;
  padding: 10px 12px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.appearance-options {
  display: flex;
  gap: 18px;
}

.appearance-card {
  border: 0;
  background: transparent;
  display: grid;
  gap: 8px;
  justify-items: center;
  color: #7c7975;
  cursor: pointer;
}

.appearance-card.active .appearance-preview {
  border-color: #3482f6;
}

.appearance-preview {
  width: 76px;
  height: 50px;
  border-radius: 10px;
  border: 2px solid transparent;
  background: linear-gradient(90deg, #f5f5f5 0 50%, #e6e6e6 50% 100%);
}

.appearance-preview.dark {
  background: linear-gradient(90deg, #2e3136 0 50%, #1f2329 50% 100%);
}

.appearance-preview.system {
  background: linear-gradient(90deg, #f4f4f4 0 50%, #23262b 50% 100%);
}

.toggle-row,
.cookies-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 20px;
  padding: 16px 0;
}

.toggle-title {
  font-size: 15px;
  font-weight: 500;
}

.toggle-copy {
  margin-top: 6px;
  color: #979490;
  font-size: 13px;
  max-width: 680px;
  line-height: 1.45;
}

.toggle-switch {
  width: 42px;
  height: 24px;
  border: 0;
  border-radius: 999px;
  position: relative;
  background: #d1d1d1;
}

.toggle-switch span {
  position: absolute;
  top: 3px;
  left: 3px;
  width: 18px;
  height: 18px;
  border-radius: 999px;
  background: white;
}

.toggle-switch.on {
  background: #2f8cff;
}

.toggle-switch.on span {
  left: 21px;
}

.manage-btn {
  padding: 8px 14px;
  border: 1px solid #d8d8d8;
  border-radius: 10px;
  background: #f8f8f8;
  cursor: pointer;
}

@media (max-width: 1100px) {
  .feature-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .settings-modal {
    grid-template-columns: 1fr;
  }

  .settings-sidebar {
    display: none;
  }
}

@media (max-width: 800px) {
  .app-shell {
    grid-template-columns: 1fr;
  }

  .sidebar {
    display: none;
  }

  .feature-grid {
    grid-template-columns: 1fr;
  }

  .headline {
    text-align: center;
    font-size: 24px;
  }

  .subheadline {
    padding: 0 8px;
  }

  .cta-row {
    flex-direction: column;
  }
}
</style>
