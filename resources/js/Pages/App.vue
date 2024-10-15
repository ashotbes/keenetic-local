<script setup>
import MainLayout from "../Layouts/MainLayout.vue";
import ProductNavBar from "../Components/ProductNavBar.vue";
import BenefitsBlock from "../Components/BenefitsBlock.vue";

defineProps({
    products: {
        type: Array,
        required: false
    }
});
</script>

<template>
    <MainLayout>
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
                    <p class="stability-title">Where stability meets speed
                    </p>
                    <p class="stability-moto">Power your home with futuristic connectivity
                    </p>
                </div>
                <div class="stability-description">
                    <p class="stability-description__full">A truly versatile Gigabit router with Mesh Wi-Fi 6 AX1800 for
                        connecting wireless clients at practical speeds of up to 900 Mbps, plus an independent spectrum
                        analyser to continuously monitor the airwaves and search for more open channels. Ready for fibre
                        Internet connectivity via an optional SFP module and for building a mesh Wi-Fi System with
                        Gigabit backhaul. The best combination of functionality, performance, ease of setup and price
                        for the home or small business.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="benefits">
                <div class="stability">
                    <p class="stability-title">Define your digital boundaries
                    </p>
                    <p class="stability-moto">Smart. Secure. Seamless
                    </p>
                </div>
                <div class="stability-description">
                    <p class="stability-description__full">A wide range of storage drives, LTE modems and printers can
                        be connected via USB 3.0 and 2.0 ports. 512 MB of RAM ensures stable simultaneous operation of a
                        media server, IntelliQoS service with traffic prioritisation by application, and the latest
                        range of VPN servers and clients, including IPsec and WireGuard at speeds of up to 200 Mbps.
                    </p>
                </div>
            </div>
        </div>
        <div class="benefits-container">
            <BenefitsBlock>
                <template #title>Wi-Fi 6 AX1800
                </template>
                <template #description>Equipped with the latest Wi-Fi 6 technology for faster speeds, increased
                    capacity and better performance in dense environments.
                </template>
            </BenefitsBlock>
            <BenefitsBlock>
                <template #title>USB 3.0+2.0 ports
                </template>
                <template #description>Do more with Keenetic! Connect a USB drive to enable network storage for seamless
                    file sharing and backup, create a media server for streaming content to Smart TVs or build a private
                    cloud for secure remote access to your data. Use USB modems for 4G connectivity or Keenetic
                    telephony adapter for VoIP functionality.
                </template>
            </BenefitsBlock>
            <BenefitsBlock>
                <template #title>Whole Home & Mesh Wi-Fi
                </template>
                <template #description>Say goodbye to dead zones with our Mesh Wi-Fi feature, which allows multiple
                    units to work seamlessly together to create consistent, robust wireless coverage throughout your
                    space.
                </template>
            </BenefitsBlock>
            <BenefitsBlock>
                <template #title>SFP slot
                </template>
                <template #description>We've included an SFP slot for fibre connectivity, ideal for businesses requiring high performance and long distance communications solutions.
                </template>
            </BenefitsBlock>
            <BenefitsBlock>
                <template #title>Multi-WAN
                </template>
                <template #description>Aggregate multiple Internet connections, increasing overall bandwidth and providing failover to ensure constant connectivity.
                </template>
            </BenefitsBlock>
            <BenefitsBlock>
                <template #title>Mixed-VPN clients/servers
                </template>
                <template #description>Secure your online activities and enjoy the flexibility of multiple VPN protocols. Whether you want to protect your privacy, work remotely or bypass geo-blocks, our product has you covered.
                </template>
            </BenefitsBlock>
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
    font-size: 3.5rem;
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
