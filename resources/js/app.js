import './bootstrap'

import './security-api'

import { createApp } from "vue"
import MessagePage from "./MessagePage.vue"

createApp(MessagePage).mount('#message-page');
