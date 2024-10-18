<template>
        <div>

            <div class="flex items-center gap-3" @click="showList = !showList">
                <h3 class="text-xl font-bold cursor-pointer"> Replicator - {{ field.label }} </h3>
                <i class="pi pi-chevron-down transition-all duration-300 ease-in-out cusrsor-pointer" :class="showList ? '' : 'rotate-180'" ></i>
            </div>

            <div v-show="showList" class="pl-8">
                <Card  v-for="n in counter" :key="n" class="border mt-5">
                    <template #title>
                        {{ field.block.label }}
                    </template>
                    <template #content>
                        <div class="flex flex-col gap-4">
                            <component v-for="field in field.block.fields" :field="field" :is="getComponent(field.type) " />
                        </div>
                    </template>
                </Card>
                <div class="flex justify-center">
                    <Button @click="counter++" class="mt-4 bg-sky-500 text-white border-transparent shadow-sky-800 shadow-md hover:text-sky-500" rounded icon="pi pi-plus" aria-label="Add" />
                </div>
            </div>
        </div>
</template>

<script setup>

import Card from 'primevue/card';
import BlockMap from '@/Utils/BlockMap.js';
import Button from 'primevue/button';

import { computed, ref } from 'vue';

const props = defineProps({
    field: Object
})

let counter = ref(1)
let showList = ref(true)


const getComponent = (type) => {
    return BlockMap.get(type)
}


</script>

<style lang="scss" scoped>

</style>
