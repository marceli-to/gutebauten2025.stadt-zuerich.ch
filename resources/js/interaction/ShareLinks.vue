<template>
  <div>
    <ul>
      <li><a :href="`https://www.facebook.com/sharer/sharer.php?u=${url}`" target="_blank">Facebook</a></li>
      <li><a :href="`http://twitter.com/share?url=${url}`" target="_blank">Twitter</a></li>
      <li><a :href="`mailto:?subject=${title}&body=${url}`">E-Mail</a></li>
    </ul>
  </div>
</template>

<script setup>
const props = defineProps({
  shareUrl: String,
  shareTitle: String,
})

const url = encodeURIComponent(props.shareUrl)
const title = encodeURIComponent(props.shareTitle)
</script>
