<script setup>
import { onMounted } from 'vue';
import HeaderComponent from '@/Components/HeaderComponent.vue';
import FooterComponent from '@/Components/FooterComponent.vue';

const initCart = () => {
  if(!localStorage.getItem('cart')) {
    return localStorage.setItem('cart', JSON.stringify([]))
  }
}

onMounted(() => {
  initCart();
});

</script>

<template>
  <div class="bg-black px-6 py-4">
    <p class="text-white text-center text-sm">
      Vente lancée! -25% sur tout le site en utilisant TEES25 à la caisse.
    </p>
  </div>

  <HeaderComponent/>
  <slot />

  <FooterComponent />
</template>
