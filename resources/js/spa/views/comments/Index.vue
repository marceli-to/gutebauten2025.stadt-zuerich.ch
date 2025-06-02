<template>
  <h1 class="text-2xl leading-[1.25]">
    Kommentare
  </h1>
  <template v-if="!isLoading">
    <div class="max-w-3xl mt-52 text-sm">
      <div class="flex gap-x-32">
        <button
          v-for="(label, key) in tabs"
          :key="key"
          @click="activeTab = key"
          :class="[
            'inline-flex py-4 border-b text-left hover:border-black transition-colors',
            activeTab === key
              ? 'border-black'
              : 'border-transparent'
          ]">
          {{ label }}
        </button>
      </div>
      <div class="mt-48">
        <div v-if="activeTab === 'drafts'">
          <CommentCard
            v-for="comment in comments.drafts"
            :key="comment.id"
            :comment="comment"
            v-if="comments.drafts.length > 0"
          />
          <p class="pt-8" v-else>
            Es sind keine neuen Kommentare vorhanden
          </p>
        </div>
        <div v-else-if="activeTab === 'published'">
          <CommentCard
            v-for="comment in comments.published"
            :key="comment.id"
            :comment="comment"
            v-if="comments.published.length > 0"
          />
          <p class="pt-8" v-else>
            Es sind keine veröffentlichten Kommentare vorhanden
          </p>
        </div>
        <div v-else-if="activeTab === 'deleted'">
          <CommentCard
            v-for="comment in comments.deleted"
            :key="comment.id"
            :comment="comment" 
            v-if="comments.deleted.length > 0"
          />
          <p class="pt-8" v-else>
            Es sind keine gelöschten Kommentare vorhanden
          </p>
        </div>
      </div>
    </div>
  </template>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import { getComments } from '@/services/api';
import CommentCard from './components/Comment.vue';

const tabs = {
  drafts: 'Neue Kommentare',
  published: 'Veröffentlichte Kommentare',
  deleted: 'Gelöschte Kommentare'
}

const activeTab = ref('published');
let isLoading = ref(true);

const comments = ref({
  drafts: [],
  published: [],
  deleted: []
});

onMounted(async () => {
  try {
    comments.value = await getComments();
    isLoading.value = false;
  } catch (error) {
    console.error(error);
  }
});
</script>