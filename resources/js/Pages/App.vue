<script setup>
import MainLayout from "../Layouts/MainLayout.vue";
import ProductNavBar from "../Components/ProductNavBar.vue";
import BenefitsBlock from "../Components/BenefitsBlock.vue";
import {useI18n} from "vue-i18n";
const { t, messages } = useI18n();

defineProps({
    products: {
        type: Array,
        required: false
    },
    navbarList:{
        type: Array,
        required: false
    }
});

const features = [
    { key: 'wifi' },
    { key: 'usb' },
    { key: 'mesh' },
    { key: 'sfp' },
    { key: 'multiWAN' },
    { key: 'vpn' }
];

</script>

<template>
    <MainLayout :navbar-items="navbarList">
        <div v-for="product in products" :key="product.id" class="product-item">
            <div class="details">
                <p class="product-title">{{ product.Title }}</p>
                <p class="product-description"> {{ product.Model_Index }}</p>
            </div>

            <img :src="product.image_url" alt="Product Image" class="product-image"/>
            <ProductNavBar class="navbar"/>
        </div>
        <div class="container">
            <div class="benefits">
                <div class="stability">
                    <p class="stability-title">{{ $t('product.description.title') }}
                    </p>
                    <p class="stability-moto">Power your home with futuristic connectivity
                    </p>
                </div>
                <div class="stability-description">
                    <p class="stability-description__full">{{
                             $t('product.description.text')
                        }}
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="benefits">
                <div class="stability">
                    <p class="stability-title">{{ $t('product.features.title') }}
                    </p>
                    <p class="stability-moto">Smart. Secure. Seamless
                    </p>
                </div>
                <div class="stability-description">
                    <p class="stability-description__full"> {{ $t('product.features.points[1]')}}</p>
                </div>
            </div>
        </div>
        <div class="benefits-container">
            <div class="benefits-container">
                <BenefitsBlock v-for="(feature, index) in features" :key="index">
                    <template #title>{{ $t(`product.technicalFeatures.${feature.key}.title`) }}</template>
                    <template #description>{{ $t(`product.technicalFeatures.${feature.key}.description`) }}</template>
                </BenefitsBlock>
            </div>
        </div>
    </MainLayout>

</template>

<style scoped>
    .benefits-container {
        background: #fafbfb;
        padding: 20px;
        max-width: 1460px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }


.benefits {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.stability-description {
    max-width: 667px;
}

.stability-title {
    color: #309dd8;
    font-size: 2.5rem;
    font-weight: 300;
    line-height: 1.2;
    margin-bottom: 1rem;
}

.stability-description__full {
    line-height: 1.5;
    margin-bottom: 1.5rem;
    font-size: 20px;
}

.stability-moto {
    color: #000;
    font-size: 1.25rem;
    font-weight: 300;
    margin: 0 0 30px;
    text-transform: uppercase;
}

.container {
    background: #fafbfb;
    padding: 20px;
    max-width: 1460px;
    margin: 0 auto;
}

.details {
    position: absolute;
    left: 20%;
    bottom: 33%;
    font-size: 3.375rem;
    text-align: justify;
    line-height: 1.1;
    margin-bottom: 2.625rem;
}


.product-item {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

.product-image {
    width: 100%;
    height: 90vh;
}


.navbar {
}
</style>
