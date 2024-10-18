<template>
    <div class="grid grid-cols-[2fr,_4fr,_0fr] h-screen overflow-hidden">
        <aside class="p-4 flex flex-col gap-4 shadow-lg">
            <Card v-for="block in props.blocks" @click="handleSelect(block.type)" class="cursor-pointer">
                <template #content>
                    {{ block.label }}
                </template>
            </Card>
        </aside>

        <main class="bg-slate-50 p-4 px-10 overflow-x-hidden overflow-y-auto h-screen relative">
            <div class="flex flex-col gap-5 ">
                <Card v-for="(id, index) in blockIds" :key="index" class="bg-white">
                    <template #title>

                        {{ getBlockById(id).label }}
                    </template>
                    <template #content>
                        <div class="flex flex-col gap-y-6">
                            <component
                             v-for="(field, key) in getBlockById(id).fields"
                             :key="key"
                             :field="field"
                             :is="getComponent(field.type)"
                             @update:field="handleUpdate($event, index, key)"
                            />
                        </div>
                    </template>
                </Card>
            </div>

            <SpeedDial  classs="bg-red-500" style="position: fixed; right: 4rem; top: calc(100% - 50px)" :model="speedDialitems" direction="left" />
        </main>

        <div class="grid place-items-center overflow-hidden">
            <i class="font-bold text-gray-400 text-4xl">Preview goes here</i>
        </div>

    </ div>
</template>

<script setup>

import { onMounted, ref, reactive } from "vue";
import Card from "primevue/card";
import SpeedDial from "primevue/speeddial";


import BlockMap from "@/Utils/blockMap"

import { useBlockManager } from '@/compostables/blocks/useBlockManager'

const { addBlock, updateBlockField, getAllBlocks, getBlockById } = useBlockManager()

const props = defineProps({
    blocks: Object
})

const blockIds = ref([])

const handleSelect = (blockType) => {
    const blockSchema = props.blocks[blockType]
    const newBlockId = addBlock(blockSchema)
    blockIds.value.push(newBlockId)
}

const handleUpdate = (value, index, fieldKey) => {
    const blockId = blockIds.value[index]
    updateBlockField(blockId, fieldKey, value)
}

const fieldtypes = new Set()

const getComponent = (type) => {
    return BlockMap.get(type)
}



const speedDialitems = ref([
    {
        label: 'Add',
        icon: 'pi pi-pencil',
        command: () => {
            console.log(getAllBlocks())
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



//DEBUG
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

console.log("fieldtypes: ",fieldtypes)

</script>

<style lang="scss" scoped>

</style>
