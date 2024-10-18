<template>
    <FloatLabel variant="on">
        <InputText  @update:modelValue="handleInput" class="border-slate-300" :modelValue="field.value ?? ''" />
        <label>{{ field.label }}</label>
    </FloatLabel>

</template>

<script setup>
import { ref } from 'vue';

import InputText from 'primevue/inputtext';
import FloatLabel from 'primevue/floatlabel';

const props = defineProps({
    field: Object,
})

const emits = defineEmits(['update:field'])

const handleInput = (value) => {
    emits('update:field', value)
}

</script>

<style lang="scss" scoped>

</style>
