import { createI18n } from 'vue-i18n';
import ar from "./translation/ar.json";
import en from "./translation/en.json";


const i18n = createI18n({
    locale: 'en', // set locale
    fallbackLocale: 'en', // set fallback locale
    legacy:false,
    messages: {
        en
    }
});


export default i18n;
