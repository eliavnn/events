<template>
    <div>

    </div>
</template>

<script setup>

import { onMounted } from "vue";

const props = defineProps({
    blocks: Object
})

Object.entries(props.blocks).forEach(([key, value]) => {
    console.log(value.type, value)
})


</script>

<style lang="scss" scoped>

</style>
