<template>
    <div>
        <component is="Form"  />
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

function resolveComponent(type){

}

onMounted(async () => {
    await console.log(import("@/Components/Blocks/HeroBlock/Form.vue").then(c => c))
})

</script>

<style lang="scss" scoped>

</style>
