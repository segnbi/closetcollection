<script setup>
import ApplicationLogo from "./ApplicationLogo.vue";
</script>

<template>
  <footer class="lg:border lg:border-b-0 relative">
    <div class="lg:flex">
      <section class="bg-black p-6 md:flex md:justify-center lg:flex-1 lg:items-center lg:px-0">
        <p>
          <strong>
            <a href="#">
              <ApplicationLogo class="fill-white" />
            </a>
          </strong>

          <a href="#" class="text-white font-light mt-4 inline-block mb-1 lg:mt-8 lg:mb-2"
            >info@closet-collection.sn</a
          >
          <br />

          <span class="text-white font-light"
            >Tél:<a href="tel:"> 12 345 67 89</a></span
          >
        </p>
      </section>
      <section class="p-6 flex flex-col gap-5 md:flex-row md:justify-center md:gap-20 lg:flex-[2] md:py-16 lg:px-0 lg:gap-28 bg-white">
        <section class="flex flex-col gap-1 lg:gap-4">
          <p><strong class="text-xl font-light lg:opacity-90">Boutique</strong></p>
          <ul class="lg:text-sm lg:opacity-90 lg:flex lg:flex-col lg:gap-2 capitalize">
            <li><a href="">Nouveau</a></li>
            <li><a href="">Femmes</a></li>
            <li><a href="">Hommes</a></li>
          </ul>
        </section>

        <section class="flex flex-col gap-1 lg:gap-4">
          <p><strong class="text-xl font-light lg:opacity-90">Notre boutique</strong></p>
          <ul class="lg:text-sm lg:opacity-90 lg:flex lg:flex-col lg:gap-2 capitalize">
            <li><a href="">à propos</a></li>
            <li><a href="">s'abonner</a></li>
            <li><a href="" class="uppercase">Faq</a></li>
          </ul>
        </section>

        <section class="flex flex-col gap-1 lg:gap-4">
          <p>
            <strong class="text-xl font-light lg:opacity-90">Termes et conditions</strong>
          </p>
          <ul class="lg:text-sm lg:opacity-90 lg:flex lg:flex-col lg:gap-2 capitalize">
            <li><a href="">Politique de boutique</a></li>
            <li><a href="">Livraision et retours</a></li>
            <li><a href="">Moyens de paiment</a></li>
            <li><a href="">Mentions légales</a></li>
            <li><a href="">Politique de cookies</a></li>
          </ul>
        </section>
      </section>
    </div>

    <div class="lg:flex">
      <section class="border-t p-4 lg:flex-1 lg:px-0 bg-white">
        <p class="flex gap-5 justify-center">
          <a href="#">
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
                  d="M14.2 2.875A4.625 4.625 0 0 0 9.575 7.5v2.575H7.1c-.124 0-.225.1-.225.225v3.4c0 .124.1.225.225.225h2.475V20.9c0 .124.1.225.225.225h3.4c.124 0 .225-.1.225-.225v-6.975h2.497c.103 0 .193-.07.218-.17l.85-3.4a.225.225 0 0 0-.218-.28h-3.347V7.5a.775.775 0 0 1 .775-.775h2.6c.124 0 .225-.1.225-.225V3.1c0-.124-.1-.225-.225-.225h-2.6Z"
                />
              </svg>
            </span>
          </a>

          <a href="#">
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
                  d="M16 7a1 1 0 1 1 2 0a1 1 0 0 1-2 0Z"
                />
                <path
                  fill="currentColor"
                  fill-rule="evenodd"
                  d="M12 7.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5ZM8.75 12a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0Z"
                  clip-rule="evenodd"
                />
                <path
                  fill="currentColor"
                  fill-rule="evenodd"
                  d="M17.258 2.833a47.721 47.721 0 0 0-10.516 0c-2.012.225-3.637 1.81-3.873 3.832a45.922 45.922 0 0 0 0 10.67c.236 2.022 1.86 3.607 3.873 3.832a47.77 47.77 0 0 0 10.516 0c2.012-.225 3.637-1.81 3.873-3.832a45.914 45.914 0 0 0 0-10.67c-.236-2.022-1.86-3.607-3.873-3.832Zm-10.35 1.49a46.22 46.22 0 0 1 10.184 0c1.33.15 2.395 1.199 2.55 2.517a44.421 44.421 0 0 1 0 10.32a2.89 2.89 0 0 1-2.55 2.516a46.217 46.217 0 0 1-10.184 0a2.89 2.89 0 0 1-2.55-2.516a44.421 44.421 0 0 1 0-10.32a2.89 2.89 0 0 1 2.55-2.516Z"
                  clip-rule="evenodd"
                />
              </svg>
            </span>
          </a>

          <a href="#">
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
                  fill-rule="evenodd"
                  d="M6.989 4.89a64.248 64.248 0 0 1 10.022 0l2.24.176a2.725 2.725 0 0 1 2.476 2.268c.517 3.09.517 6.243 0 9.332a2.725 2.725 0 0 1-2.475 2.268l-2.24.175a64.24 64.24 0 0 1-10.023 0l-2.24-.175a2.725 2.725 0 0 1-2.476-2.268a28.315 28.315 0 0 1 0-9.332a2.725 2.725 0 0 1 2.475-2.268l2.24-.175ZM10 14.47V9.53a.3.3 0 0 1 .454-.257l4.117 2.47a.3.3 0 0 1 0 .514l-4.117 2.47A.3.3 0 0 1 10 14.47Z"
                  clip-rule="evenodd"
                />
              </svg>
            </span>
          </a>

          <a href="#">
            <span class="inline-block w-7">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 24 24"
                class="w-full h-full"
              >
                <path
                  d="M5.077 9.457c0-.778.136-1.513.404-2.199a5.63 5.63 0 0 1 1.121-1.802a7.614 7.614 0 0 1 1.644-1.329a7.513 7.513 0 0 1 2.002-.844a8.57 8.57 0 0 1 2.185-.281c1.139 0 2.199.241 3.182.721a6.021 6.021 0 0 1 2.391 2.094c.614.915.919 1.95.919 3.104c0 .692-.068 1.369-.207 2.031a8.28 8.28 0 0 1-.646 1.913a6.605 6.605 0 0 1-1.082 1.617a4.723 4.723 0 0 1-1.568 1.114a4.962 4.962 0 0 1-2.045.417c-.489 0-.977-.115-1.459-.346c-.482-.23-.828-.546-1.036-.951c-.073.281-.173.687-.306 1.218c-.128.53-.214.872-.252 1.027c-.04.154-.114.411-.222.767a5.183 5.183 0 0 1-.281.769l-.344.674a7.98 7.98 0 0 1-.498.838c-.181.262-.405.575-.672.935l-.149.053l-.099-.108c-.107-1.133-.162-1.811-.162-2.035c0-.663.079-1.407.235-2.233c.153-.825.395-1.862.72-3.109c.325-1.246.511-1.979.561-2.196c-.229-.467-.345-1.077-.345-1.827c0-.599.187-1.16.562-1.688c.376-.526.851-.789 1.427-.789c.441 0 .783.146 1.028.439c.246.292.366.66.366 1.109c0 .476-.158 1.165-.476 2.066c-.318.902-.476 1.575-.476 2.022c0 .453.162.832.486 1.129a1.68 1.68 0 0 0 1.179.449c.396 0 .763-.09 1.104-.271a2.46 2.46 0 0 0 .849-.733a6.123 6.123 0 0 0 1.017-2.225c.096-.422.17-.823.216-1.2c.049-.379.07-.737.07-1.077c0-1.247-.396-2.219-1.183-2.915c-.791-.696-1.821-1.042-3.088-1.042c-1.441 0-2.646.466-3.611 1.401c-.966.932-1.452 2.117-1.452 3.554c0 .317.048.623.139.919c.089.295.186.53.291.704c.104.171.202.338.291.492c.09.154.137.264.137.33c0 .202-.053.465-.16.79c-.111.325-.242.487-.4.487c-.015 0-.077-.011-.185-.034a2.21 2.21 0 0 1-.979-.605a3.17 3.17 0 0 1-.659-1.022a6.986 6.986 0 0 1-.352-1.169a4.884 4.884 0 0 1-.132-1.153z"
                  fill="currentColor"
                />
              </svg>
            </span>
          </a>

          <a href="#">
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
                  d="M16 8.245V15.5a6.5 6.5 0 1 1-5-6.326v3.163a3.5 3.5 0 1 0 2 3.163V2h3a5 5 0 0 0 5 5v3a7.966 7.966 0 0 1-5-1.755Z"
                />
              </svg>
            </span>
          </a>
        </p>
      </section>
      <section class="p-5 border-y bg-golden-glow lg:flex-[2] lg:px-0 lg:border lg:border-r-0">
        <p class="text-center">
          © 2023 par CLOSET COLLECTION. Crée par <a href="#" class="font-bold underline">Serignebidev</a>
        </p>
      </section>
    </div>
  </footer>
</template>
