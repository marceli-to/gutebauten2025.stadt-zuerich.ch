<template>
  <form @submit.prevent="submitComment">
    <textarea v-model="comment" maxlength="250" placeholder="Kommentar schreiben" />
    <button type="submit">Posten</button>
    <p v-if="submitted">Danke! Kommentar wird moderiert.</p>
  </form>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const props = defineProps({
  buildingId: String,
})

const comment = ref('')
const submitted = ref(false)

async function submitComment() {
  if (comment.value.length < 3) return
  await axios.post('/api/comment', {
    building: props.buildingId,
    comment: comment.value
  })
  submitted.value = true
  comment.value = ''
}
</script>
