<template>
    <Head title="Organizations" />
    <DefaultDashboardLayout>
        <h2 class="text-3xl">Organizations</h2>
        <p class="mt-2 text-gray-700"> Create and manage your organizations. Every organization can create and publish events. </p>

        <section class="mt-20">
            <DashedAddButton @add-clicked="showOrgDialalog = true" class="mt-4" />
        </section>

        <Dialog v-model:visible="showOrgDialalog" :pt:mask:class="'bg-black/40'" >
            <template #container >
                <div class="w-[1200px] aspect-video bg-white rounded-2xl overflow-hidden">
                    <div class="w-full h-1/4 bg-gray-300 grid place-items-center relative">

                        <div @click="showOrgDialalog = false" class="h-8 aspect-square bg-white rounded-full absolute top-8 right-8 grid place-items-center shadow-md cursor-pointer">
                            <i class="pi pi-times"></i>
                        </div>

                        <label for="main-image" class="h-14 aspect-square bg-white rounded-full absolute top-full left-8 -translate-y-1/2 grid place-items-center shadow-md cursor-pointer">
                            <i class="pi pi-camera"></i>
                            <input class="hidden" type="file" id="main-image">
                        </label>

                        <i class="pi pi-image text-8xl text-gray-500"></i>
                    </div>

                </div>
            </template>
        </Dialog>

    </DefaultDashboardLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, reactive } from "vue";
import DefaultDashboardLayout from '@/Layouts/DefaultDashboardLayout.vue';
import DashedAddButton from '@/Components/DashedAddButton.vue';
import Dialog from 'primevue/dialog';


const props = defineProps({
    organizations: Array
})

let showOrgDialalog = ref(true)


</script>

<style lang="scss" scoped>

</style>
