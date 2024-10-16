import {createI18n, useI18n} from 'vue-i18n';
import en from './resources/lang/en/en.json';
import fr from './resources/lang/fr/fr.json';
import de from './resources/lang/de/de.json';

const messages = {
    en,
    fr,
    de,
};

const urlLocale = window.location.pathname.split('/')[1];
const validLocales = ['en', 'fr', 'de'];
const locale = validLocales.includes(urlLocale) ? urlLocale : 'en'; // Если язык не валиден, используем 'en'

const i18n = createI18n({
    locale,
    messages,
    legacy: false
});

export default i18n;
