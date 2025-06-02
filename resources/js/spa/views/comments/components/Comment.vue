<template>
  <div class="border-t border-black py-8 flex justify-between items-start">
    <div>
      <div>{{ comment.comment }}</div>
      <div class="mt-4 text-[#777] text-sm">
        {{ comment.date }} • {{ comment.building }}
      </div>
    </div>
    <div class="flex gap-x-8">
      <button  
        title="Verbergen"
        class="hover:text-gray-400 transition-colors">
        <Disable />
      </button>
      <button 
        title="Bearbeiten"
        class="hover:text-gray-400 transition-colors">
        <Edit />
      </button>
      <button 
        title="Löschen" 
        class="hover:text-gray-400 transition-colors"
        @click="destroy(comment.id)">
        <Trash />
      </button>
    </div>
  </div>
</template>
<script setup>
import Trash from '@/components/icons/Trash.vue';
import Edit from '@/components/icons/Edit.vue';
import Disable from '@/components/icons/Disable.vue';
import { deleteComment } from '@/services/api';

defineProps({
  comment: Object
})

const destroy = (id) => {
  deleteComment(id);
}
</script>
