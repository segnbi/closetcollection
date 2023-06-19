<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  currentUrl: String
});
</script>

<template>
  <Link
    href="http://127.0.0.1:8000/admin/dashboard"
    class="group flex items-center p-2 hover:bg-black hover:bg-opacity-20 gap-2"
    :class="
      'http://127.0.0.1:8000/admin/dashboard' === currentUrl
        ? 'bg-black bg-opacity-20'
        : ''
    "
  >
    <span>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="1em"
        height="1em"
        viewBox="0 0 256 256"
        class="w-6 h-6 fill-black group-hover:opacity-100"
        :class="
          'http://127.0.0.1:8000/admin/dashboard' === currentUrl
            ? 'opacity-100'
            : 'opacity-80'
        "
      >
        <path
          fill=""
          d="M224 115.55V208a16 16 0 0 1-16 16h-40a16 16 0 0 1-16-16v-40a8 8 0 0 0-8-8h-32a8 8 0 0 0-8 8v40a16 16 0 0 1-16 16H48a16 16 0 0 1-16-16v-92.45a16 16 0 0 1 5.17-11.78l80-75.48l.11-.11a16 16 0 0 1 21.53 0a1.14 1.14 0 0 0 .11.11l80 75.48a16 16 0 0 1 5.08 11.78Z"
        />
      </svg>
    </span>
    <span
      class="relative top-[1px] text-black font-semibold group-hover:opacity-100"
      :class="
        'http://127.0.0.1:8000/admin/dashboard' === currentUrl
          ? 'opacity-100'
          : 'opacity-80'
      "
    >
      Tableau de bord
    </span>
  </Link>
</template>
