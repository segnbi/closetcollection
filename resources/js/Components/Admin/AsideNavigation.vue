<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import DashboardLink from "./DashboardLink.vue";
import ProductsLink from "./ProductsLink.vue";
import OrdersLink from "./OrdersLink.vue";
import SettingsLink from "./SettingsLink.vue";

defineEmits(["close-btn-clicked"]);

const props = defineProps({
  asideNavigation: Boolean,
  currentUrl: String,
});
</script>

<template>
  <aside
    class="fixed w-screen top-0 bg-golden-glow-900 h-screen lg:w-[320px] lg:visible lg:transition-none"
    :class="{
      'visible bg-opacity-80 transition-all duration-500': asideNavigation,
      'invisible bg-opacity-0 transition-all duration-500': !asideNavigation,
    }"
  >
    <div
      class="flex items-start lg:translate-x-0 lg:transition-none"
      :class="{
        'translate-x-0 transition-all duration-500': asideNavigation,
        '-translate-x-full transition-all duration-500': !asideNavigation,
      }"
    >
      <div class="lg:w-full bg-golden-glow h-screen w-[87%] py-3 px-4 max-w-sm">
        <nav class="h-full relative">
          <a
            href="http://127.0.0.1:8000/admin/dashboard"
            class="inline-block relative left-[10px] hover:opacity-80"
          >
            <ApplicationLogo class="w-[100px]" />
          </a>

          <ul class="flex flex-col gap-1 mt-8">
            <li>
              <DashboardLink :currentUrl="currentUrl" />
            </li>

            <li>
              <ProductsLink :currentUrl="currentUrl" />
            </li>

            <li>
              <OrdersLink :currentUrl="currentUrl" />
            </li>

            <li class="absolute bottom-0 w-full">
              <SettingsLink :currentUrl="currentUrl" />
            </li>
          </ul>
        </nav>
      </div>

      <button
        class="relative top-[17px] mx-3 lg:hidden"
        @click="$emit('close-btn-clicked')"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="1em"
          height="1em"
          viewBox="0 0 24 24"
          class="fill-white w-6 h-6"
        >
          <path
            fill=""
            d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"
          />
        </svg>
      </button>
    </div>
  </aside>
</template>
