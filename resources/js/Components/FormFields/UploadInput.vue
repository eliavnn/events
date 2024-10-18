<template>
    <div>
        <label class="mb-2 block" for="">{{ field.label }}</label>
        <FileUlpload :multiple="true" />
    </div>
</template>

<script setup>
import { ref } from 'vue';

import FileUlpload from 'primevue/fileupload';

const props = defineProps({
    field: Object
})

</script>

<style scoped>

</style>
