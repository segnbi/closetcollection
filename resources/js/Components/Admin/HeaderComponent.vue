<script setup>
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";

defineEmits(['menu-btn-clicked'])
const contextual = ref(false)

window.addEventListener('click', () => {
  if(contextual.value) {
    contextual.value = false
  }
})

</script>

<template>
  <header class="border-b border-black-100 bg-white relative">
    <div class="flex items-center py-2 w-[95%] mx-auto justify-between">
      <div class="flex items-center gap-5 lg:gap-6 flex-auto">
        <button class="lg:hidden" @click="$emit('menu-btn-clicked')">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="1em"
            height="1em"
            viewBox="0 0 24 24"
            class="w-6 h-6 fill-black"
          >
            <path
              fill=""
              d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"
            ></path>
          </svg>
        </button>

        <span class="inline-block w-[1px] h-6 bg-black-100 lg:hidden"></span>

        <form class="flex items-center flex-auto">
          <label for="search" class="cursor-text">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="1em"
              height="1em"
              viewBox="0 0 20 20"
              class="w-5 h-5 fill-black-200"
            >
              <path
                fill=""
                fillRule="evenodd"
                d="M9 3.5a5.5 5.5 0 1 0 0 11a5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z"
                clipRule="evenodd"
              ></path>
            </svg>
          </label>

          <input
            type="text"
            name="search"
            id="search"
            placeholder="Rechercher..."
            class="flex-[0.95] placeholder-black-200 border-transparent focus:outline-none focus:ring-transparent focus:border-transparent text-[15px] w-[100%] relative top-[1px]"
          />
        </form>
      </div>

      <div class="flex items-center gap-3">
        <button>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="1em"
            height="1em"
            viewBox="0 0 24 24"
            class="w-[20px] h-[20px] fill-black-200 hover:fill-black-300"
          >
            <path
              fill=""
              d="M20 17h2v2H2v-2h2v-7a8 8 0 1 1 16 0v7ZM9 21h6v2H9v-2Z"
            ></path>
          </svg>
        </button>

        <span
          class="lg:inline-block w-[1px] h-6 bg-black-100 hidden mx-3"
        ></span>

        <button class="flex items-center gap-2" @click.stop="contextual = !contextual">
          <img
            src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
            alt=""
            class="w-8 h-8 object-cover rounded-full lg:mr-2"
          />

          <strong class="hidden lg:inline text-[15px]">Tom cook</strong>

          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 512 512"
            class="w-6 h-6 fill-black-200 hidden lg:inline-block"
          >
            <path d="M128 192l128 128 128-128z" fill="" />
          </svg>
        </button>
      </div>
    </div>

    <div
      class="absolute py-2 shadow-[0_2px_5px_#00000025] right-5 top-[52px] bg-white lg:right-[29px]"
      v-if="contextual"
    >
      <nav class="text-sm">
        <ul>
          <li>
            <Link
              href="#"
              class="py-1 px-2 block hover:bg-golden-glow hover:bg-opacity-20"
              >Votre profil</Link
            >
          </li>
          <li>
            <button
              @click="router.delete('/admin/session')"
              class="py-1 px-2 block hover:bg-golden-glow hover:bg-opacity-20"
              >Se déconnecter</button
            >
          </li>
        </ul>
      </nav>
    </div>
  </header>
</template>
