<template>
    <div class="grid grid-cols-[2fr,_4fr,_2fr] h-screen overflow-hidden">
        <aside class="p-4 flex flex-col gap-4 shadow-lg">
            <Card v-for="block in props.blocks" @click="handleSelect(block)" class="cursor-pointer">
                <template #content>
                    {{ block.label }}
                </template>
            </Card>
        </aside>

        <main class="bg-slate-50 p-4 px-10 overflow-x-hidden overflow-y-auto h-screen relative">
            <div class="flex flex-col gap-5 ">
                <Card v-for="block in selectedBlocks" class="bg-white">
                    <template #title>
                        {{ block.label }}
                    </template>
                    <template #content>
                        <div class="flex flex-col gap-y-6">
                            <component  @update:field="handleUpdate($event, block.type, field)" v-for="field in block.fields" :field="field" :is="getComponent(field.type)" />
                        </div>
                    </template>
                </Card>
            </div>

            <SpeedDial  classs="bg-red-500" style="position: fixed; right: 4rem; top: calc(100% - 50px)" :model="speedDialitems" direction="left" />
        </main>

        <div class="grid place-items-center">
            <i class="font-bold text-gray-400 text-4xl">Preview goes here</i>
        </div>

    </ div>
</template>

<script setup>

import { onMounted, ref } from "vue";
import Card from "primevue/card";
import SpeedDial from "primevue/speeddial";


import BlockMap from "@/Utils/blockMap"

const props = defineProps({
    blocks: Object
})

const selectedBlocks = ref([])
const handleSelect = (block) => {
    selectedBlocks.value.push(block)
}
const fieldtypes = new Set()

const getComponent = (type) => {
    return BlockMap.get(type)
}


const handleUpdate = (value, type, field) => {
    field.value = value
}

Object.entries(props.blocks).forEach(([key, value]) => {

    Object.values(value.fields).forEach((field) => {
        fieldtypes.add(field.type)

        if (field.type == "replicator") {

            Object.values(field.block.fields).forEach((field) => {
                fieldtypes.add(field.type)
            })
        }
    })

})

const speedDialitems = ref([
    {
        label: 'Add',
        icon: 'pi pi-pencil',
        command: () => {
            console.log(selectedBlocks.value)
        }
    },
    {
        label: 'Update',
        icon: 'pi pi-refresh',
        command: () => {
            toast.add({ severity: 'success', summary: 'Update', detail: 'Data Updated', life: 3000 });
        }
    },
    {
        label: 'Delete',
        icon: 'pi pi-trash',
        command: () => {
            toast.add({ severity: 'error', summary: 'Delete', detail: 'Data Deleted', life: 3000 });
        }
    },
    {
        label: 'Upload',
        icon: 'pi pi-upload',
        command: () => {
            router.push('/fileupload');
        }
    },
    {
        label: 'Vue Website',
        icon: 'pi pi-external-link',
        command: () => {
            window.location.href = 'https://vuejs.org/'
        }
    }
])

console.log("fieldtypes: ",fieldtypes)

</script>

<style lang="scss" scoped>

</style>
