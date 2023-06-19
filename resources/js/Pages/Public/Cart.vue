<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, computed, onBeforeMount } from "vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";

const cart = ref([]);
const submitPopup = ref(false);

const exclTaxTotal = computed(() => {
  let total = 0;

  for (const item of cart.value) {
    total += item.quantity * item.product.price;
  }

  return total;
});

const reduceItem = (itemId) => {
  const itemIndex = cart.value.findIndex((item) => item.product.id == itemId);
  --cart.value[itemIndex].quantity;
  return localStorage.setItem("cart", JSON.stringify(cart.value));
};

const addItem = (itemId) => {
  const itemIndex = cart.value.findIndex((item) => item.product.id == itemId);
  ++cart.value[itemIndex].quantity;
  return localStorage.setItem("cart", JSON.stringify(cart.value));
};

const removeItem = (itemId) => {
  const itemIndex = cart.value.findIndex((item) => item.product.id == itemId);
  cart.value.splice(itemIndex, 1);
  return localStorage.setItem("cart", JSON.stringify(cart.value));
};

const submit = () => {
  submitPopup.value = !submitPopup.value;
};

onBeforeMount(() => {
  cart.value = JSON.parse(localStorage.getItem("cart"));
});
</script>

<template>
  <Head title="Panier - " />
  <PublicLayout>
    <main class="px-5 md:p-8 lg:px-[150px]">
      <div v-if="cart.length" class="md:flex md:gap-14">
        <div class="md:flex-1 lg:flex-[2]">
          <h1 class="font-arialBlack border-b text-2xl py-3 md:text-xl">
            Mon panier
          </h1>
          <div>
            <ul>
              <li
                v-for="item in cart"
                :key="item.product.id"
                class="flex justify-between border-b py-8 lg:items-start lg:gap-5"
              >
                <div class="flex-none">
                  <div
                    class="bg-soapstone w-[100px] p-2 md:border md:border-black-200"
                  >
                    <img
                      :src="`/assets/${item.product.images[0].path}`"
                      alt=""
                      class="w-full"
                    />
                  </div>
                </div>

                <div class="lg:flex lg:gap-4 lg:flex-[5] lg:justify-between">
                  <div>
                    <p class="text-lg md:text-base">
                      {{ item.product.name }}
                    </p>

                    <p class="mt-2 mb-6 md:text-sm">
                      {{ item.product.price }}CFA
                    </p>
                  </div>

                  <div>
                    <div
                      class="flex border justify-between w-full max-w-[98px]"
                    >
                      <button
                        class="flex items-center px-1 disabled:opacity-20"
                        @click="reduceItem(item.product.id)"
                        :disabled="item.quantity == 1"
                      >
                        <span class="inline-block w-5 md:w-4">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 24 24"
                            class="w-full h-full"
                          >
                            <path fill="currentColor" d="M6 11h12v2H6z" />
                          </svg>
                        </span>
                      </button>

                      <input
                        type="text"
                        v-model="item.quantity"
                        class="w-10 text-center h-9 border-none focus:ring-0 md:text-sm lg:h-7"
                      />

                      <button
                        class="flex items-center px-1"
                        @click="addItem(item.product.id)"
                      >
                        <span class="inline-block w-5 md:w-4">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 24 24"
                            class="w-full h-full"
                          >
                            <path
                              fill="currentColor"
                              d="M18 11h-5V6h-2v5H6v2h5v5h2v-5h5z"
                            />
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </div>

                <div
                  class="flex flex-col items-end justify-between lg:flex-row-reverse lg:items-center lg:flex-[2] lg:justify-start lg:gap-8"
                >
                  <button
                    class="relative left-[6px] lg:flex lg:-top-[2px]"
                    @click="removeItem(item.product.id)"
                  >
                    <span class="inline-block w-7 md:w-5">
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

                  <p>
                    <strong
                      class="text-lg font-normal relative -top-3 md:text-base lg:static"
                      >{{ item.product.price * item.quantity }}CFA</strong
                    >
                  </p>
                </div>
              </li>
            </ul>

            <div class="md:flex md:flex-col md:gap-3 md:py-7">
              <p class="border-b py-6 md:border-none md:py-0">
                <button class="flex items-center gap-2">
                  <span class="inline-block w-6 md:w-4">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="32"
                      height="32"
                      viewBox="0 0 24 24"
                      class="w-full h-full"
                    >
                      <path
                        fill="currentColor"
                        d="M12.79 21L3 11.21v2.83l9.79 9.79l9.04-9.04l-1.42-1.41z"
                      />
                      <path
                        fill="currentColor"
                        d="m3 9.04l9.79 9.79l9.04-9.04L12.04 0H3v9.04zM7.25 3a1.25 1.25 0 1 1 0 2.5a1.25 1.25 0 0 1 0-2.5z"
                      />
                    </svg>
                  </span>
                  <span class="text-lg md:text-base">Saisir un code promo</span>
                </button>
              </p>

              <p class="border-b py-6 md:border-none md:py-0">
                <button class="flex items-center gap-2">
                  <span class="inline-block w-6 md:w-4">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="32"
                      height="32"
                      viewBox="0 0 24 24"
                      class="w-full h-full"
                    >
                      <path
                        fill="currentColor"
                        d="M14 10h5.5L14 4.5V10M5 3h10l6 6v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.11.89-2 2-2m0 9v2h14v-2H5m0 4v2h9v-2H5Z"
                      />
                    </svg>
                  </span>
                  <span class="text-lg md:text-base">Ajouter une note</span>
                </button>
              </p>
            </div>
          </div>
        </div>

        <div class="md:flex-1">
          <h2
            class="hidden md:block font-arialBlack border-b text-2xl py-3 md:text-xl"
          >
            Résumé de la commande
          </h2>

          <div class="flex flex-col gap-3 border-b py-5 md:gap-4">
            <p class="flex justify-between text-lg md:text-base">
              <span>Sous-total</span>
              <span>{{ exclTaxTotal }}CFA</span>
            </p>

            <p class="flex justify-between text-lg md:text-base">
              <span>Expédition</span>
              <span class="uppercase">Gratuit</span>
            </p>

            <p class="text-lg md:text-base md:relative md:-top-3">
              <a href="#" class="underline">Sénégal</a>
            </p>
          </div>

          <div class="pt-4 pb-10">
            <p class="flex justify-between text-2xl md:text-xl">
              <strong class="font-normal">Total</strong>
              <strong class="font-normal">{{ exclTaxTotal }}CFA</strong>
            </p>

            <p class="mt-6 mb-4">
              <button
                class="bg-black text-golden-glow w-full h-12 text-lg"
                @click="submit"
              >
                Paiement
              </button>
            </p>

            <p class="flex justify-center gap-1">
              <span class="inline-block w-5">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 24 24"
                  class="w-full h-full"
                >
                  <path
                    fill="currentColor"
                    d="M4 22V8h3V6q0-2.075 1.463-3.538T12 1q2.075 0 3.538 1.463T17 6v2h3v14H4ZM9 8h6V6q0-1.25-.875-2.125T12 3q-1.25 0-2.125.875T9 6v2Zm3 9q.825 0 1.413-.588T14 15q0-.825-.588-1.413T12 13q-.825 0-1.413.588T10 15q0 .825.588 1.413T12 17Z"
                  />
                </svg>
              </span>
              <strong class="font-normal">Paiement sécurisé</strong>
            </p>
          </div>
        </div>
      </div>

      <div v-else class="py-32">
        <p class="text-center">
          <strong class="text-2xl font-normal">Le panier est vide</strong>
        </p>
        <p class="text-center">
          <Link href="/" class="underline">Continuer à parcourir le site</Link>
        </p>
      </div>
    </main>

    <div
      class="fixed bg-golden-glow-900 bg-opacity-40 top-0 w-screen h-screen flex items-center justify-center z-50"
      v-if="submitPopup"
    >
      <div class="bg-white relative px-4 py-14 max-w-xl w-[85%] md:p-24">
        <button
          class="absolute right-3 top-4"
          @click="submitPopup = !submitPopup"
        >
          <span class="inline-block w-7">
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

        <p class="text-center">
          <strong class="font-arialBlack text-2xl md:text-3xl">
            Nous ne pouvons pas accepter les commandes en ligne pour l'instant
          </strong>
        </p>

        <p class="text-center my-7">
          Veuillez nous contacter pour finaliser vos achats.
        </p>

        <p class="text-center">
          <button
            class="bg-black text-white w-full h-10 uppercase lg:w-[40%]"
            @click="submitPopup = !submitPopup"
          >
            Ok
          </button>
        </p>
      </div>
    </div>
  </PublicLayout>
</template>
