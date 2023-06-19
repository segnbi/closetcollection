<script setup>
import ProductItem from "./ProductItem.vue";

const props = defineProps({
  products: Array,
});
</script>

<template>
  <ul
    class="w-[88%] m-auto grid grid-cols-[repeat(auto-fill,_minmax(150px,_1fr))] md:grid-cols-[repeat(auto-fill,_minmax(150px,_1fr))] gap-4 md:gap-10 lg:grid-cols-[repeat(auto-fill,_minmax(200px,_1fr))] lg:gap-14 lg:w-[83%]"
  >
    <ProductItem
      v-for="product in products"
      :product="product"
      :key="product.id"
    />
  </ul>
</template>
