<script setup>
import HeaderComponent from "@/Components/Admin/HeaderComponent.vue";
import AsideNavigation from "@/Components/Admin/AsideNavigation.vue";
import { ref } from "vue";

defineProps({
  currentUrl: String,
});

const asideNavigation = ref(false);
</script>

<template>
  <div class="first lg:grid lg:grid-cols-[320px_1fr] lg:grid-rows-[59px_1fr]">
    <AsideNavigation
      @close-btn-clicked="asideNavigation = !asideNavigation"
      :asideNavigation="asideNavigation"
      :currentUrl="currentUrl"
      class="z-50"
    />
    <HeaderComponent
      @menu-btn-clicked="asideNavigation = !asideNavigation"
      class="lg:col-start-2 sticky top-0 z-30"
    />
    <main class="lg:col-start-2 bg-alabaster">
      <div class="w-[95%] mx-auto py-3 lg:py-7">
        <slot />
      </div>
    </main>
  </div>
</template>
