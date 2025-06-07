<template>
  <a href="#" @click.prevent="toggleVote" :class="['btn-vote', hasVoted ? 'has-vote' : '']">
    {{ hasVoted ? 'Stimme entfernen' : 'Abstimmen' }}
  </a>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
import axios from 'axios'

const props = defineProps({
  slug: String,
  hash: String
})

const emit = defineEmits(['voted', 'unvoted'])

const hasVoted = ref(false)

watch(() => props.hash, checkVote)

async function checkVote() {
  if (!props.hash) return
  const res = await axios.get(`/api/voter/check/${props.hash}/${props.slug}`)
  hasVoted.value = res.data.has_vote
}

async function toggleVote() {
  if (hasVoted.value) {
    await axios.put('/api/vote', { hash: props.hash, slug: props.slug })
    hasVoted.value = false
    emit('unvoted')
  } else {
    await axios.post('/api/vote', { hash: props.hash, slug: props.slug })
    hasVoted.value = true
    emit('voted')
  }
}
</script>
