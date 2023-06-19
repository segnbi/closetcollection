<script setup>
import { Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
  ziggy: Object
})
</script>

<template>
  <Head title="Tableau de bord - " />
  <AdminLayout :currentUrl="ziggy.location">
    Dashboard
  </AdminLayout>
</template>
