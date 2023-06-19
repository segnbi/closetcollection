<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const props = defineProps({
  errors: Object
})

const firstSection = ref(null);
const showNameInput = ref(true);
const imageLabel = ref('Ajouter des images')

const regExp = /images.*/

const handleImagesError = () => {
  for(const proprety in props.errors) {
    if(regExp.test(proprety)) {
      return props.errors.images = true
    }
  }
}

const handleImagesInput = (e) => {
  imageLabel.value = e.target.files.length + ' image(s) choisie(s)'
  form.images = e.target.files
  props.errors.images = null

  console.log(e.target.files)
}

const form = useForm({
  name: null,
  images: null,
  description: null,
  price: null
})

onMounted(() => {
  document.addEventListener("scroll", () => {
    if (firstSection.value && firstSection.value.getBoundingClientRect().top <= 48) {
      return showNameInput.value = false;
    }

    return showNameInput.value = true;
  });
});
</script>

<template>
  <Head title="Nouvel article - " />
  <AdminLayout :currentUrl="$attrs.ziggy.location">
    <form @submit.prevent="form.post(`/admin/products`, {onError: handleImagesError})">
      <section
        class="sticky top-[48px] py-4 xl:py-6 -mt-3 lg:-mt-6"
        ref="firstSection"
        :class="{ 'bg-alabaster bg-opacity-95 pb-2 xl:pb-3 z-10': !showNameInput }"
      >
        <p class="flex items-center text-sm gap-3">
          <Link href="/admin/products" class="hover:underline">
            Articles
          </Link>
          <span class="inline-block w-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="32"
              height="32"
              viewBox="0 0 1024 1024"
              class="w-full h-full"
            >
              <path
                fill=""
                d="M340.864 149.312a30.592 30.592 0 0 0 0 42.752L652.736 512L340.864 831.872a30.592 30.592 0 0 0 0 42.752a29.12 29.12 0 0 0 41.728 0L714.24 534.336a32 32 0 0 0 0-44.672L382.592 149.376a29.12 29.12 0 0 0-41.728 0z"
              />
            </svg>
          </span>
          <span>{{ form.name? form.name: 'Article sans nom' }}</span>
        </p>
        <Transition>
          <h1 v-if="showNameInput">
            <input
              type="name"
              placeholder="Article sans nom"
              id="#"
              autofocus="on"
              autocapitalize="sentences"
              class="focus:font-light focus:placeholder-black-200 xl:text-4xl xl:py-3 xl:font-black font-bold w-full bg-transparent py-1 placeholder-black outline-none border-b border-transparent hover:border-black hover:border-dashed text-xl focus:border-b focus:border-black focus:border-solid"
              v-model="form.name"
              @input="errors.name = null"
            />
          </h1>
        </Transition>
      </section>

      <section
        class="flex flex-col gap-5 lg:gap-7 lg:col-start-1 xl:grid xl:grid-cols-[2fr_1fr]"
      >
        <fieldset class="bg-white xl:col-start-1">
          <section class="px-5 py-3 border-b border-alabaster">
            <legend class="text-lg font-bold lg:text-xl">
              Images et vidéos
            </legend>
          </section>

          <section class="px-5 py-6 flex flex-col md:flex-row gap-5">
            <div class="md:flex-auto">
              <input
                type="file"
                multiple="multiple"
                id="images"
                class="hidden"
                @change="(e) => handleImagesInput(e)"
              />
              <label
                for="images"
                class="min-h-[100px] px-3 gap-4 flex justify-center items-center bg-golden-glow bg-opacity-30 hover:bg-opacity-50 md:h-full"
                :class="{'border border-red border-opacity-50': errors.images}"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 512 512"
                  class="w-[24px] fill-golden-glow"
                >
                  <ellipse
                    cx="373.14"
                    cy="219.33"
                    fill="none"
                    rx="46.29"
                    ry="46"
                  />
                  <path
                    fill=""
                    d="M80 132v328a20 20 0 0 0 20 20h392a20 20 0 0 0 20-20V132a20 20 0 0 0-20-20H100a20 20 0 0 0-20 20Zm293.14 41.33a46 46 0 1 1-46.28 46a46.19 46.19 0 0 1 46.28-46Zm-261.41 276v-95.48l122.76-110.2L328.27 337l-113 112.33Zm368.27 0H259l144.58-144L480 370.59Z"
                  />
                  <path
                    fill=""
                    d="M20 32A20 20 0 0 0 0 52v344a20 20 0 0 0 20 20h28V100a20 20 0 0 1 20-20h380V52a20 20 0 0 0-20-20Z"
                  />
                </svg>
                <span class="text-center uppercase text-sm">
                  {{ imageLabel }}
                </span>
              </label>
            </div>

            <div
              class="md:w-[1px] h-[1px] md:h-[120px] bg-alabaster md:flex-none"
            ></div>

            <div class="md:flex-auto">
              <input
                type="file"
                id="videos"
                class="hidden"
                disabled="disabled"
              />
              <label
                for="videos"
                class="min-h-[100px] gap-4 px-3 flex justify-center items-center bg-golden-glow bg-opacity-30 hover:bg-opacity-50 md:h-full opacity-40"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 1024 1024"
                  class="fill-golden-glow w-[28px]"
                >
                  <path
                    fill=""
                    d="m768 576l192-64v320l-192-64v96a32 32 0 0 1-32 32H96a32 32 0 0 1-32-32V480a32 32 0 0 1 32-32h640a32 32 0 0 1 32 32v96zM192 768v64h384v-64H192zm192-480a160 160 0 0 1 320 0a160 160 0 0 1-320 0zm64 0a96 96 0 1 0 192.064-.064A96 96 0 0 0 448 288zm-320 32a128 128 0 1 1 256.064.064A128 128 0 0 1 128 320zm64 0a64 64 0 1 0 128 0a64 64 0 0 0-128 0z"
                  />
                </svg>
                <span class="text-center uppercase text-sm">
                  Ajouter des videos
                </span>
              </label>
            </div>
          </section>
        </fieldset>

        <fieldset class="bg-white xl:col-start-1">
          <section class="px-5 py-3 border-b border-alabaster">
            <legend class="text-lg font-bold lg:text-xl">
              Détails de l'article
            </legend>
          </section>

          <section class="px-5 py-5">
            <h2 class="uppercase text-[13px] tracking-[2px] pb-2 lg:py-7">
              Informations de base
            </h2>
            <div class="flex flex-col gap-5">
              <div class="flex flex-col gap-5 lg:gap-7 md:flex-row">
                <p class="flex flex-col gap-2 lg:gap-3 flex-[3]">
                  <label for="name">Nom</label>
                  <input
                    type="text"
                    id="name"
                    placeholder="Ajouter un nom d'article"
                    class="focus:bg-transparent focus:ring-transparent focus:border-golden-glow border-golden-glow border-opacity-50 hover:bg-golden-glow hover:bg-opacity-30 py-1 placeholder-golden-glow-900 placeholder-opacity-50 placeholder"
                    :class="{'border-red focus:border-red': errors.name}"
                    @input="errors.name = null"
                    v-model="form.name"
                  />
                </p>

                <p class="flex flex-col gap-2 lg:gap-3 flex-[2] opacity-40">
                  <label for="ruban">Ruban</label>
                  <input
                    type="text"
                    id="ruban"
                    placeholder="Ex: Nouveauté"
                    disabled="disabled"
                    class="focus:bg-transparent focus:ring-transparent focus:border-golden-glow border-golden-glow border-opacity-50 hover:bg-golden-glow hover:bg-opacity-30 py-1 placeholder-golden-glow-900 placeholder-opacity-50 placeholder"
                  />
                </p>
              </div>

              <p class="flex flex-col gap-2 lg:gap-3">
                <label for="description">Description</label>
                <textarea
                  id="description"
                  rows="3"
                  autocomplete="autocomplete"
                  class="focus:bg-transparent focus:ring-transparent focus:border-golden-glow w-full resize-none border-golden-glow border-opacity-50 hover:bg-golden-glow hover:bg-opacity-30 py-1"
                  :class="{'border-red focus:border-red': errors.description}"
                  @input="errors.description = null"
                  v-model="form.description"
                ></textarea>
              </p>
            </div>
          </section>
        </fieldset>

        <fieldset class="bg-white xl:col-start-1">
          <section class="px-5 py-3 border-b border-alabaster">
            <legend class="text-lg font-bold lg:text-xl">Prix</legend>
          </section>

          <section class="px-5 py-5">
            <p class="flex flex-col gap-2 lg:gap-3 flex-[3] relative md:w-48">
              <label for="price" class="text-sm">Prix</label>
              <input
                type="text"
                id="price"
                maxlength="9"
                class="focus:bg-transparent focus:ring-transparent focus:border-golden-glow border-golden-glow border-opacity-50 hover:bg-golden-glow hover:bg-opacity-30 py-1 placeholder-golden-glow-900 placeholder-opacity-50"
                :class="{'border-red focus:border-red': errors.price}"
                @input="errors.price = null"
                v-model="form.price"
              />
              <span
                class="uppercase absolute right-[10px] top-[34px] xl:top-[38px]"
              >
                Cfa
              </span>
            </p>
          </section>
        </fieldset>

        <fieldset
          class="hidden xl:block bg-white xl:col-start-2 xl:row-start-1 xl:row-end-4"
        ></fieldset>
      </section>

      <section
        class="flex md:flex-row justify-end gap-3 flex-col py-4 mt-4 xl:py-10 xl:mt-10 border-t border-black-100"
      >
        <button
          class="text-white py-2 px-8 bg-black active:opacity-70 outline-golden-glow"
          @click.prevent="router.get('/admin/products')"
        >
          Annuler
        </button>

        <button
          type="submit"
          class="py-2 px-8 bg-golden-glow font-semibold active:opacity-70"
        >
          Enregistrer
        </button>
      </section>
    </form>
  </AdminLayout>
</template>

<style scoped>
.v-enter-active {
  transition: all .3s ease-out;
}

.v-enter-from,
.v-leave-to {
  transform: translateY(-10px);
  opacity: 0;
}
</style>