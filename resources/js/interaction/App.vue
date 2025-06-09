<template>
  <div class="flex gap-x-10 xl:gap-x-20">
    
    <Vote
      :slug="slug"
      :hash="hash"
      :has_vote="has_vote"
      @voted="onVoted"
      @unvoted="onUnvoted" />
    
    <Share 
      :share-url="url" 
      :share-title="title" 
      :is-open="currentlyOpen === 'share'"
      @toggle="() => setOpen('share')" />

    <Comment 
      :slug="slug" 
      :is-open="currentlyOpen === 'comment'" 
      @toggle="() => setOpen('comment')" />

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import Vote from './components/Vote.vue'
import Comment from './components/Comment.vue'
import Share from './components/Share.vue'
import FingerprintJS from '@fingerprintjs/fingerprintjs'

const props = defineProps({
  title: String,
  slug: String,
  url: String,
  has_vote: Boolean,
})

const slug = ref(props.slug)
const url = ref(props.url)
const hash = ref(null)
const has_vote = ref(props.has_vote)

const currentlyOpen = ref(null) // 'vote', 'comment', 'share', or null

function setOpen(componentName) {
  currentlyOpen.value = currentlyOpen.value === componentName ? null : componentName
}

function handleKeydown(e) {
  if (e.key === 'Escape') {
    if (currentlyOpen.value === 'share' || currentlyOpen.value === 'comment') {
      currentlyOpen.value = null
    }
  }
}


onMounted(async () => {
  document.addEventListener('keydown', handleKeydown)

  const fp = await FingerprintJS.load()
  const result = await fp.get()
  console.log(result)
  console.log(result.visitorId)

  const stored = localStorage.getItem('voter_hash')
  if (stored) {
    hash.value = stored
  } 
  else {
    // const fp = await FingerprintJS.load()
    // const result = await fp.get()
    // console.log(result)
    // hash.value = result.visitorId
    // localStorage.setItem('voter_hash', hash.value)
  }
})

function onVoted() {
  console.log('Voted for building', slug.value)
}

function onUnvoted() {
  console.log('Removed vote for building', slug.value)
}
</script>
