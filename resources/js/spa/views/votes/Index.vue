<template>
  <h1 class="text-2xl leading-[1.25]">
    Stimmen
  </h1>
  <div class="max-w-3xl mt-48 text-md">
    <table class="w-full">
      <tbody class="divide-y divide-black">
        <tr v-for="(vote, index) in votes" :key="index">
          <td class="py-8">
            {{ vote.title }}
          </td>
          <td class="py-8 text-right font-bold">
            {{ vote.votes }}
          </td>
        </tr>
        <tr class="border-b !border-b-2">
          <td class="py-8 font-bold">Total</td>
          <td class="py-8 text-right font-bold">
            {{ totalVotes }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</template>
<script setup>
import { ref, onMounted, computed } from 'vue';
import { getVotes } from '@/services/api';
import { usePageTitle } from '@/composables/usePageTitle';

const { setTitle } = usePageTitle();
setTitle('Stimmen');

const votes = ref([]);

onMounted(async () => {
  try {
    votes.value = await getVotes();
  } catch (error) {
    console.error(error);
  }
});

const totalVotes = computed(() => {
  return votes.value.reduce((sum, vote) => sum + vote.votes, 0);
});
</script>
