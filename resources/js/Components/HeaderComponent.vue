<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onBeforeMount } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const cartQuantity = ref(0)

onBeforeMount(() => {
  setInterval(() => {
    const cart = JSON.parse(localStorage.getItem('cart'))
    let items = 0
  
    for(const item of cart) {
      items += item.quantity
    }
  
    cartQuantity.value = items
  }, 300)
})

const showNav = ref(false);
</script>

<template>
  <header
    class="bg-golden-glow flex items-center justify-between px-5 py-5 md:px-8 lg:py-0 lg:px-0 lg:border lg:bg-transparent"
  >
    <span
      class="lg:bg-golden-glow lg:h-[68px] lg:flex lg:items-center lg:border-r lg:flex-[5] lg:justify-center"
    >
      <a href="/">
        <ApplicationLogo class="" />
      </a>
    </span>

    <nav
      class="lg:visible lg:opacity-100 fixed bg-white left-0 top-0 w-full z-50 h-screen flex flex-col justify-center lg:static lg:h-auto lg:flex-[19]"
      :class="{
        'visible bg-opacity-100 transition-all duration-500': showNav,
        'invisible bg-opacity-0 transition-all duration-500': !showNav,
      }"
    >
      <ul
        class="relative lg:flex lg:flex-row-reverse lg:translate-y-0 lg:visible lg:opacity-100"
        :class="{
          'visible translate-y-0 opacity-100 transition-all duration-300':
            showNav,
          '-translate-y-8 opacity-0 invisible transition-all duration-300 delay-100':
            !showNav,
        }"
      >
        <li
          class="text-center relative -top-[34px] lg:static lg:flex lg:items-center lg:border-l lg:flex-[2] lg:justify-end"
        >
          <a
            href="#"
            class="inline-flex items-center gap-2 lg:relative hover:opacity-70"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="32"
              height="32"
              viewBox="0 0 24 24"
            >
              <path
                fill="currentColor"
                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm0 14c-2.03 0-4.43-.82-6.14-2.88a9.947 9.947 0 0 1 12.28 0C16.43 19.18 14.03 20 12 20z"
              />
            </svg>
            <span class="lg:text-sm"> Connexion </span>
          </a>
        </li>
        <div
          class="lg:flex lg:flex-[10] lg:justify-end lg:items-start lg:pb-[2px] font-arialBlack lg:font-sans"
        >
          <li class="lg:flex-auto lg:max-w-[200px]">
            <a
              href="#"
              class="lg:hover:bg-black transition duration-500 lg:hover:text-golden-glow block p-7 hover:bg-golden-glow text-center text-4xl font-black lg:text-sm lg:font-light lg:py-6 lg:border-r"
              >Nouveau</a
            >
          </li>
          <li class="lg:flex-auto lg:max-w-[200px]">
            <a
              href="#"
              class="lg:hover:bg-black transition duration-500 lg:hover:text-golden-glow block p-7 hover:bg-golden-glow text-center text-4xl font-black lg:text-sm lg:font-light lg:py-6 lg:border-r"
              >Femmes</a
            >
          </li>
          <li class="lg:flex-auto lg:max-w-[200px]">
            <a
              href="#"
              class="lg:hover:bg-black transition duration-500 lg:hover:text-golden-glow block p-7 hover:bg-golden-glow text-center text-4xl font-black lg:text-sm lg:font-light lg:py-6"
              >Hommes</a
            >
          </li>
        </div>
      </ul>
    </nav>

    <div class="flex gap-3 md:gap-5 lg:flex-[2]">
      <Link href="/cart" class="relative lg:left-1">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
          class="w-[48px] h-[48px] lg:w-9"
        >
          <path
            fill="currentColor"
            d="M4 22V6h4q0-1.65 1.175-2.825T12 2q1.65 0 2.825 1.175T16 6h4v16H4Zm8-18q-.825 0-1.413.588T10 6h4q0-.825-.588-1.413T12 4Zm-4 7h2V8H8v3Zm6 0h2V8h-2v3Z"
          />
        </svg>
        <strong
          class="absolute left-1/2 -translate-x-1/2 text-golden-glow top-1/2 -translate-y-[15%] font-light lg:text-xs lg:text-golden-glow"
        >
          {{ cartQuantity }}
        </strong>
      </Link>

      <button
        class="lg:hidden inline-flex flex-col gap-2 border px-3 py-[13px] rounded-full group relative z-50"
        :class="{
          'bg-black border-white transition-all': showNav,
          'transition-all': !showNav,
        }"
        @click="showNav = !showNav"
      >
        <div
          class="h-[2px] bg-black w-[26px]"
          :class="{
            'bg-golden-glow scale-x-[50%] origin-left -rotate-45 translate-y-[10px] transition-all':
              showNav,
            'transition-all': !showNav,
          }"
        ></div>
        <div
          class="h-[2px] bg-black w-[26px]"
          :class="{ 'bg-golden-glow': showNav, '': !showNav }"
        ></div>
        <div
          class="h-[2px] bg-black w-[26px]"
          :class="{
            'bg-golden-glow scale-x-[50%] origin-left rotate-45 -translate-y-[10px] transition-all':
              showNav,
            'transition-all': !showNav,
          }"
        ></div>
      </button>
    </div>
  </header>
</template>