<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const form = useForm({
  name: "closetCollectionAdmin",
  password: "password",
});
</script>

<template>
  <Head title="Authentification - " />

  <main
    class="flex flex-col justify-center sm:items-center bg-golden-glow min-h-screen"
  >
    <div class="relative h-screen max-w-2xl sm:h-auto bg-white">
      <section class="bg-black py-5 flex justify-center">
        <a href="/" class="focus:outline-none focus:outline-golden-glow">
          <ApplicationLogo
            class="w-[130px] hover:fill-golden-glow fill-white active:fill-golden-glow"
          />
        </a>
      </section>

      <section
        class="absolute top-1/2 -translate-y-1/2 w-full sm:static sm:-translate-y-[0] sm:pb-16"
      >
        <h1 class="underline text-2xl font-medium text-center mb-12 sm:mt-12">
          Administrateur authentification
        </h1>

        <form @submit.prevent="form.post('/admin/session')" class="w-[95%] mx-auto">
          <input
            type="text"
            name="name"
            placeholder="username"
            v-model="form.name"
            class="border-2 w-full border-black focus:outline-none focus:ring-transparent focus:border-golden-glow"
          />
          <input
            type="password"
            name="password"
            placeholder="password"
            v-model="form.password"
            class="border-2 w-full border-black outline-golden-glow mt-10 mb-20 focus:outline-none focus:ring-transparent focus:border-golden-glow"
          />
          <button
            type="submit"
            class="active:bg-golden-glow active:text-black transition-colors duration-500 border-black hover:bg-golden-glow hover:text-black border-2 hover:border-black w-full bg-black text-golden-glow text-lg py-2 font-medium outline-golden-glow"
          >
            Se connecter
          </button>
        </form>
      </section>
    </div>
  </main>
</template>
