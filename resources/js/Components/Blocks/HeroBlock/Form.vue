<template>
    <div>
        <h3 class="text-3xl">
            {{ context.type }}
        </h3>
    </div>
</template>

<script setup>

const props = defineProps({
    context: Object
})

</script>

<style lang="scss" scoped>

</style>
