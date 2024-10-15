<template>
    <div class="benefits-block">
        <div class="benefits-block-title">
            <slot name="title"></slot>
        </div>
        <div class="benefits-block-description">
            <slot name="description"><p></p></slot>
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>

.benefits-block {
    flex: 1 1 calc(33.33% - 20px);
    margin: 10px;
    box-sizing: border-box;
    padding: 2rem 2rem 1.5rem;
}

.benefits-block-title {
    color: #309dd8;
    font-size: 2.5rem;
    font-weight: 300;
    line-height: 1.2;
    margin: 1.2rem 0 .8rem;
}

.benefits-block-description {
    line-height: 1.5;
    margin-bottom: 1.5rem;
    font-size: 20px;
}
</style>
