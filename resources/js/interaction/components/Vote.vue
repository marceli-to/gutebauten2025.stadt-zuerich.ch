<template>
  <a
    href="#"
    @click.prevent="toggleVote"
    :class="['btn-vote', has_voted ? 'has-vote' : '']">
    <VoteIcon :class="has_voted ? 'text-lumora' : 'text-white'" />
  </a>
</template>

<script setup>
import { ref, watch } from 'vue'
import axios from 'axios'
import VoteIcon from '../icons/Vote.vue'

const props = defineProps({
  slug: String,
  hash: String,
  has_vote: Boolean,
})

const emit = defineEmits(['voted', 'unvoted'])

const has_voted = ref(props.has_vote ?? false)
const hasChecked = ref(false)

watch(
  () => props.hash,
  async (newHash) => {
    if (!newHash || !props.slug) return
    if (has_voted.value === true || hasChecked.value === true) return

    try {
      const res = await axios.post('/api/voter/check', {
        hash: newHash,
        slug: props.slug,
      })
      has_voted.value = res.data.has_vote
      hasChecked.value = true
    } catch (err) {
      console.error('Vote check failed:', err)
    }
  }
)

async function toggleVote() {
  if (!props.hash || !props.slug) return

  try {
    if (has_voted.value) {
      await axios.put('/api/vote', { hash: props.hash, slug: props.slug })
      has_voted.value = false
      emit('unvoted')
    } else {
      await axios.post('/api/vote', { hash: props.hash, slug: props.slug })
      has_voted.value = true
      emit('voted')
    }
  } catch (e) {
    console.error('Voting error:', e)
  }
}
</script>
