import { ref, watch } from 'vue';

const title = ref('');
const DEFAULT_SUFFIX = 'Auszeichnung für gute Bauten der Stadt Zürich 2021–2024';
const SEPARATOR = ' • ';

export function usePageTitle() {
  // Update title on route change
  watch(title, (newTitle) => {
    if (newTitle) {
      document.title = `${newTitle}${SEPARATOR}${DEFAULT_SUFFIX}`;
    } else {
      document.title = DEFAULT_SUFFIX;
    }
  }, { immediate: true }); // updates on first load

  return {
    title,
    setTitle: (val) => (title.value = val),
  };
}
