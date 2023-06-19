<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { ref, watch, onBeforeMount } from "vue";

const props = defineProps({
  product: Object,
  previous: Object,
  next: Object,
});

const productinfos = ref(true);
const exchangePolicy = ref(false);
const deliveryPolicy = ref(false);

const cart = ref([]);
const quantity = ref(1)

const addToCart = () => {
  const itemIndex = cart.value.findIndex(
    (item) => item.product.id == props.product.id
  );

  if (itemIndex == -1) {
    cart.value.push({
      product: props.product,
      quantity: quantity.value,
    });
  } else {
    cart.value[itemIndex].quantity += quantity.value
  }

  return localStorage.setItem("cart", JSON.stringify(cart.value));
};

onBeforeMount(() => {
  cart.value = JSON.parse(localStorage.getItem('cart'))
})
</script>

<template>
  <Head :title="`${product.name} - `" />
  <PublicLayout>
    <main>
      <div class="w-[80%] m-auto lg:w-[65%] pt-2 pb-6 lg:pt-14">
        <section class="md:flex justify-between items-center">
          <p class="hidden md:block text-ironside-grey">
            <Link href="/" class="text-black hover:underline">Accueil</Link> /
            {{ product.name }}
          </p>

          <p class="md:flex md:items-center gap-1">
            <button
              @click="router.visit(route('public.products.show', previous.id))"
              :disabled="!previous"
              class="md:flex items-center gap-1 hidden disabled:opacity-50"
            >
              <span class="inline-block w-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 24 24"
                  class="w-full h-full"
                >
                  <path
                    fill="currentColor"
                    d="M17.51 3.87L15.73 2.1L5.84 12l9.9 9.9l1.77-1.77L9.38 12l8.13-8.13z"
                  />
                </svg>
              </span>
              <span class="">Précédent</span>
            </button>

            <Link
              :href="route('public.welcome')"
              class="text-lg md:hidden flex items-center gap-1"
            >
              <span class="inline-block w-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 24 24"
                  class="w-full h-full"
                >
                  <path
                    fill="currentColor"
                    d="M17.51 3.87L15.73 2.1L5.84 12l9.9 9.9l1.77-1.77L9.38 12l8.13-8.13z"
                  />
                </svg>
              </span>
              <span>Retour à Accueil</span>
            </Link>

            <span class="hidden md:inline-block w-5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 20 20"
                class="w-full h-full"
              >
                <path
                  fill="currentColor"
                  d="M9.75 3a.75.75 0 0 1 .75.75v12.5a.75.75 0 0 1-1.5 0V3.75A.75.75 0 0 1 9.75 3Z"
                />
              </svg>
            </span>

            <button
              @click="router.visit(route('public.products.show', next.id))"
              :disabled="!next"
              class="hidden md:flex md:items-center gap-1 disabled:opacity-50"
            >
              <span>Suivant</span>
              <span class="inline-block w-4">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="32"
                  height="32"
                  viewBox="0 0 24 24"
                  class="w-full h-full"
                >
                  <path
                    fill="currentColor"
                    d="M6.23 20.23L8 22l10-10L8 2L6.23 3.77L14.46 12z"
                  />
                </svg>
              </span>
            </button>
          </p>
        </section>

        <section
          class="flex flex-col gap-10 mt-6 lg:mt-14 md:grid md:grid-cols-[1fr_1fr] lg:grid-cols-[1.4fr_1fr] md:gap-8 md:grid-rows-[auto_auto_auto_auto] lg:gap-y-14"
        >
          <div class="md:row-start-1 md:row-end-3">
            <div class="bg-soapstone py-4 px-2 md:border md:py-8">
              <img :src="`/assets/${product.images[0].path}`" alt="" />
            </div>
          </div>

          <div>
            <div class="md:flex md:flex-col-reverse">
              <p class="lg:text-sm">SKU : 0003</p>
              <h1 class="font-arialBlack text-4xl mb-2 mt-5 md:mt-0">
                {{ product.name }}
              </h1>
            </div>

            <p class="lg:my-3">
              <strong class="font-normal text-xl lg:text-lg"
                >{{ product.price }}CFA</strong
              >
            </p>

            <div class="flex flex-col gap-2 mb-8 mt-3">
              <label for="quantity">Quantité</label>
              <input
                v-model="quantity"
                type="number"
                min="1"
                class="w-24"
                id="quantity"
              />
            </div>

            <button
              @click="addToCart"
              class="bg-black text-golden-glow py-2 text-xl w-full active:opacity-70"
            >
              Ajouter au panier
            </button>
          </div>

          <p class="md:row-start-3">
            {{ product.description }}
          </p>

          <div class="flex flex-col gap-5 md:row-end-5 md:row-start-2">
            <div
              class="flex flex-col"
              :class="{
                'gap-0 transition-all duration-300': !productinfos,
                'gap-4 transition-all duration-300': productinfos,
              }"
            >
              <p>
                <button
                  class="flex items-center justify-between w-full"
                  @click="productinfos = !productinfos"
                >
                  <strong class="uppercase font-normal text-xl lg:text-lg">
                    Infos d'article
                  </strong>
                  <span class="inline-block relative w-6" v-if="productinfos">
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
                  <span class="w-6" v-else>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="32"
                      height="32"
                      viewBox="0 0 24 24"
                      class="w-full h-full"
                    >
                      <path
                        fill="currentColor"
                        d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6h-2Z"
                      />
                    </svg>
                  </span>
                </button>
              </p>
              <div class="overflow-hidden">
                <p
                  class="relative"
                  :class="{
                    'mt-0 transition-all duration-300': productinfos,
                    '-mt-[200%] transition-all duration-300': !productinfos,
                  }"
                >
                  Détails de l’article. C'est l'espace idéal pour présenter les
                  caractéristiques de votre article : taille, matière,
                  instructions de lavage, etc. Vous pouvez également expliquer
                  ce qui rend votre article spécial et comment vos clients
                  peuvent en bénéficier. Les clients aiment savoir ce qu'ils
                  achètent, alors n'hésitez pas à leur donner un maximum de
                  détails pour qu'ils puissent acheter cet article en toute
                  confiance.
                </p>
              </div>
            </div>

            <div class="h-[1px] bg-black"></div>

            <div
              class="flex flex-col"
              :class="{
                'gap-0 transition-all duration-300': !exchangePolicy,
                'gap-4 transition-all duration-300': exchangePolicy,
              }"
            >
              <p>
                <button
                  class="flex items-center justify-between w-full"
                  @click="exchangePolicy = !exchangePolicy"
                >
                  <strong
                    class="uppercase font-normal text-xl text-left flex-1 lg:text-lg"
                  >
                    Politique d'échange et de remboursement
                  </strong>
                  <span class="inline-block relative w-6" v-if="exchangePolicy">
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
                  <span class="w-6" v-else>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="32"
                      height="32"
                      viewBox="0 0 24 24"
                      class="w-full h-full"
                    >
                      <path
                        fill="currentColor"
                        d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6h-2Z"
                      />
                    </svg>
                  </span>
                </button>
              </p>
              <div class="overflow-hidden">
                <p
                  :class="{
                    'mt-0 transition-all duration-300': exchangePolicy,
                    '-mt-[200%] transition-all duration-300': !exchangePolicy,
                  }"
                >
                  Politique d'échange et de remboursement. Informez vos
                  visiteurs des conditions d'échange et de remboursement de
                  votre boutique en ligne. Proposez une politique claire afin
                  d'établir une relation de confiance avec vos clients et leur
                  permettre d'acheter sereinement sur votre site.
                </p>
              </div>
            </div>

            <div class="h-[1px] bg-black"></div>

            <div
              class="flex flex-col"
              :class="{
                'gap-0 transition-all duration-300': !deliveryPolicy,
                'gap-4 transition-all duration-300': deliveryPolicy,
              }"
            >
              <p>
                <button
                  class="flex items-center justify-between w-full"
                  @click="deliveryPolicy = !deliveryPolicy"
                >
                  <strong
                    class="uppercase font-normal text-xl text-left flex-1 lg:text-lg"
                  >
                    Politique de livraison
                  </strong>
                  <span class="inline-block relative w-6" v-if="deliveryPolicy">
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
                  <span class="w-6" v-else>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="32"
                      height="32"
                      viewBox="0 0 24 24"
                      class="w-full h-full"
                    >
                      <path
                        fill="currentColor"
                        d="M11 19v-6H5v-2h6V5h2v6h6v2h-6v6h-2Z"
                      />
                    </svg>
                  </span>
                </button>
              </p>
              <div class="overflow-hidden">
                <p
                  :class="{
                    'mt-0 transition-all duration-300': deliveryPolicy,
                    '-mt-[200%] transition-all duration-300': !deliveryPolicy,
                  }"
                >
                  Politique de livraison. C'est l'espace idéal pour ajouter des
                  détails supplémentaires sur vos modes de livraison, options
                  d'emballage et prix. Proposez une politique de livraison
                  claire afin de rassurer vos clients et leur permettre
                  d'acheter sereinement sur votre site.
                </p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  </PublicLayout>
</template>
