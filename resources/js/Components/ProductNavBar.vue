<script setup>

</script>

<template>
  <div class="container">
    <nav class="navbar">
      <ul class="navbar-list">
        <li class="navbar-list__item"><a class="navbar-list__item-link" href="#">{{ $t('product.sections.benefits') }}</a></li>
        <li class="navbar-list__item"><a class="navbar-list__item-link" href="#">{{ $t('product.sections.features') }}</a></li>
        <li class="navbar-list__item"><a class="navbar-list__item-link" href="#">{{ $t('product.sections.keeneticOS') }}</a></li>
        <li class="navbar-list__item"><a class="navbar-list__item-link" href="#">{{ $t('product.sections.specifications') }}</a></li>
        <li class="navbar-list__item"><a class="navbar-list__item-link" href="#">{{ $t('product.sections.images') }}</a></li>
        <li class="navbar-list__item"><a class="navbar-list__item-link" href="#">{{ $t('product.sections.support') }}</a></li>
      </ul>
    </nav>
  </div>
</template>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  background: #fafbfb;
  padding: 20px;
  max-width: 1460px;
  margin: 0 auto;
}

.navbar {
  width: 100%;
}

.navbar-list {
  display: flex;
  justify-content: space-between;
}

.navbar-list__item {
  list-style-type: none;
}

.navbar-list__item-link {
  text-decoration: none;
  color: #333;
  transition: color 0.3s;
}

.navbar-list__item-link:hover {
  color: #007BFF;
}
</style>
