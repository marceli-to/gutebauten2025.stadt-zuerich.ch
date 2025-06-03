<template>
  <div 
    v-if="toasts.length" 
    class="fixed z-[9999] text-sm w-auto max-w-[360px] text-white top-16 right-16 cursor-pointer">
    <a 
      href="javascript:;" 
      :class="[
        'py-8 px-12 mb-4 flex items-center justify-center',
        { '!bg-green-500': toast.type === 'success' },
        { '!bg-red-500': toast.type === 'error' },
        { '!bg-blue-500': toast.type === 'info' },
      ]"
      @click="removeToast(toast.id)"
      title="Meldung verbergen"
      v-for="toast in toasts" :key="toast.id">
      {{ toast.message }}
    </a>
  </div>
</template>

<script setup>
import { storeToRefs } from 'pinia';
import { useToastStore } from '@/components/toast/stores/toast';
const toastStore = useToastStore();
const { toasts } = storeToRefs(toastStore);
const { removeToast } = toastStore;
</script>
