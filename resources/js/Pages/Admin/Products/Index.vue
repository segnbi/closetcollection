<script setup>
import { Head, router, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";

const props = defineProps({
  products: Array,
});

const deletePopup = ref(false)
const productToDeleteId = ref(null)

const setDeletePopup = (showPopup, productId) => {
  deletePopup.value = showPopup
  productToDeleteId.value = productId
}
</script>

<template>
  <Head title="Mes articles - " />
  <AdminLayout :currentUrl="$attrs.ziggy.location">
    <section class="flex justify-between items-center gap-3">
      <h1 class="text-2xl xl:text-3xl font-bold">
        Articles
        <span class="text-black-300">{{ products.length }}</span>
      </h1>
      <div class="flex gap-2 md:gap-3">
        <button
          class="py-1 flex items-center justify-center px-5 gap-1 bg-golden-glow font-semibold active:opacity-70"
          @click="router.get('/admin/products/create')"
        >
          <span class="inline-block w-5">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="32"
              height="32"
              viewBox="0 0 24 24"
              class="w-full h-full"
            >
              <g fill="none">
                <path
                  d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"
                />
                <path
                  fill="black"
                  d="M11 20a1 1 0 1 0 2 0v-7h7a1 1 0 1 0 0-2h-7V4a1 1 0 1 0-2 0v7H4a1 1 0 1 0 0 2h7v7Z"
                />
              </g>
            </svg>
          </span>

          <span class="text-black hidden md:inline-block">Nouvel article</span>
        </button>

        <button
          class="py-1 flex items-center justify-center px-5 gap-1 bg-black active:opacity-70 outline-golden-glow"
        >
          <span class="text-white hidden md:inline-block">Plus d'actions</span>

          <span class="inline-block w-7">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="32"
              height="32"
              viewBox="0 0 24 24"
              class="w-full h-full"
            >
              <g fill="none">
                <path
                  d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z"
                />
                <path
                  fill="white"
                  d="M6 10.5a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Zm6 0a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Zm6 0a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Z"
                />
              </g>
            </svg>
          </span>
        </button>
      </div>
    </section>

    <section class="bg-white mt-4 lg:mt-8">
      <table class="table-fixed w-full">
        <thead
          class="bg-golden-glow bg-opacity-30 text-left border-y border-golden-glow"
        >
          <tr>
            <th class="p-3 w-[28%] md:w-[15%] md:text-transparent font-normal">
              Image
            </th>
            <th class="hidden p-3 md:w-[25%] md:table-cell font-normal">Nom</th>
            <th class="p-3 w-[36%] md:w-[22%] font-normal">Prix</th>
            <th class="hidden p-3 md:w-[22%] md:table-cell font-normal">
              inventaire
            </th>
            <th class="p-3 w-[36%] md:w-[16%] md:text-transparent font-normal">
              Actions
            </th>
          </tr>
        </thead>

        <tbody>
          <Link
            href="#"
            v-for="product in products"
            :key="product.id"
            class="border-b border-alabaster table-row hover:bg-golden-glow hover:bg-opacity-20 group/link"
          >
            <td class="px-3 py-5 lg:py-3">
              <div class="bg-soapstone w-[60px] h-[60px] p-[6px] align-middle">
                <img
                  :src="`/assets/${product.images[0].path}`"
                  alt=""
                  class="w-full h-full object-cover"
                />
              </div>
            </td>
            <td class="hidden px-3 py-5 lg:py-3 align-middle md:table-cell">
              {{ product.name }}
            </td>
            <td class="px-3 py-5 lg:py-3 align-middle">
              {{ product.price }} CFA
            </td>
            <td class="hidden px-3 py-5 lg:py-3 align-middle md:table-cell">
              En stock
            </td>
            <td class="px-3 py-5 lg:py-3 align-middle">
              <Link
                :href="`/admin/products/${product.id}/edit`"
                class="bg-golden-glow p-1 rounded-full inline-flex mr-[6%] lg:mr-[15px] lg:bg-white lg:hover:bg-golden-glow lg:invisible lg:group-hover/link:visible group"
              >
                <span class="inline-block w-7">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                    class="w-full h-full fill-white lg:fill-golden-glow group-hover:fill-white"
                  >
                    <path
                      fill=""
                      d="M5 19h1.4l8.625-8.625l-1.4-1.4L5 17.6V19ZM19.3 8.925l-4.25-4.2L17.875 1.9L22.1 6.125l-2.8 2.8ZM3 21v-4.25l10.6-10.6l4.25 4.25L7.25 21H3ZM14.325 9.675l-.7-.7l1.4 1.4l-.7-.7Z"
                    />
                  </svg>
                </span>
              </Link>

              <a
                @click.prevent="setDeletePopup(true, product.id)"
                class="bg-golden-glow p-1 rounded-full inline-flex lg:bg-white lg:hover:bg-golden-glow lg:invisible lg:group-hover/link:visible group"
              >
                <span class="inline-block w-7">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                    class="w-full h-full fill-white lg:fill-golden-glow group-hover:fill-white"
                  >
                    <path
                      fill=""
                      d="M5 21V6H4V4h5V3h6v1h5v2h-1v15H5Zm2-2h10V6H7v13Zm2-2h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"
                    />
                  </svg>
                </span>
              </a>
            </td>
          </Link>
        </tbody>
      </table>
    </section>

    <div
      class="fixed top-0 left-0 w-screen h-screen bg-golden-glow-900 bg-opacity-60 z-50 flex"
      v-if="deletePopup"
    >
      <div class="bg-white p-5 w-[90%] m-auto max-w-sm">
        <p>
          <strong class="text-xl">Supprimer cet article ?</strong>
          <button class="float-right active:opacity-70 flex" @click="setDeletePopup(false, null)">
            <span class="inline-block w-6">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 24 24"
                class="w-full h-full"
              >
                <path
                  fill="currentColor"
                  d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"
                />
              </svg>
            </span>
          </button>
        </p>
        <p class="py-5">
          Une fois supprimés, vous ne pourrez pas restaurer ces articles.
        </p>
        <p class="flex flex-col gap-2 md:flex-row">
          <button
            @click="setDeletePopup(false, null)"
            class="border text-white bg-black px-10 py-1 text-lg w-full active:opacity-70"
          >
            Annuler
          </button>
          <button
            class="border text-white bg-red px-10 py-1 text-lg w-full active:opacity-70"
            @click="router.delete(`/admin/products/${productToDeleteId}`, {onSuccess: deletePopup = false})"
          >
            Supprimer
          </button>
        </p>
      </div>
    </div>
  </AdminLayout>
</template>
