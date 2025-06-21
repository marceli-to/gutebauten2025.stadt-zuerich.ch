<template>
  <div class="relative">
    <a
      href="#"
      @click.prevent="toggleForm"
      class="group"
      v-if="!props.isOpen">
      <CommentIcon class="text-white group-hover:text-lumora transition-all w-27 xl:w-34" />
    </a>
  
    <div 
      class="absolute top-35 md:top-34 xl:top-43 -translate-y-full left-0 w-210 md:w-[240px] xl:w-[360px] h-auto" 
      v-if="props.isOpen">
      <div 
        class="relative w-full border-3 xl:border-4 border-black bg-white p-10"
        :class="{ 'border-crimora': hasError }">
        <a 
          href="javascript:;" 
          @click.prevent="toggleForm"
          class="absolute top-10 right-10 xl:top-10 xl:right-10">
          <CrossIcon class="size-15" />
        </a>
        <template v-if="isSubmitted">
          <div class="text-xs text-black">
            Vielen Dank für deinen Kommentar! Wir werden ihn schnellstmöglich prüfen und veröffentlichen.
          </div>
        </template>
        <template v-else>
          <div class=" top-0 left-0 w-full h-full flex flex-col justify-between">
            <form @submit.prevent="submitComment">
              <div class="text-xs text-black">{{ comment.length }}/250</div>
              <textarea
                v-model="comment"
                :maxlength="250"
                placeholder="Verfasse deinen Kommentar"
                class="appearance-none mt-5 xl:mt-10 h-130 w-full text-xs bg-transparent resize-none !outline-none !ring-0 !border-none !p-0 placeholder-black"
                :class="{ 'placeholder:!text-crimora': hasError }"
                rows="5">
              </textarea>
              <div class="flex justify-end xl:p-5">
                <button
                  class="bg-transparent text-black border-3 xl:border-4 border-black hover:bg-lumora hover:text-black transition-colors text-xs xl:text-sm p-5 xl:px-10 leading-none "
                  type="submit">
                  Posten
                </button>
              </div>
            </form>
          </div>
        </template>
      </div>
    </div>
  </div>

</template>

<script setup>
import { ref, watch } from 'vue'
import axios from 'axios'
import CommentIcon from '../icons/Comment.vue'
import CrossIcon from '../icons/Cross.vue'

const props = defineProps({
  slug: String,
  isOpen: Boolean
})

const comment = ref('')
const isSubmitted = ref(false)
const hasError = ref(false)

const emit = defineEmits(['toggle'])

// Add a watcher that sets hasError to false when the user starts typing
watch(comment, () => {
  hasError.value = false
})

async function submitComment() {
  if (comment.value.length < 1) {
    hasError.value = true
    return
  }
  try {
    await axios.post('/api/comment', {
      slug: props.slug,
      comment: comment.value
    })
  }
  catch (error) {
    console.error(error)
  }
  finally {
    isSubmitted.value = true
    comment.value = ''
    hasError.value = false
  }
}

function toggleForm() {
  emit('toggle')
  isSubmitted.value = false
  comment.value = ''
  hasError.value = false
}
</script>
