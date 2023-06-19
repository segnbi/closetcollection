<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  currentUrl: String
});
</script>

<template>
  <Link
    href="#"
    class="group flex items-center p-2 gap-2 hover:bg-black hover:bg-opacity-20"
  >
    <span>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="1em"
        height="1em"
        viewBox="0 0 24 24"
        class="w-6 h-6 opacity-80 group-hover:opacity-100"
      >
        <path
          fill=""
          d="M9 20h11q.825 0 1.413-.588T22 18v-2H9v4ZM2 8h5V4H4q-.825 0-1.413.588T2 6v2Zm0 6h5v-4H2v4Zm2 6h3v-4H2v2q0 .825.588 1.413T4 20Zm5-6h13v-4H9v4Zm0-6h13V6q0-.825-.588-1.413T20 4H9v4Z"
        />
      </svg>
    </span>
    <span
      class="relative top-[1px] font-semibold opacity-80 group-hover:opacity-100"
    >
      Commandes
    </span>
  </Link>
</template>
