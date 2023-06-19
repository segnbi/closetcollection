<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  currentUrl: String
});
</script>

<template>
  <Link
    href="http://127.0.0.1:8000/admin/products"
    class="group flex items-center p-2 hover:bg-black hover:bg-opacity-20 gap-2"
    :class="
      'http://127.0.0.1:8000/admin/products' === currentUrl
        ? 'bg-black bg-opacity-20'
        : ''
    "
  >
    <span>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="1em"
        height="1em"
        viewBox="0 0 24 24"
        class="w-6 h-6 fill-black group-hover:opacity-100"
        :class="
          'http://127.0.0.1:8000/admin/products' === currentUrl
            ? 'opacity-100'
            : 'opacity-80'
        "
      >
        <path
          fill=""
          d="m14.514 5l2.606-2.607a1 1 0 0 1 1.414 0l4.243 4.243a1 1 0 0 1 0 1.414l-3.778 3.778V21a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1v-9.17L1.22 8.05a1 1 0 0 1 0-1.414l4.242-4.243a1 1 0 0 1 1.414 0L9.484 5h5.03Z"
        />
      </svg>
    </span>
    <span
      class="relative top-[1px] text-black font-semibold group-hover:opacity-100"
      :class="
        'http://127.0.0.1:8000/admin/products' === currentUrl
          ? 'opacity-100'
          : 'opacity-80'
      "
    >
      Articles
    </span>
  </Link>
</template>
