<template>
  <div>
    <Vote
      :slug="slug"
      :hash="hash"
      :has_vote="has_vote"
      @voted="onVoted"
      @unvoted="onUnvoted"
    />

    <!-- 
    <Comment :building-id="buildingId" />
    <Share :share-url="url" :share-title="title" />
    -->
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

onMounted(async () => {
  const stored = localStorage.getItem('voter_hash')
  if (stored) {
    hash.value = stored
  } 
  else {
    const fp = await FingerprintJS.load()
    const result = await fp.get()
    hash.value = result.visitorId
    localStorage.setItem('voter_hash', hash.value)
  }
})

function onVoted() {
  console.log('Voted for building', slug.value)
}

function onUnvoted() {
  console.log('Removed vote for building', slug.value)
}
</script>
