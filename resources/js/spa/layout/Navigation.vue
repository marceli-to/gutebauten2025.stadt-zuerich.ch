<template>
  <div class="flex flex-col justify-between min-h-screen sticky top-0 border-r border-r-black">
    <div>
      <h1 class="text-2xl leading-[1.25] p-12">
        Auszeichnung für gute Bauten der Stadt Zürich
      </h1>
      <nav class="mt-48">
        <ul class="border-t border-t-black">
          <li>
            <router-link
              :to="{ name: 'votes' }"
              class="p-12 text-md block border-b border-b-black w-full hover:bg-white hover:text-black transition-colors duration-150"
              :class="{ 'text-black bg-white': $route.name === 'votes' }">
              Stimmen
            </router-link>
          </li>
          <li>
            <router-link
              :to="{ name: 'comments' }"
              class="p-12 text-md block border-b border-b-black w-full hover:bg-white hover:text-black transition-colors duration-150"
              :class="{ 'text-black bg-white': $route.name === 'comments' }">
              Kommentare
            </router-link>
          </li>
          <li>
            <router-link
              :to="{ name: 'downloads' }"
              class="p-12 text-md block border-b border-b-black w-full hover:bg-white hover:text-black transition-colors duration-150"
              :class="{ 'text-black bg-white': $route.name === 'downloads' }">
              Downloads
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
    <div class="p-16">
      <a 
        href="/logout" 
        class="text-sm no-underline hover:underline underline-offset-4 block w-full"
        title="Abmelden">
        Abmelden
      </a>
    </div>
  </div>
</template>