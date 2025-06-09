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
const deviceHash = ref(null)
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

  deviceHash.value = await getDeviceHash(result.components);
  console.log(deviceHash.value)

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

async function getDeviceHash(visitorData) {
  // Step 1: Extract relevant device fingerprint fields
  const deviceFingerprint = {
    platform: visitorData.platform,
    deviceMemory: visitorData.deviceMemory,
    hardwareConcurrency: visitorData.hardwareConcurrency,
    screenResolution: [visitorData.screenResolution.width, visitorData.screenResolution.height],
    timezone: visitorData.timezone,
    language: visitorData.languages?.[0], // Use primary language
    touchSupport: visitorData.touchSupport,
    colorDepth: visitorData.colorDepth,
    vendor: visitorData.vendor,
    webGLRenderer: visitorData.webGLRenderer,
  };

  // Step 2: Normalize keys by sorting
  const sorted = Object.keys(deviceFingerprint)
    .sort()
    .reduce((acc, key) => {
      acc[key] = deviceFingerprint[key];
      return acc;
    }, {});

  // Step 3: Convert to JSON string
  const jsonString = JSON.stringify(sorted);

  // Step 4: Hash the string using SHA-256
  const encoder = new TextEncoder();
  const data = encoder.encode(jsonString);
  const hashBuffer = await crypto.subtle.digest('SHA-256', data);
  const hashArray = Array.from(new Uint8Array(hashBuffer));
  const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');

  return hashHex;
}

function onVoted() {
  console.log('Voted for building', slug.value)
}

function onUnvoted() {
  console.log('Removed vote for building', slug.value)
}
</script>
