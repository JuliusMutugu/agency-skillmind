<template>
  <div class="app-shell">
    <aside class="sidebar">
      <div class="brand-row">
        <div class="brand-mark">✦</div>
        <div class="brand-text">manus</div>
      </div>

      <nav class="primary-nav">
        <button v-for="item in navItems" :key="item.label" class="nav-item" :class="{ active: item.active }">
          <span class="nav-icon">{{ item.icon }}</span>
          <span>{{ item.label }}</span>
        </button>
      </nav>

      <div class="sidebar-section">
        <div class="section-label">Projects</div>
        <button class="project-link">＋ New project</button>
      </div>

      <div class="sidebar-section grow">
        <div class="section-label">All tasks</div>
      </div>

      <div class="sidebar-footer">
        <div class="invite-card">
          <div>
            <div class="invite-title">Share Skillmind with a friend</div>
            <div class="invite-subtitle">Get 500 credits each</div>
          </div>
          <span>›</span>
        </div>
      </div>
    </aside>

    <main class="workspace">
      <header class="workspace-topbar">
        <div class="page-title">Agent</div>
        <button class="ghost-btn" @click="showSettings = true">Settings</button>
      </header>

      <section class="agent-stage" v-if="view === 'agent'">
        <div class="agent-illustration">
          <div class="bubble bubble-1">◉</div>
          <div class="bubble bubble-2">◉</div>
          <div class="bubble bubble-3">◉</div>
          <div class="device-frame">
            <div class="device-card">
              <div class="device-avatar">✦</div>
              <div class="device-content">
                <div class="device-name">Skillmind <span class="verified">●</span></div>
                <div class="device-line"></div>
              </div>
            </div>
          </div>
        </div>

        <h1 class="headline">Deploy your agent for business</h1>

        <div class="feature-grid">
          <article class="feature-card" v-for="feature in features" :key="feature.title">
            <div class="feature-icon">{{ feature.icon }}</div>
            <h3>{{ feature.title }}</h3>
            <p>{{ feature.description }}</p>
          </article>
        </div>

        <button class="cta-btn">Get started</button>

        <div class="coming-soon">
          <span class="line"></span>
          <span class="coming-soon-label">Coming soon</span>
          <span class="line"></span>
        </div>

        <div class="channels">
          <span>WhatsApp</span>
          <span>Messenger</span>
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
                {{ item }}
              </button>
            </div>
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
  { label: 'Library', icon: '▤', active: false },
]

const features = [
  {
    icon: '◫',
    title: 'Brand-consistent AI identity',
    description: 'Trained on your workflows, integrated with your tools.',
  },
  {
    icon: '▭',
    title: 'Persistent memory & computer',
    description: '24/7 cloud assistant that keeps full context and memory.',
  },
  {
    icon: '✣',
    title: 'Custom skills',
    description: 'Equip your assistant with expert knowledge in specific areas.',
  },
  {
    icon: '◌',
    title: 'Works in your messenger',
    description: 'Available on Telegram, Line, Slack and more channels soon.',
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
  background: #efefef;
  color: #2d2b29;
}

button {
  font: inherit;
}

.app-shell {
  display: grid;
  grid-template-columns: 260px 1fr;
  min-height: 100vh;
  background: #efefef;
}

.sidebar {
  background: #e9e9e9;
  border-right: 1px solid #d8d8d8;
  padding: 22px 14px 18px;
  display: flex;
  flex-direction: column;
}

.brand-row {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 22px;
  padding: 0 4px;
}

.brand-mark {
  width: 22px;
  height: 22px;
  border-radius: 999px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #2d2b29;
  color: white;
  font-size: 12px;
}

.brand-text {
  font-size: 16px;
  font-weight: 600;
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
.manage-btn {
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
}

.nav-item.active,
.settings-link.active {
  background: #dedede;
}

.nav-icon {
  width: 16px;
  text-align: center;
  opacity: 0.8;
}

.sidebar-section {
  margin-top: 24px;
}

.section-label {
  color: #9a9894;
  font-size: 13px;
  margin-bottom: 10px;
  padding: 0 4px;
}

.project-link {
  width: 100%;
  text-align: left;
  padding: 10px 12px;
  border-radius: 12px;
  cursor: pointer;
}

.grow {
  flex: 1;
}

.sidebar-footer {
  padding-top: 16px;
}

.invite-card {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #e1e1e1;
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

.workspace {
  position: relative;
  background: #f3f3f3;
}

.workspace-topbar {
  height: 72px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 28px;
}

.page-title {
  font-size: 17px;
  font-weight: 600;
}

.ghost-btn {
  padding: 10px 14px;
  border-radius: 12px;
  background: #ffffff;
  border: 1px solid #dfdfdf;
  cursor: pointer;
}

.agent-stage {
  min-height: calc(100vh - 72px);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 32px 24px 72px;
}

.agent-illustration {
  position: relative;
  width: 270px;
  height: 210px;
  margin-bottom: 18px;
}

.device-frame {
  position: absolute;
  left: 50%;
  top: 16px;
  transform: translateX(-50%);
  width: 160px;
  height: 170px;
  border: 4px solid #d0d0d0;
  border-radius: 28px;
}

.device-card {
  position: absolute;
  left: 50%;
  top: 48px;
  transform: translateX(-50%);
  width: 195px;
  background: #f8f8f8;
  border: 1px solid #e2e2e2;
  box-shadow: 0 14px 30px rgba(0,0,0,0.08);
  border-radius: 16px;
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 14px;
}

.device-avatar {
  width: 24px;
  height: 24px;
  border-radius: 999px;
  background: #efefef;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
}

.device-name {
  font-size: 13px;
  font-weight: 600;
}

.verified {
  font-size: 8px;
  vertical-align: middle;
}

.device-line {
  width: 96px;
  height: 4px;
  border-radius: 999px;
  background: #dedede;
  margin-top: 7px;
}

.bubble {
  position: absolute;
  width: 38px;
  height: 38px;
  border-radius: 999px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 11px;
}

.bubble-1 { left: 28px; top: 58px; background: #2dcf74; }
.bubble-2 { left: 78px; top: 12px; background: #2d9cf2; }
.bubble-3 { right: 34px; top: 18px; background: #3f7ef7; }

.headline {
  margin: 0;
  font-family: Georgia, 'Times New Roman', serif;
  font-size: 28px;
  font-weight: 600;
  color: #393532;
}

.feature-grid {
  margin-top: 28px;
  display: grid;
  grid-template-columns: repeat(4, minmax(0, 1fr));
  gap: 12px;
  width: min(860px, 100%);
}

.feature-card {
  background: #f5f5f5;
  border: 1px solid #dddddd;
  border-radius: 18px;
  padding: 18px 16px 16px;
}

.feature-card h3 {
  margin: 14px 0 8px;
  font-size: 15px;
  font-weight: 500;
}

.feature-card p {
  margin: 0;
  color: #7d7974;
  font-size: 14px;
  line-height: 1.45;
}

.cta-btn {
  margin-top: 26px;
  border: 0;
  background: #171717;
  color: white;
  border-radius: 14px;
  padding: 12px 22px;
  cursor: pointer;
}

.coming-soon {
  margin-top: 100px;
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
  background: rgba(0,0,0,0.24);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 28px;
}

.settings-modal {
  width: min(1240px, 100%);
  min-height: 720px;
  background: #f6f6f6;
  border-radius: 26px;
  box-shadow: 0 26px 60px rgba(0,0,0,0.22);
  display: grid;
  grid-template-columns: 190px 1fr;
  overflow: hidden;
}

.settings-sidebar {
  border-right: 1px solid #dfdfdf;
  padding: 22px 16px;
  background: #f7f7f7;
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
}
</style>
