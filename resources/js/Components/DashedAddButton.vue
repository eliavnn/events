<template>
    <button
    @click="emits('add-clicked')"
    :class="[width]"
    class="aspect-[5/3] border-2 border-dashed border-gray-300 rounded-lg">

    <i class="pi pi-plus text-xl"></i>

    </button>
</template>

<script setup>

const props = defineProps({
    width: {
        type: String,
        required: false
    },
    url: {
        type: String,
        required: false
    }
})

const emits = defineEmits(['add-clicked'])

</script>

<style lang="scss" scoped>

</style>
