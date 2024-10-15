<template>
    <div class="container">
        <header>
            <div class="row header-row">
                <nav class="nav-menu">
                    <ul class="nav-menu__list">
                        <li>
                            <img class="logo" src="/logo-main-new.svg" alt="Logo"/>
                        </li>
                        <li>
                            <a href="https://keenetic.com/en/keenetic-os">KeeneticOS</a>
                        </li>
                        <li>
                            <a href="https://keenetic.com/en/home-solutions">Home Solutions</a>
                        </li>
                        <li>
                            <a href="https://keenetic.com/en/business-solutions">Business Solutions</a>
                        </li>
                        <li>
                            <a href="https://keenetic.com/en/keenetic-isp">ISP</a>
                        </li>
                        <li>
                            <a href="https://keenetic.com/en/products">Products</a>
                        </li>
                        <li>
                            <a href="https://keenetic.com/en/how-it-works">How It Works</a>
                        </li>
                        <li>
                            <a href="https://help.keenetic.com/hc/en-us">Support</a>
                        </li>
                        <li>
                            <div class="lang_list" ref="dropdownRef">
                                <ul>
                                    <li>
                                        <a href="#" @click="toggleDropdown">{{ selectedLang }}</a>
                                        <div class="lang-dropdown" :class="{ show: dropdownVisible }">
                                            <ul>
                                                <li><a @click="selectLang('ENG')">ENG</a></li>
                                                <li><a @click="selectLang('ESP')">ESP</a></li>
                                                <li><a @click="selectLang('FRA')">FRA</a></li>
                                                <li><a @click="selectLang('POL')">POL</a></li>
                                                <li><a @click="selectLang('ITA')">ITA</a></li>
                                                <li><a @click="selectLang('DEU')">DEU</a></li>
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
import { ref, onMounted, onUnmounted } from 'vue'

const dropdownVisible = ref(false)
const selectedLang = ref('ENG')

const dropdownRef = ref(null)

function toggleDropdown() {
    dropdownVisible.value = !dropdownVisible.value
}

function selectLang(lang) {
    selectedLang.value = lang
    dropdownVisible.value = false
}

function handleClickOutside(event) {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
        dropdownVisible.value = false
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside)
})

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
    padding-top: 12px;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
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
    align-items: center;
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
