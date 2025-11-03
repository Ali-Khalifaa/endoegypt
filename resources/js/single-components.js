import './bootstrap';
import { createApp } from 'vue';
import i18n from './lang/web.js';
import jq from "jquery"
window.$ = window.jQuery = jq;

window.axios.defaults.headers.common['lang'] = 'XMLHttpRequest';

const app = createApp({});

import completeRegister from './views/website/completeRegister.vue';
import register from './views/website/register.vue';
import login from './views/website/Login.vue';
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';

import Select from 'primevue/select';
import ErrorMessage from "./components/ErrorMessage.vue";
import VueTelInput from 'vue-tel-input';
import 'vue-tel-input/vue-tel-input.css';
import ContactForm from './views/website/contactForm.vue';
import EventForm from './views/website/EventForm.vue';

const globalOptions = {
    mode: 'auto',
};

app.component('contact-form', ContactForm);
app.component('event-form', EventForm);
app.component('complete-register', completeRegister);
app.component('register', register);
app.component('login', login);
app.use(i18n);
app.component('Select', Select)
app.component("error-message", ErrorMessage);
app.use(VueTelInput, globalOptions);


app.use(PrimeVue, {
    theme: {
        preset: Aura
    },

});
app.mount('#app');



