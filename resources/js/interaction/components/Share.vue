<template>
  <div class="relative">
    <a 
      href="#" 
      @click.prevent="emit('toggle')"
      class="group"
      v-if="!props.isOpen">
      <ShareIcon class="text-white group-hover:text-lumora transition-all" />
    </a>
    <div  
      class="absolute top-34 md:top-33 xl:top-43 -translate-y-full left-0 w-210 xl:w-[240px] h-auto z-20"
      v-if="props.isOpen">
      <div class="relative w-full border-3 xl:border-4 border-black bg-white p-10 text-sm">
        <a 
          href="javascript:;" 
          @click.prevent="emit('toggle')"
          class="absolute top-10 right-10 xl:top-10 xl:right-10">
          <CrossIcon class="size-15" />
        </a>
        <ul class="m-0 p-0 list-none flex flex-col gap-y-5">

          <li>
            <a 
              :href="`whatsapp://send?text=${shareText}%0D%0A%0D%0A${url}`" 
              target="_blank"
              class="no-underline underline-offset-4 decoration-1 xl:decoration-2 hover:underline">
              WhatsApp
            </a>
          </li>
          <li>
            <a 
              :href="`https://www.facebook.com/sharer/sharer.php?u=${url}`" 
              target="_blank" 
              rel="noopener"
              class="no-underline underline-offset-4 decoration-1 xl:decoration-2 hover:underline">
              Facebook
            </a>
          </li>
          <li>
            <a 
            :href="`http://twitter.com/share?text${shareText}=&url=${url}`" 
            target="_blank" 
            rel="noopener"
            class="no-underline underline-offset-4 decoration-1 xl:decoration-2 hover:underline">
              Twitter
            </a>
          </li>
          <li>
            <a 
              :href="`https://www.linkedin.com/shareArticle?url=${url}`" 
              target="_blank"
              rel="noopener"
              class="no-underline underline-offset-4 decoration-1 xl:decoration-2 hover:underline">
              LinkedIn
            </a>
          </li>
          <li>
            <a 
              :href="`mailto:?subject=Publikumspreis Auszeichnung für gute Bauten der Stadt Zürich 2025&body=Bis am 22. August kann für den diesjährigen Publikumspreis abgestimmt werden. Wir freuen uns über Ihre Stimme!%0D%0A%0D%0A${url}`" 
              target="_blank" 
              rel="noopener"
              class="no-underline underline-offset-4 decoration-1 xl:decoration-2 hover:underline">
              E-Mail
            </a>
          </li>
          <li>
            <a 
              href="javascript:;"
              @click="copyLink"
              class="no-underline underline-offset-4 decoration-1 xl:decoration-2 hover:underline">
              Link kopieren
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import ShareIcon from '../icons/Share.vue'
import CrossIcon from '../icons/Cross.vue'

const props = defineProps({
  shareUrl: String,
  shareTitle: String,
  isOpen: Boolean,
})

const emit = defineEmits(['toggle'])

const url = encodeURIComponent(props.shareUrl)
const title = encodeURIComponent(props.shareTitle)

const shareText = 'Publikumspreis Auszeichnung für gute Bauten der Stadt Zürich 2025. Bis am 22. August kann für den diesjährigen Publikumspreis abgestimmt werden. Wir freuen uns über Ihre Stimme!'

function copyLink() {
  if (navigator.clipboard && navigator.clipboard.writeText) {
    navigator.clipboard.writeText(props.shareUrl);
  }
  else {
    const textArea = document.createElement('textarea');
    textArea.value = props.shareUrl;
    textArea.style.position = 'fixed';
    textArea.style.opacity = '0';
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);
  }
}
</script>
