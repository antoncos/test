import {createApp} from "vue"
import App from './src/App.vue'
import PrimeVue from "primevue/config"
import router from './src/router/index.ts'
import ToastService from "primevue/toastservice";

import 'primevue/resources/themes/md-light-indigo/theme.css'
import 'primevue/resources/primevue.min.css'
import '../css/app.less'


const app = createApp(App)
app.use(PrimeVue);
app.use(ToastService)
app.use(router)
app.mount('#app')
