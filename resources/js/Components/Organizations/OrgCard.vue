<template>
    <div
        class="rounded-lg relative bg-white dark:bg-zinc-900 p-4 h-full aspect-[5/3] overflow-hidden  shadow-card hover:shadow-cardHover transition-all ease-in-out cursor-pointer bg-cover bg-center grid place-items-center"
        :class="organization.main_image_path ? 'border-white border-[3px]' : ''"
        @click.right="handleRightClick"
        :style="{ backgroundImage: `url(${organization.main_image_path})` }">

        <i v-if="!organization.main_image_path" class="pi pi-building text-[40px] text-gray-300 absolute "></i>

        <picture
            class="absolute rounded-full grid place-items-center h-14 aspect-square bg-white bottom-2 left-2"
            :class="!organization.logo_path ? 'border-gray-100 border-2' : ''"
            >
            <img v-if="organization.logo_path" :src="organization.logo_path" class="h-full w-full object-contain object-center" alt="logo">
            <div v-else> {{ useInitials(organization.name) }} </div>
        </picture>

        <ContextMenu ref="contextMenu" :model="contextMenuItems" :pt="{root: 'bg-white'}" :ptOptions="{mergeProps: true}" />

        <Link :href="route('organizations.show', organization.id)" class="absolute inset-0" />

    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import { useInitials } from '@/Composables/initials.js';
    import ContextMenu from 'primevue/contextmenu';
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        organization: {
            type: Object,
        }
    })


    //context menu
    const contextMenu = ref(null);
    const contextMenuItems = [
        {
            label: "Edit",
            icon: "pi pi-pencil",
            command: (event) => {
                // TO DO: edit
            },
        },
        {
            label: "Delete",
            icon: "pi pi-trash",
            command: (event) => {
                // TO DO: delete
            }
        },
    ]

    const handleRightClick = (event) => {
        contextMenu.value.show(event);
    }

</script>

<style lang="scss" scoped>

</style>
