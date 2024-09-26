<template>
<div class="flex flex-col gap-2">
    <label for="username">{{ props.label }}</label>
    <InputText id="username" v-model="props.value" aria-describedby="username-help" />
    <small v-if="props.helptext" id="username-help">{{ props.helptext }}</small>
</div>
</template>

<script setup>
import InputText from 'primevue/inputtext';
const props = defineProps({
    label: String,
    helptext: String?,
    value: String
})

</script>

<style lang="scss" scoped>

</style>
