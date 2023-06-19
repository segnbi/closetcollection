<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  product: Object,
});
</script>

<template>
  <li class="relative flex flex-col justify-between">
    <div class="flex-auto">
      <Link
        :href="route('public.products.show', product.id)"
        class="bg-soapstone overflow-hidden group flex h-full py-3"
      >
        <img
          :src="`/assets/${product.images[0].path}`"
          alt=""
          class="scale-95 group-hover:scale-125 transition-transform ease-out duration-300 object-cover"
        />
      </Link>
    </div>

    <h2 class="mt-2">
      <Link :href="route('public.products.show', product.id)" class="leading-8">
        <span class="text-xl lg:text-base">{{ product.name }}</span> <br />
        <span class="text-lg lg:text-base">{{ product.price }}CFA</span>
      </Link>
    </h2>

    <span
      class="absolute top-0 bg-black text-golden-glow font-light inline-block px-3 py-[2px] lg:text-sm"
      >Top vente</span
    >
  </li>
</template>
