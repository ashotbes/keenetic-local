<template>
    <div class="container">
        <header>
            <div class="row header-row">
                <nav class="nav-menu">
                    <ul class="nav-menu__list">
                        <li>
                            <img class="logo" src="/logo-main-new.svg" alt="Logo"/>
                        </li>
                        <li v-for="(item, index) in navbarKeys" :key="index">
                            <a href="#">{{ $t(`navbar.${item}`) }}</a>
                        </li>
                        <li>
                            <div class="lang_list" ref="dropdownRef">
                                <ul class="dropdown-list">
                                    <li>
                                        <a href="#" @click.prevent="toggleDropdown">{{ selectedLang }}</a>
                                        <div class="lang-dropdown" :class="{ show: dropdownVisible }">
                                            <ul>
                                                <li v-for="language in languages" :key="language.code">
                                                    <a href="#" @click.prevent="changeLanguage(language.code)">{{ language.label }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
    <main>
        <slot></slot>
    </main>
</template>

<script setup>
import {ref, onMounted, onUnmounted} from 'vue'
import {useI18n} from 'vue-i18n'
import {router} from '@inertiajs/vue3'

// Получаем i18n
const {locale} = useI18n()

// Состояние для управления выпадающим меню
const dropdownVisible = ref(false)
const dropdownRef = ref(null)

// Доступные языки
const languages = [
    {code: 'en', label: 'ENG'},
    {code: 'fr', label: 'FRA'},
    {code: 'de', label: 'DEU'}
]

// Язык, который сейчас выбран
const selectedLang = ref(languages.find(lang => lang.code === locale.value)?.label || 'ENG')

// Ключи навигационного меню
const navbarKeys = ['keenetic_os', 'home_solutions', 'business_solutions', 'isp', 'products', 'how_it_works', 'support']

// Переключение видимости выпадающего меню
function toggleDropdown() {
    dropdownVisible.value = !dropdownVisible.value
}

// Изменение языка
function changeLanguage(lang) {
    dropdownVisible.value = false
    locale.value = lang // Устанавливаем язык
    selectedLang.value = languages.find(language => language.code === lang)?.label || 'ENG' // Обновляем отображаемый язык
    router.visit(`/${lang}`); // Перезагружаем страницу с новым языком
}

// Закрытие выпадающего меню при клике вне его
function handleClickOutside(event) {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
        dropdownVisible.value = false
    }
}

// Подписываемся на события при монтировании
onMounted(() => {
    document.addEventListener('click', handleClickOutside)
})

// Отписываемся от событий при размонтировании
onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside)
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100..900&display=swap');

.container {
    background: lightblue;
    max-width: 1460px;
    margin: 0 auto;
    padding-top: 20px;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.dropdown-list {
    z-index: 99;
    position: absolute;
}

a {
    text-decoration: none;
    color: black;
}

.logo {
    background: transparent url('/public/logo-main-new.svg') 50% no-repeat;
    background-size: contain;
    display: inline-block;
    height: 1.3rem;
    vertical-align: middle;
    width: 12rem;
}

.nav-menu__list {
    display: flex;
    justify-content: space-between;
    align-content: center;
}

.lang_list {
    position: relative;
}

.lang-dropdown {
    display: none;
    position: absolute;
    background-color: lightblue;
    padding: 10px;
    border-radius: 5px;
}

.lang-dropdown.show {
    display: block;
}
</style>
